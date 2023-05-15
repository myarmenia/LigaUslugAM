<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyEmployerDeleteTaskFromTwoDay extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $message;
    public function __construct($item)
    {
        $this->message=$item;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->message->users->geting_notification == 1){

            return ['mail','database'];

        }else{

            return ['database'];
        }

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
                ->subject('Задание будет удалена')
                ->view('Mails.notifyemployertwodaysnotclick',['task'=>$this->message,'logo'=>'/images/logo_footer.png']);
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
            'task_id'=>$this->message->id,
            'employer_id'=>$this->message->user_id,
            'employer_name'=>$this->message->users->name.' '.$this->message->users->last_name,
            'task_title'=>$this->message->title,
            'text'=>"На ваше задание ".$this->message->title." нет откликов, если в течение двух дней не будет откликов задание будет удалена."

        ];
    }
}
