<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class CustomWelcome extends Notification
{
    use Queueable;

    protected $activation_link;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activation_link)
    {
        $this->activation_link = $activation_link;
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
        //return [Multitexter::class, 'mail'];
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome to Cryptobitbybit Trading')
            ->greeting("Hello $notifiable->name,")
            ->line('Welcome to Cryptobitbybit Trading. your registration was successful, Immediately you activate your account, you can quickly purchase shares to start making up to 20% every 4 days.')
            ->action('Click to Activate Your Account', $this->activation_link)
            ->line('All you need to do is make investment and let the Crypto Traders make profit for you and the company seamlessly.');
    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSmartSMS($notifiable)
    {
        return array(   'sender'=>'CryptoBbB',
                        'message' => 'Welcome to Cryptobitbybit. You can invest to start making up to 20% every 4 days. www.cryptobitbybit.com.');
    }
}
