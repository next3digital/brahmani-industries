<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCodeNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your two factor code is ' . $notifiable->two_factor_code)
            ->action('Verify Here', route('twoFactor.show'))
            ->line('The code will expire in 15 minutes')
            ->line('If you have not tried to login, ignore this message.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
