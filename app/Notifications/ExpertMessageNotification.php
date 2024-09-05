<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

use App\Models\Expert;

class ExpertMessageNotification extends Notification
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Dear '.$this->message->expert_name.',')
                    ->line(new HtmlString('You have a new message <hr>'))
                    ->line('Subject: '.$this->message->subject)
                    ->line('Message: '.$this->message->message)
                    ->line('Sent By: '.$this->message->name)
                    ->line('Email: '.$this->message->email)
                    ->line('Please assist this client in relation to the above');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */


    //  public function toDatabase($notifiable)
    // {
    //     return [
    //         'message_id' => $this->message->id
    //     ];
    // }


    public function toArray(object $notifiable): array
    {
        // return [
        //     'message_id' => $this->message->id
        // ];
    }
}
