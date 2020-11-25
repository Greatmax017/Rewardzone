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
use Carbon\Carbon;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction as CoinbaseTransaction;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Client as CoinbaseClient;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

use Auth;
use DB;
use Hash;
use Telegram;

class DashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        //$active_shares = Transaction::where('sender', Auth::user()->id)->where('created_at', '<=', \Carbon\Carbon::now()->subDays(15)->toDateTimeString())->latest()->get();
          $active_shares = Transaction::where('amount', '>', 0)->where('sender', Auth::user()->id)->whereIn('status', [0,1,2])->latest()->get();
        $total_interest = ($active_shares);
        $next_share = null;
       foreach ($active_shares as $key => $value) {
            if($value->status == 1 && $value->amount == 67.5 ){
                $value->current_value = round( ($value->amount * $value->days * 6.0714/100), 2);
                
              }elseif ($value->status == 1 && $value->amount == 135) {
                $value->current_value = round( ($value->amount * $value->days * 7.142/100), 2);
               
              }elseif ($value->status == 1 && $value->amount == 270) {
                $value->current_value = round( ($value->amount * $value->days * 6/100), 2);
               
              }elseif ($value->status == 1 && $value->amount == 675) {
                $value->current_value = round( ($value->amount * $value->days * 5/100), 2);
              
              }elseif ($value->status == 1 && $value->amount == 1351) {
                $value->current_value = round( ($value->amount * $value->days * 4/100), 2);
                
              }else{
                $value->current_value = 0;
            }
        }
        $ref_count =  User::where('referrer_id', Auth::user()->id)->count();

      $users = User::where('referrer_id', Auth::user()->id)->latest()->paginate(3);

        return view('dashboard', ['active_shares' => $active_shares, 'total_interest' => $total_interest, 'users' => $users, 'ref_count' => $ref_count, 'settings' => $settings]);

    }
      public function show_referred(){
    	$users = User::where('referrer_id', Auth::user()->id)->latest()->paginate(50);
    	$settings = Setting::find(1);
        $ref_count =  User::where('referrer_id', Auth::user()->id)->count();
        $ref_bonus = 0;
        foreach(User::where('referrer_id', Auth::user()->id)->get() as $user)
        {
            $ref_bonus += \App\Transaction::where('sender', $user->id)->where('status', 1)->sum('amount') * 5/100;
        }
         $sum_with = \App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [2,3])->where('description', 'REFBONUS')->sum('amount');

        $ref_bonus -= $sum_with;
        return view('referral_bonus', ['users' => $users, 'ref_bonus' => $ref_bonus, 'ref_count' => $ref_count, 'settings'=>$settings]);
    }

    public function messagebox(){
    	$messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	$messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('messagebox', ['messages' => $messages, 'messages_sent' => $messages_sent]);
    }

    public function show_profile(){
        return view('profile');
    }
      public function show_earnings(){
        $string = (Auth::user()->coupon);
        $firstCharacter = $string[0];
        return view('earnings', ['firstCharacter' => $firstCharacter]);
    }

    public function show_tutorials(){
    	$posts = Post::where('tutorial', 1)->latest()->paginate(10);
        return view('tutorials', ['posts'=>$posts]);
    }


    public function show_mytree(){
    	$users = User::where('referrer_id', Auth::user()->id)->latest()->paginate(50);
        $ref_count =  User::where('referrer_id', Auth::user()->id)->count();

        return view('mytree', ['users' => $users, 'ref_count' => $ref_count]);
    }

    public function save_profile(Request $request){

        $validator = Validator::make($request->all(), [
            'accountno' => 'required|max:200',
            'bank' => 'required|max:200',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->accountno = $request->accountno;
        $user->bank = $request->bank;
        $user->phone = $request->phone;
	      $user->save();

		return redirect()->back()->with('success-status', 'Information successfully saved');
    }

/**first 6 days Withrawal submit function */
    public function save_profile2(Request $request){

        $validator = Validator::make($request->all(), [
            'withamt' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = Auth::user();
        $user->withamt = $request->withamt;
	    $user->save();

		return redirect()->back()->with('success-status', 'Withdrawal request Submitted successfully');
    }
    /**Withrawal function ends here */





    public function investment_request(Request $request){
        $validator = Validator::make($request->all(), [
            'amount'=> 'required|numeric',
            'method'=> 'required|numeric',

            //'hash_code' => 'required',
        ]);

        Transaction::where('paid_to', 'Nexustrade')->delete();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $settings = Setting::first();

        if(Transaction::where('sender', Auth::user()->id)->where('status', 0)->count() > 0){
            return redirect()->back()->with('error-status', 'Payment for your previously initiated investment has not been confirmed yet. You are not allowed to initiate another until it is confirmed');
        }

        if(Transaction::where('sender', Auth::user()->id)->whereIn('status', [0,1])->whereDate('created_at', Carbon::today())->sum('amount') >= 5000000){
            return redirect()->back()->with('error-status', 'Transaction limit of $ 5,000,000.00 exceeded');
        }

        $tran = Transaction::whereNotNull('paid_to')->where('status', 0)->where('created_at', '<=', Carbon::now()->subHours(12))->first();
        if($tran != null){
            $this->create_investment_request($request->amount, $request->plan, $request->method, $tran->paid_to);
            $tran->status = 4;
            $tran->save();
            return redirect()->back()->with('success-status', 'You have successfully made a request to Invest &#8377;'.$request->amount * 74)
            ->with('address', 'You are required to pay <br><b>$'.$request->amount.' to '.$tran->paid_to.' </><br> within 24 hours.');
        }

        try{
            //dd( php_ini_loaded_file());
            $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
            $client = CoinbaseClient::create($configuration);
            $address = new Address([
                'name' => 'RewardZone'
            ]);

            $account = $client->getPrimaryAccount();
            $address = $client->createAccountAddress($account, $address);
            //dd($address);
            $this->create_investment_request($request->amount, $request->plan, $request->method, $address->getAddress(), 'RewardZone');
            return redirect()->back()->with('success-status', 'You have successfully made a request to invest  &#8377; '.$request->amount * 74)
            ->with('address', 'You are required to pay <br><b>$'.$request->amount.'worth of bitcoin to '.$tran->paid_to.' </><br> within 24 hours.');
        }catch(\Exception $e){
            return redirect()->back()->with('error-status', 'An error occured. '.$e->getMessage());
        }
    }

    public function create_investment_request($amount, $plan, $method, $address, $secret = null){
        $transaction = new Transaction;
        $transaction->amount = $amount;
        $transaction->plan = $plan;
        $transaction->method = $method;
        $transaction->blockchain_secret = $secret;
        $transaction->paid_to = $address;
        $transaction->sender = Auth::user()->id;
        $transaction->receiver = 0;
        $transaction->status = 0;
        $transaction->day_of_week = Carbon::now()->dayOfWeek;
        $transaction->description = "Investment";
        $transaction->save();
    }


    public function purchase_request(Request $request){
        $affiliate = User::where('is_affiliate', 1)->find($request->affiliate);
        if($affiliate == null){
            return redirect()->back()->with('error-status', 'Affiliate not found');
        }
        try{
            $affiliate->notify(new ShareRequest($request->amount, Auth::user()));
        }catch(\Exception $ex){
            //Do Nothing
        }
        return redirect()->back()->with('success-status', 'A request message has been sent to the affiliate, ensure that you make payments adequately for your request to be processed and shares activated');
    }

    public function change_password(Request $request){
    	Auth::logout();
    	return redirect('/password/reset');
    }

    public function get_bonus(Request $request){
    	$settings = Setting::find(1);
    	if($settings->users_per_bonus == 0 || $settings->min_withdraw_cat == 0)
    		return redirect()->back()->with('error-status', 'Bonus disabled by the admins');

    	if((int)(Auth::user()->referred_count / $settings->users_per_bonus) > (Auth::user()->get_bonus + Auth::user()->user_bonus_count)){
			if(Auth::user()->status_id == 3){
				Auth::user()->get_bonus += 1;
				Auth::user()->save();
				return redirect()->back()->with('success-status', 'Successfully applied to get bonus');
			}
			else{
				return redirect()->back()->with('error-status', 'Cannot cashout bonus till you are waiting to get help (GH)');
			}
		}

		return redirect()->back()->with('error-status', 'You do not yet qualify to get bonus');
    }

    public function withdraw(Request $request, $id){

        $setting = Setting::first();

        if(Auth::user()->suspended){
            return redirect()->back()->with('error-status', 'Cannot perform action. Your account is suspended.');
        }
        $transaction = Transaction::where('sender', Auth::user()->id)->where('status', 2)->find($id);
        if($transaction == null){
            return redirect('/dashboard')->with('error-status', 'Transaction not found or is already concluded');
        }

        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = CoinbaseClient::create($configuration);

        try {
            $trn = CoinbaseTransaction::send([
                'toBitcoinAddress' => Auth::user()->bitcoin_wallet_id,
                'amount'           => new Money($transaction->amount, CurrencyCode::USD),
                'description'      => $transaction->description.' (BlogNews360cryptoWithdrawal)'
                //'fee'              => '0.0001' // only required for transactions under BTC0.0001
            ]);
            $account = $client->getPrimaryAccount();
            $client->createAccountTransaction($account, $trn);
        }catch(\Exception $e) {
             return redirect()->back()->with('error-status', 'An error occured. '.$e->getMessage());
        }

        $transaction->status = 3;
        $transaction->save();

        try{
            $user = $transaction->sender_data;
            $user->notify(new ProfitPaid($transaction->amount, $user->bitcoin_wallet_id));
            Telegram::sendMessage([
              'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
              'text' => "Subscriber $user->name with wallet address $user->bitcoin_wallet_id has successfully recived a withdrawal of $$transaction->amount \n\nTran. Desc.: $transaction->description",
            ]);
            if($user->telegram_chat_id != null){
                Telegram::sendMessage([
                  'chat_id' => $user->telegram_chat_id,
                  'text' => "Withdrawal Complete. \nHello $user->name \nYour Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                ]);
            }

        }catch(\Exception $ex){
            //Do Nothing
        }

        return redirect()->back()->with('success-status', "Your Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id");
    }

    /**
     * Perform withdrawal of referral bonus
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function withdraw_ref_bonus(Request $request)
    {
        $users = User::where('referrer_id', Auth::user()->id)->get();
        $ref_bonus = 0;
        foreach($users as $user)
        {
            $ref_bonus += \App\Transaction::where('sender', $user->id)->where('status', 1)->sum('amount') * 3/100;
        }
        $sum_with = \App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [2,3])->where('description', 'REFBONUS')->sum('amount');
        $ref_bonus -= $sum_with;

        if($ref_bonus < 2000)
        {
            return redirect()->back()->with('error-status', 'Your referral bonus is less than the minimum withdrawal amount of N2,000');
        }

        $transaction = new Transaction;
        $transaction->amount = $ref_bonus;
        //$transaction->blockchain_secret = $secret;
        //$transaction->paid_to = $address;
        $transaction->sender = Auth::user()->id;
        $transaction->receiver = 0;
        $transaction->status = 2;
        $transaction->day_of_week = Carbon::now()->dayOfWeek;
        $transaction->description = "REFBONUS";
        $transaction->save();

        // return redirect()->back()->with('success-status', "Your Withdrawal of $$transaction->amount has been successfully sent to your wallet address");

        return $this->withdraw($request, $transaction->id);

    }

    //Confirm payment received by the receiver
    public function confirm_receipt(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	$settings = Setting::find(1);
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->receiver != Auth::user()->id)
    		return redirect()->back()->with('error-status', 'This user is not authorised to confirm this payment receipt');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if($transaction->receiver == Auth::user()->id){
				Auth::user()->amount_received += $transaction->amount;
				$transaction->status = 1;
    			$transaction->save();
                return redirect()->back();
    			//return redirect()->back()->with('show_testimony_modal', 1);
			}
			return redirect()->back()->with('error-status', 'Error executing request, you are not the receiver');
		}
    }


    public function confirm_provide_help(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if(Auth::user()->isAdmin()){
				$transaction->status = 3;
    			$transaction->save();

                try{
                    $user = $transaction->sender_data;
                    $user->notify(new ProfitPaid($transaction->amount, $user->bitcoin_wallet_id));
                    Telegram::sendMessage([
                      'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                      'text' => "Subscriber $user->name with wallet address $user->bitcoin_wallet_id has successfully recived a withdrawal of $$transaction->amount \n\nTran. Desc.: $transaction->description",
                    ]);
                    if($user->telegram_chat_id != null){
                        Telegram::sendMessage([
                          'chat_id' => $user->telegram_chat_id,
                          'text' => "Withdrawal Complete. \nHello $user->name \nYour Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                        ]);
                    }

                }catch(\Exception $ex){
                    //Do Nothing
                }

                return redirect()->back();
			}else{
	    			return redirect()->back()->with('error-status', 'Error executing request, try again later');
    		}
    	}
    	return redirect()->back();
    }


    public function reject_provide_help(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction does not exist');
    	elseif($transaction->status == 1 or $transaction->status == 2)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if(Auth::user()->isAdmin()){
				$transaction->status = 2;
                $transaction->description .= " (Request rejected)";
    			$transaction->save();

                $tr = new Transaction;
                $tr->amount = round($transaction->amount * 100/140, 2);
                $tr->sender = $transaction->receiver;
                $tr->receiver = 0;
                $tr->status = 0;
                $tr->description = "Shares Created";
                $tr->save();
                $tr->created_at = $tr->created_at->subDays(15);
                $tr->save();

                //try{
                    //$user->notify(new ProfitPaid($transaction->amount, $transaction->receiver_data->bank_name, $transaction->receiver_data->account_number));
                //}catch(\Exception $ex){
                    //Do Nothing
                //}

                return redirect()->back();
			}else{
	    			return redirect()->back()->with('error-status', 'Error executing request, try again later');
    		}
    	}
    	return redirect()->back();
    }



    public function show_message($id = null){

    	if(is_null($id))
    		return view('new_message');

    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	elseif(($message->receiver != Auth::user()->id && $message->receiver != null) && $message->sender != Auth::user()->id && !Auth::user()->isAdmin() && !Auth::user()->isReader())
    		return redirect()->back()->with('error-status', 'You are not authorised to view this message');
    	else{
            if(Auth::user()->id == $message->receiver || ($message->receiver == 0 && Auth::user()->isAdmin())){
                $message->message_read = 1;
                $message->save();
            }
    		return view('message_detail', ['message'=>$message]);
    	}
    }


    public function reply_message($id){
    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	$sender = $message->sender != 0 ? $message->sender_data->email : 'support';
    	$subject = 'Re:'.$message->subject;
    	$msg = 'Reply to Message Sent at:'.$message->created_at->toDayDateTimeString().'     Message:'.$message->message;
    	return view('new_message', ['email' => $sender, 'subject' => $subject, 'message' => $msg]);
    }


    public function complain_receipt(Request $request){

    	$transaction = Transaction::find($request->input('transaction'));

    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	elseif($transaction->sender_confirm != 1)
    		return redirect()->back()->with('error-status', 'Complaint is invalid because the sender has not confirmed payment');
    	else{
    		$subject = 'Transaction - Money not received';
    		$message = 'Transaction ID: '.$request->input('transaction')." \nPlease I did not receive the money. I will like support to help me resolve this issue swiftly";

    		//$user = User::find($transaction->receiver);
    		//if($user->balance >= $transaction->amount){
			//	$user->balance += $transaction->amount;
			//	$user->save();
			//}

    		$transaction->status = 3;
    		$transaction->save();
    		return view('new_message', ['email' => 'support', 'subject' => $subject, 'message' => $message]);
    	}
    }

    public function send_message(Request $request){

    	$mesg = $request->input('message');
    	$subject = $request->input('subject');
    	$attachment = null;
    	if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
    		$validator = Validator::make($request->all(), ['attachment' => 'image']);
    		if ($validator->fails()) {
			    return redirect()->back()->withErrors($validator);
			}
	    	$file = $request->attachment->move('assets/img/messages', 'message_'.time().'.'.$request->attachment->extension());
	    	$attachment = $file->getPathname();
		}

		$message = new Message;
		$message->sender = Auth::user()->id;
		$message->subject = $subject;
		$message->message = $mesg;
		$message->attachment = $attachment;
		$message->receiver = 0;
		$message->save();

    	return redirect('/messagebox')->with('success-status', 'Message sent.');
    }


    public function transaction_history(Request $request){
      $transactions = Transaction::where(function($query){
        $query->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id);
      });
      if($request->has('search')){
        $users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
        $s_users = array();
        foreach($users as $u)
          array_push($s_users, $u->id);

        //dd($transactions, $s_users, $request->input('search'));
        //dd($s_users);
        $transactions = $transactions->where(function($query) use($request, $s_users){
          $query->where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users);
        });
      }
      $transactions = $transactions->latest()->paginate(50);
    	//$transactions = Transaction::where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->latest()->paginate(20);
    	return view('transactions', ['transactions'=>$transactions]);
    }

    public function generate_random($len){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $len; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }
}
