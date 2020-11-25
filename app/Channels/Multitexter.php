<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class Multitexter
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSmartSMS($notifiable);
        $url = env('MULTITEXTER_URL', null);
        $username = env('MULTITEXTER_USERNAME', null);
        $password = env('MULTITEXTER_PASSWORD', null);
        //$client = new Client(); //GuzzleHttp\Client
        $phone = preg_match('/^0/',$notifiable->phone) ? preg_replace("/^0/", "234", $notifiable->phone) : $notifiable->phone;
        try {
            $mssg = urlencode($message['message']);
            $sender= urlencode($message['sender']);
            $url = $url.'?username='.$username.'&password='.$password.'&sender='.$sender.'&message='.$mssg .'&flash=0&recipients='. $phone;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $resp = curl_exec($ch);
            curl_close($ch);
        } catch (\Exception $e) {
            //echo Psr7\str($e->getRequest());
            //if ($e->hasResponse()) {
            //    echo Psr7\str($e->getResponse());
            //}
            //return $this->return_error($request, 'Oops. An Error Occured making the request. Pleaase try again later');
        }
    }
}
