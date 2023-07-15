<?php

namespace App\Notifications;

use App\Models\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignupActivate extends Notification
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
        $url = url('/api/auth/signup/activate/'.$notifiable->activation_token);
        return (new MailMessage)
            ->subject('Thank you for registering with our application!')
            ->line('To activate your account, please click the button below.')
            ->action('Activate Account', url($url))
            ->line('If you did not register for an account, please ignore this email.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ]; 
    }
}
