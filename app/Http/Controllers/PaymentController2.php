<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Setting;
use App\Transaction;
use App\User;

use Auth;
use DB;
use Hash;
class PaymentController2 extends Controller
{
     /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }


    }

    public function make_payment()
    {
        $settings = Setting::first();
        //$active_shares = Transaction::where('sender', Auth::user()->id)->where('created_at', '<=', \Carbon\Carbon::now()->subDays(15)->toDateTimeString())->latest()->get();
        $active_shares = Transaction::where('amount', '>', 0)->where('sender', Auth::user()->id)->whereIn('status', [0])->latest()->get();

        $next_share = null;
        foreach ($active_shares as $key => $value) {

        }

        return view('invoice', ['active_shares' => $active_shares, 'settings' => $settings]);
    }
   /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

      $paymentDetails = Paystack::getPaymentData();
    //  dd($paymentDetails);
    // Now you have the payment details,
    // you can store the authorization_code in your db to allow for recurrent subscriptions
    // you can then redirect or do whatever you want
      if (array_key_exists('data', $paymentDetails) && array_key_exists('status', $paymentDetails['data']) && ($paymentDetails['data']['status'] === 'success')) {

          $user_transaction_id = ( $paymentDetails['data']['metadata']['user_t_id']);
          $transaction = Transaction::where('id', [$user_transaction_id])->get();

          foreach ($transaction as $key => $value) {
            $value->status = 1;
            $value->save();
          }


          return redirect('/dashboard')
        	     		->with('success-status', 'Payment Successful!, Your investment is now active.');
            }
        else{
            return redirect('/dashboard')
            	     		->with('error-status', 'Payment failed!,Please try again.');
        }


    }

}
