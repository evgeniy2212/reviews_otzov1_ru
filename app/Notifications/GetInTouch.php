<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GetInTouch extends Notification
{
    use Queueable;

    private $name;
    private $email;
    private $phone;
    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        string $name, string $phone, string $email, string $message
    )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
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
                    ->line('The Get In Touch Info.')
                    ->line('Name: ' . $this->name)
                    ->line('Email: ' . $this->email)
                    ->line('Phone: ' . $this->phone)
                    ->line('Message: ' . $this->message)
//                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
