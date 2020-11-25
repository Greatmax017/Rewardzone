<?php

namespace App\Notifications;

use App\Channels\SmartSMSSoln;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class CustomAccountActivated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmartSMSSoln::class, 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $expires = $notifiable->license->expires_at->toDayDateTimeString();
        return (new MailMessage)
            ->subject('Bitlife Trading Account Activated')
            ->greeting("Hello $notifiable->name,")
            ->line("Your account has been successfully activated.")
            ->action('Enter Dashboard', url('dashboard'))
            ->line('Enjoy all our services in your newly activated account. Remember that you can earn more by referring people using your referral link.');
    }

    /**
     * Get the smartsms solutions representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSmartSMS($notifiable)
    {
        $expires = $notifiable->license->expires_at->toDayDateTimeString();
        return array(   'sender'=>'Bitlife',
                        'message' => "Congratulations, Your Bitlife account has been successfully activated. . View dashboard ".url('dashboard'));
    }
}
