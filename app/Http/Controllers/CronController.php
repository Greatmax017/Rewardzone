<?php

namespace App\Http\Controllers;
use App\Category;
use App\Notifications\ShareRequest;
use App\Notifications\SharePurchased;
use App\Notifications\SmsNotifyAll;
use App\Notifications\EmailNotifyAll;
use App\Transaction;
use App\Setting;
use App\Message;
use App\User;
use App\Game;
use App\Stake;
use App\Bank;
use Carbon\Carbon;

use Illuminate\Http\Request;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

use Coinbase\Wallet\Client as CoinbaseClient;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

use DB;
use Telegram;

class CronController extends Controller
{
   public function check_transactions(){

        $setting = Setting::first();

        if(Carbon::now()->dayOfWeek == Carbon::MONDAY ||
            Carbon::now()->dayOfWeek == Carbon::TUESDAY ||
            Carbon::now()->dayOfWeek == Carbon::WEDNESDAY ||
            Carbon::now()->dayOfWeek == Carbon::THURSDAY ||
            Carbon::now()->dayOfWeek == Carbon::FRIDAY ||
            Carbon::now()->dayOfWeek == Carbon::SATURDAY ||
            Carbon::now()->dayOfWeek == Carbon::SUNDAY){


            $tr = Transaction::where('status', 1)->get();
            foreach ($tr as $key => $val) {
                if($val->day_of_week != Carbon::now()->dayOfWeek){
                    $val->days += 1;
                    $val->day_of_week = Carbon::now()->dayOfWeek;
                     if($val->days == 14 && $val->amount == 67.5  ){
                        $val->amount = $val->amount * 1.85;
                        $val->status = 2;
                    }
                    elseif ($val->days == 14 && $val->amount == 135 ){
                        $val->amount = $val->amount * 2;
                        $val->status = 2;
                    }
                    elseif ($val->days == 30 && $val->amount == 270 ){
                        $val->amount = $val->amount * 2.2;
                        $val->status = 2;
                    }
                    elseif ($val->days == 30 && $val->amount == 675 ){
                        $val->amount = $val->amount * 2.5;
                        $val->status = 2;
                    }
                    elseif ($val->days == 31 && $val->amount == 1351 ){
                        $val->amount = $val->amount * 2.2;
                        $val->status = 2;
                    }
                    $val->save();
                  }
                }
            }


        /*$settings = Setting::first();
        $blockchain = new \Blockchain\Blockchain(env('BLOCKCHAIN_KEY'));
        $settings->usd_bitcoin = $blockchain->Rates->toBTC(1, 'USD');
        $settings->save();*/

       /* $settings = Setting::first();
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = CoinbaseClient::create($configuration);
        $spotPrice = $client->getSpotPrice('BTC-USD');
        $settings->usd_bitcoin = number_format(1/$spotPrice->getAmount(), 10);
        $settings->save();*/

        //Notification
        $queue = \App\UserNotificationQueue::limit(200)->get();
        foreach ($queue as $key => $nt) {
            if($nt->type == 1){
                $nt->user->notify(new SmsNotifyAll($nt->message));
            }else{
                $nt->user->notify(new EmailNotifyAll($nt->message));
            }
            $nt->delete();
        }

        return 'completed';
    }


    public function run_script(Request $request){
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        //$configuration->setLogger($logger);
        $client = CoinbaseClient::create($configuration);
        $rates = $client->getExchangeRates();
        $account = $client->getPrimaryAccount();
        $address = new Address([
            'name' => 'New Address'
        ]);
        $address = $client->createAccountAddress($account, $address);
        //dd($rates, $account, $address,$client->getNotifications());
        dd($rates, $address->getAddress());
        //$spotPrice->getAmount();
        /*$blockchain = new \Blockchain\Blockchain(env('BLOCKCHAIN_KEY'));
        $gap_int = $blockchain->ReceiveV2->checkAddressGap(env('BLOCKCHAIN_KEY'), env('BLOCKCHAIN_WALLET_XPUB'));
        echo $gap_int;
        $trs = Transaction::whereNotNull('paid_to')->whereNotNull('blockchain_secret')->where('status', 0)->inRandomOrder()->get();
        foreach ($trs as $k => $tr) {
            try{
                dd(url('/blockchain/callback?secret='.$tr->blockchain_secret));
                $logs = $blockchain->ReceiveV2->callbackLogs(env('BLOCKCHAIN_KEY'), url('/blockchain/callback?secret='.$tr->blockchain_secret));
                var_dump($logs);
                //dd($logs);
            }catch(\Exception $ex){
                echo $ex->getMessage();
            }

        }*/

        //$gap_int = $blockchain->ReceiveV2->checkAddressGap(env('BLOCKCHAIN_KEY'), env('BLOCKCHAIN_WALLET_XPUB'));//->generate(env('BLOCKCHAIN_KEY'), env('BLOCKCHAIN_WALLET_XPUB'), url('/blockchain/callback'), 20);//
        //dd($gap_int);
        //$response = Telegram::getUpdates();
        //$response = Telegram::setWebhook(['url' => '']);

        /*Telegram::sendMessage([
          'chat_id' => '1085650936',
          'text' => 'Hello World\n'
      ]);*/

      //dd($response);
      return'first stage';
    }

