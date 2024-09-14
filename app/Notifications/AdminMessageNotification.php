<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class AdminMessageNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
     public function __construct($message)
    {
        $this->message = $message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Dear Admin')
                    ->line(new HtmlString('New Message was posted on CSEAG with subject: <b>'.$this->message->subject.'</b>'))
                    ->line('Please login to the platform and Forward the message to the assigned expert.')
                    ->line('Message at : https://teams.cyberexpertgh.org/messages/details/'.$this->message->id)
                    ->line('Kindly proccess in a timely manner');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->message->id,
            'message_subect' => $this->message->subject,
            'sent_by' => $this->message->name,
        ];
    }
}
