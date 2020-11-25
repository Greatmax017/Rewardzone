<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\CustomAccountActivated;
use App\Notifications\SharePurchased;
use App\Notifications\ShareRequest;
use App\Notifications\ProfitPaid;
use App\Post;
use App\Transaction;
use App\Setting;
use App\Message;
use App\User;
use App\Game;
use App\Stake;
use App\Bank;
use Carbon\Carbon;

use Auth;
use DB;
use Hash;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * get Authenticated User Information.
     *
     * @return void
     */
    public function get_user(Request $request)
    {
        return $request->user();
    }

    public function get_active_shares(Request $request){
        $setting = Setting::first();
        $active_shares = Transaction::where('amount', '>', 0)->where('sender', $request->user()->id)->where('status', 0)->latest()->get();
        if($request->user()->is_executive){
            foreach ($active_shares as $key => $value) {
            	$value->can_withdraw = 0;
                $days = $value->days;
                if($days >= 90){
                	$days = 90;
                	$value->can_withdraw = 1;
                }
                $value->days = $days;
                $value->current_value = round($value->amount * pow($setting->executive_rate, $days), 2);
                //$value->current_value = $request->user()->is_affiliate || $request->user()->role == 2 || $request->user()->suspended ? $value->amount : round($value->amount * pow(1.009774896, $days), 2);
            }
        }else{
            foreach ($active_shares as $key => $value) {
            	$value->can_withdraw = 0;
                $days = $value->days;
                if($days >= 15){
                	$days = 15;
                	$value->can_withdraw = 1;
                }

                $value->days = $days;
                $value->current_value = round($value->amount * pow($setting->normal_rate, $days), 2);
                //$value->current_value = $request->user()->is_affiliate || $request->user()->role == 2 || $request->user()->suspended ? $value->amount : round($value->amount * pow(1.022685, $days), 2);
            }
        }
		return response()->json($active_shares, 200);
    }


    public function get_affiliates(Request $request){
        $affiliates = User::where('is_affiliate', 1)->where('country', $request->user()->country)->get();
        foreach ($affiliates as $key => $aff) {
            $aff->available_share = Transaction::where('sender', $aff->id)->where('status', 0)->sum('amount');
        }
        return response()->json($affiliates, 200);
    }

    public function get_messages(Request $request){
    	$messages = Message::where('receiver', $request->user()->id)->orWhere('sender', $request->user()->id)->distinct('message')->latest()->limit(100)->get();
        return response()->json($messages, 200);
    }

    public function set_message_read(Request $request, $id){
    	$message = Message::where('receiver', $request->user()->id)->where('id', $id)->first();
    	if($message == null){
    		return response()->json(['error'=>'Message not found'], 404);
    	}
    	$message->message_read = 1;
    	$message->save();
        return response()->json($message, 200);
    }

    public function get_news(){
    	$posts = Post::latest()->limit(50)->get();
    	foreach($posts as $key => $post){
    		$post->summary = substr(strip_tags($post->content), 0, 100);
    		$post->summary .= strlen($post->summary) == 100 ? '...':'';
    	}
        return response()->json($posts, 200);
    }

    public function get_referred(Request $request){
    	$users = User::where('referrer_id', $request->user()->id)->latest()->limit(200)->get();
        return response()->json($users, 200);
    }

    public function withdrawal_request(Request $request){
        if($request->user()->suspended){
            return response()->json(['error-status'=>'Cannot perform action. Your account is suspended.'], 400);
        }
        $transaction = Transaction::where('sender', $request->user()->id)->where('status', 0)->find($request->transaction);
        if($transaction == null){
            return response()->json(['error-status'=>'Transaction not found or is already concluded'], 404);
        }

        $days = $transaction->days;
        if($request->user()->is_executive){
            if($days < 90)
                return response()->json(['error-status'=>'You cannot make withdrawal request for a share that is less than 90 days old.'], 400);
        }
        if($days < 15)
            return response()->json(['error-status'=>'You cannot make withdrawal request for a share that is less than 15 days old.'], 400);

        $setting = Setting::first();
        $current_value = $request->user()->is_executive ? round($value->amount * pow($setting->executive_rate, 90), 2) : round($transaction->amount * pow($setting->normal_rate, 15), 2);
        $amnt = round($request->input('amount'), 2);

        if($amnt < 1000){
            return response()->json(['error-status'=>'Requested amount is too low. Minimum for your currency is N1000.'], 400);
        }

        if($amnt > $current_value)
            return response()->json(['error-status'=>'Invalid amount requested. Amount must be less than the current value of the transaction.'], 400);

        if($amnt < 0)
            return response()->json(['error-status'=>'Invalid amount requested. Amount must be a positive number'], 400);

        $transaction->status = 1;
        $transaction->save();

      	if($request->input('amount') == $current_value){
            $tr = new Transaction;
            $tr->amount = $amnt;
            $tr->sender = 0;
            $tr->receiver = $request->user()->id;
            $tr->description = "Funds Withdrawal";
            $tr->status = 0;
            $tr->save();
      	}else{
            $tr = new Transaction;
            $tr->amount = $amnt;
            $tr->sender = 0;
            $tr->description = "Funds Withdrawal";
            $tr->receiver = $request->user()->id;
            $tr->status = 0;
            $tr->save();

            $tran = new Transaction;
            $tran->amount = $current_value - $amnt;
            $tran->sender = $request->user()->id;
            $tran->description = "Shares Created";
            $tran->day_of_week = Carbon::now()->dayOfWeek;
            $tran->receiver = 0;
            $tran->status = 0;
      			if($tran->amount > 1){
      				$tran->save();
      			}
          }

          return redirect()->back();

          return response()->json(['success-status' => 'Funds Withdrawal Successfully requested'], 200);
    }

    public function send_message(Request $request){

    	$mesg = $request->input('message');
    	$subject = $request->input('subject');
        $request->validate([
            'attachment' => 'nullable|image'
        ]);
    	$attachment = null;
    	if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
	    	$file = $request->attachment->move('assets/img/messages', 'message_'.time().'.'.$request->attachment->extension());
	    	$attachment = $file->getPathname();
		}

		$message = new Message;
		$message->sender = $request->user()->id;
		$message->subject = $subject;
		$message->message = $mesg;
		$message->attachment = $attachment;
		$message->receiver = 0;
		$message->save();

    	return response()->json($message, 200);
    }

    public function get_transactions(Request $request){
    	$transactions = Transaction::where('sender', $request->user()->id)->orWhere('receiver', $request->user()->id)->latest('updated_at')->limit(200)->get();
        return response()->json($transactions, 200);
    }

    public function get_withdrawal_requests(Request $request){
    	$transactions = Transaction::where('receiver', $request->user()->id)->where('sender', 0)->latest()->limit(100)->get();
        return response()->json($transactions, 200);
    }

    public function overview(Request $request){
        $setting = Setting::first();
        $active_shares = Transaction::where('amount', '>', 0)->where('sender', $request->user()->id)->where('status', 0)->latest()->get();
        $gh_transactions = Transaction::where('receiver', $request->user()->id)->where('sender', 0)->where('status', 0)->latest()->limit(10)->get();
        $next_share = null;
        if($request->user()->is_executive){
            foreach ($active_shares as $key => $value) {
                $days = $value->days;
                if($days > 90)
                    $days = 90;
                $value->days = $days;
                $value->current_value = round($value->amount * pow($setting->executive_rate, $days), 2);
                //$value->current_value = $request->user()->is_affiliate || $request->user()->role == 2 || $request->user()->suspended ? $value->amount : round($value->amount * pow(1.009774896, $days), 2);
            }
        }else{
            foreach ($active_shares as $key => $value) {
                $days = $value->days;
                if($days > 15)
                    $days = 15;
                $value->days = $days;
                //$value->current_value = round($value->amount * pow(1.022685, $days), 2);
                $value->current_value = $request->user()->is_affiliate || $request->user()->role == 2 || $request->user()->suspended ? $value->amount : round($value->amount * pow($setting->normal_rate, $days), 2);
            }
        }
        return response()->json(['active_shares' => $active_shares->sum('amount'),
                                'active_shares_value' => $active_shares->sum('current_value'),
                                'referred' => \App\User::where('referrer_id', $request->user()->id)->count(),
                                'active_referred' => $request->user()->referred_count(),
                                'pending_withdrawals' => $gh_transactions->count() ], 200);
    }

    public function purchase_request(Request $request){
        $affiliate = User::where('is_affiliate', 1)->find($request->affiliate);
        if($affiliate == null){
            return response()->json(['error'=>'Affiliate not found'], 404);
        }
        try{
            $affiliate->notify(new ShareRequest($request->amount, $request->user()));
        }catch(\Exception $ex){
            return response()->json(['error'=>'Error Occured '.$ex->getMessage()], 403);
        }
        return response()->json(['success'=>'Request Made Successfully'], 200);
    }

}