    public function telegramWebhook(){
        $updates = Telegram::commandsHandler(true);
        //$updates = Telegram::getWebhookUpdates();
        //User::where('email', 'free2liveb4u@gmail.com')->first()->notify(new EmailNotifyAll($updates['message']['chat']['id'].$updates));//telegram.med/Blognews360bot
        //$text = $updates['message']['text'];
    }

    public function coinbaseWebhook(Request $request){
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = CoinbaseClient::create($configuration);
        $raw_body = file_get_contents('php://input');
        $signature = $_SERVER['HTTP_CB_SIGNATURE'];
        $authenticity = $client->verifyCallback($raw_body, $signature); // boolean
        if($authenticity){
            $transaction = Transaction::where('paid_to', $request->data['address'])->where('status', 0)->first();
            if($transaction != null){
                $settings = Setting::first();
                $amount = number_format($request->additional_data['amount']['amount']/$settings->usd_bitcoin, 2);
                if(abs($transaction->amount - $amount) >= 2) $transaction->amount = $amount;
                $user = User::find($transaction->sender);
                if($user != null && $user->referrer_id != null){
                    $direct_ref = User::find($user->referrer_id);
                    if($direct_ref != null){
                        $tr = new Transaction;
                        $tr->amount = number_format($transaction->amount * 3/100, 2);
                        $tr->sender = $direct_ref->id;
                        $tr->receiver = 0;
                        $tr->status = 2;
                        $tr->description = "Referral Bonus ($user->email)";
                        $tr->save();
                    }
                }
    			$transaction->status = 1;
    			$transaction->save();

                $user->last_investment = $transaction->amount;
                $user->save();

                try{
                    $user->notify(new SharePurchased($transaction->amount));
                    Telegram::sendMessage([
                      'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                      'text' => "DEPODIT NOTIFIER: INVESTMENT OF $$transaction->amount HAS BEEN CONFIRMED FOR INVESTOR $user->name WITH WALLET $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                    ]);
                    if($user->telegram_chat_id != null){
                        Telegram::sendMessage([
                          'chat_id' => $user->telegram_chat_id,
                          'text' => "NOTIFIER:Investment Confirmed. \nHello $user->name \nYour Investment of $$transaction->amount has been successfully confirmed \n\nTran. Desc.: $transaction->description",
                        ]);
                    }
                }catch(\Exception $e){
                    //Do Nothing
                }
            }
        }
    }

    public function blockchainCallback(Request $request){
        //User::where('email', 'free2liveb4u@gmail.com')->first()->notify(new EmailNotifyAll($request->all()));
        if ($request->confirmations >= 6) {
            $transaction = Transaction::where('blockchain_secret', $request->secret)->where('status', 0)->first();
            if($transaction != null){
                $settings = Setting::first();
                $amount = number_format($request->value / (100000000 * $settings->usd_bitcoin), 2);
                if(abs($transaction->amount - $amount) >= 2) $transaction->amount = $amount;
                $user = User::find($transaction->sender);
                if($user != null && $user->referrer_id != null){
                    $direct_ref = User::find($user->referrer_id);
                    if($direct_ref != null){
                        $tr = new Transaction;
                        $tr->amount = number_format($transaction->amount * 3/100, 6);
                        $tr->sender = $direct_ref->id;
                        $tr->receiver = 0;
                        $tr->status = 2;
                        $tr->description = "Direct Referral Bonus ($user->email)";
                        $tr->save();


                    }
                }
    			$transaction->status = 1;
    			$transaction->save();

                $user->last_investment = $transaction->amount;
                $user->save();

                try{
                    $user->notify(new SharePurchased($transaction->amount));
                    Telegram::sendMessage([
                      'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                      'text' => "Investment of $$transaction->amount has been confirmed for Investor $user->name with wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                    ]);
                    if($user->telegram_chat_id != null){
                        Telegram::sendMessage([
                          'chat_id' => $user->telegram_chat_id,
                          'text' => "Investment Confirmed. \nHello $user->name \nYour Investment of $$transaction->amount has been successfully confirmed \n\nTran. Desc.: $transaction->description",
                        ]);
                    }
                }catch(\Exception $e){
                    //Do Nothing
                }
            }
            echo '*ok*';
        }
    }
}
