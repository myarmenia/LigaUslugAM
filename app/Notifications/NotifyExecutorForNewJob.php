<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorForNewJob extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $ditails;
    public function __construct($ditails)
    {
        $this->ditails=$ditails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('Новые задания от ligauslug.ru.')
        //             // ->action('Notification Action', url('/http://ligauslug.ru/'))
        //                 ->attach('images/logo_footer.png')
        //             ->line('Спасибо, что выбрали нас!');
        return (new MailMessage)->view('Mails.newjob',['newjob'=>$this->ditails,'logo'=>'/images/logo_footer.png']);
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
