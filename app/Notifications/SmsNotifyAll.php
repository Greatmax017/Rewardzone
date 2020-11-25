<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SmsNotifyAll extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return [SmartSMSSoln::class, 'mail'];
        return [Multitexter::class];
    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toSmartSMS($notifiable)
    {
        return array(   'sender'=>'CryptoBbB',
                        'message' => $this->message);
    }
}
