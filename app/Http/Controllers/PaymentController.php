<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use App\Notifications\CustomAccountActivated;
use App\User;
use App\License;
use Validator;
use Mail;
use Auth;

class PaymentController extends Controller
{
    /**
     * Show the application payment page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('payment');
    }



    public function process_payment(Request $request){
      $validator = Validator::make($request->all(), [
          'payment-token' => 'required',
          'amount' => 'required|numeric',
      ]);

      if($validator->fails()){
          if($request->ajax()){
            return response()->json(['errors'=>$validator->errors()]);
          }
          return redirect()->back()->withErrors($validator);
      }

      $url = env('SIMPLE_PAY_VERIFY_URL', null);
      $user = env('SIMPLE_PAY_USER', null);
      $pass =  env('SIMPLE_PAY_PASSWORD', null);
      $client = new Client(); //GuzzleHttp\Client
      try {
          $res = $client->request('POST', $url, [
            'auth' => [$user, $pass],
            'form_params' => [
                'token' => $request->input('payment-token'),
                'amount' => $request->input('amount').'00',
                'amount_currency' => 'NGN'
            ]
          ]);

          if($res->getStatusCode() == 200){
              $transaction_details = json_decode($res->getBody()->getContents(), true);
              $license = new License;
              $license->user_id = Auth::user()->id;
              $license->transaction_id = $transaction_details['id'];
              $license->transaction_desc = 'Subscription Payment, TodayLift';
              $license->expires_at = \Carbon\Carbon::now()->addMonths(1);
              $license->save();

              $dt = \Carbon\Carbon::now();

              $dt->hour = 2;
              $dt->minute = 0;
              $dt->second = 0;


              Auth::user()->license_id = $license->id;
              Auth::user()->pin_trials = 0;
              Auth::user()->ph_initiated_at = $dt;
              Auth::user()->save();

              if(Auth::user()->referrer_id != 0 && Auth::user()->amount_received == 0 && Auth::user()->balance == 0){
                  $user = User::find(Auth::user()->referrer_id);
                  if($user != null){
                      $user->balance += 1100;
                      $user->save();
                  }
              }

              Auth::user()->notify(new CustomAccountActivated);

              return $this->return_success($request, "Payment successful");
          }elseif($res->getStatusCode() == 403){
              return $this->return_error($request, 'Transaction Error: Transaction could not be completed');
          }
          return $this->return_error($request, 'An Error Occured');
      } catch (RequestException $e) {
          //echo Psr7\str($e->getRequest());
          //if ($e->hasResponse()) {
          //    echo Psr7\str($e->getResponse());
          //}
          return $this->return_error($request, 'Oops. An Error Occured making the request. Pleaase try again later');
      }

    }

    public function make_payment(Request $request){
        $license = Auth::user()->license;
        if($license != null && $license->expires_at->gt(\Carbon\Carbon::now())){
            return redirect('/dashboard')->with('error-status', 'User License is still valid');
        }
        $amount = 10000;
        return view("invoice", ['amount'=>$amount]);
    }

    public function return_success($request, $message){
        if($request->ajax()){
          return response()->json(['success'=>$message]);
        }
        return redirect()->back()->with('success-status', $message);
    }

    public function return_error($request, $message){
        if($request->ajax()){
          return response()->json(['error-status'=>$message]);
        }
        return redirect()->back()->with('error-status', $message);
    }
}
