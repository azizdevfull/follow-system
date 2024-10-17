<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowedNotification extends Notification
{
    use Queueable;

    protected $follower;
    public function __construct($follower)
    {
        $this->follower = $follower;
    }
    public function via(object $notifiable): array
    {
        return ['database']; // mail xam qoshib qoysak bo'ladi ['mail','database']
    }
    // agar mail bo'lsa ishlidi
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->name,
        ];
    }


}
