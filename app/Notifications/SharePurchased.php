<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class SharePurchased extends Notification
{
    use Queueable;

    protected $amount;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
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
            ->subject('Cryptobitbybit Investment Confirmed')
            ->greeting("Hello $notifiable->name,")
            ->line('Your investment worth $'.$this->amount.' has been sussessfully confirmed. Your investment will automatically start growing seamlessly.')
            ->action('Enter Dashboard', url('dashboard'))
            ->line('Break the barriers of fear and Invest wisely.');
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
                        'message' => 'Your investment worth $'.$this->amount.' has been confirmed.');
    }
}
