<?php

namespace App\Notifications;

use App\Models\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CallBackNotification extends Notification
{
    use Queueable;
    public $insert;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $insert)
    {
             $this->insert =$insert;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('http://ligauslug.ru/'))
                    ->line('Thank you for using our application!');
    }
    public function toDatabase($notifiable)
    {
        return [
                     'name' => $this->insert->name,
             'phone_number' => $this->insert->phone_number,
            'selected_date' => $this->insert->selected_date,
            'selected_time' => $this->insert->selected_time,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //
    }
}
