<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use App\Channels\Multitexter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class ProfitPaid extends Notification
{
    use Queueable;

    protected $amount, $bwid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount, $bwid)
    {
        $this->amount = $amount;
        $this->bwid = $bwid;
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
            ->subject('Cryptobitbybit Profit Paid')
            ->greeting("Hello $notifiable->name,")
            ->line('Your profit of $'.$this->amount.' has been paid to '.$this->bwid.'.')
            ->action('Enter Dashboard', url('dashboard'))
            ->line('Invest wisely.');
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
                        'message' => 'Your profit of '.$this->amount.' has been paid to '.$this->bwid.'.');
    }
}
