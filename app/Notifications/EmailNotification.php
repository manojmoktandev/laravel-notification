<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class EmailNotification extends Notification Implements ShouldQueue
{
    use Queueable;
    public $email_params;

    /**
     * Create a new notification instance.
     */
    public function __construct($email_params)
    {
        //
        $this->email_params =  $email_params;
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
        ->view('mail.mail-template',['email_params'=>$this->email_params]);
    //                 ->line('Welcome to the '. $this->email_params['title'])
    //                 ->action('Notification Action', url('/'.$this->email_params['slug-title']))
    //                 ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
