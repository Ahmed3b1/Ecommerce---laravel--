<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification 
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    // القنوات اللي هيرسل فيها الإشعار
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    // إشعار الإيميل
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('hello ' . $this->user->name)
                    ->line('Your Acount Has Been Created Successfully')
                    ->action('Dashboard', url('/dashboard'));
    }

    // إشعار قاعدة البيانات
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'message' => 'A New User Has Been recorded ' . $this->user->name,
        ];
    }
}
