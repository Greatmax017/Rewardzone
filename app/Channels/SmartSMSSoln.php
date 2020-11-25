<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class SmartSMSSoln
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
        $url = env('SMART_SMS_SOLN_URL', null);
        $token =  env('SMART_SMS_SOLN_TOKEN', null);
        $client = new Client(); //GuzzleHttp\Client
        try {
            $res = $client->request('POST', $url, [
              'query' => [
                    'token'     => $token,
                    'message'   => $message['message'],
                    'sender'    => $message['sender'],
                    'type'      => 0,
                    'routing'   => 3,
                    'to'        => $notifiable->phone
              ]
            ]);
            //if($res->getStatusCode() == 200){
            //    dd($res->getBody()->getContents());
            //}

        } catch (RequestException $e) {
            //echo Psr7\str($e->getRequest());
            //if ($e->hasResponse()) {
            //    echo Psr7\str($e->getResponse());
            //}
            //return $this->return_error($request, 'Oops. An Error Occured making the request. Pleaase try again later');
        }
    }
}
