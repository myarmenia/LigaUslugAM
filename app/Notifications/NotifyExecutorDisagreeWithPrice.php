<?php

namespace App\Notifications;

use App\Models\ExecutorProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorDisagreeWithPrice extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public  $problem_message;
    public function __construct( $problem_message)
    {
        $this->problem_message=$problem_message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
         $executor=ExecutorProfile::where('id',$this->problem_message->executor_profile_id)->first();

        if( $executor->users->geting_notification == 1){
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
        ->subject('Не согласен с ценой')
        ->view('Mails.disagreewithprice',['disagreewithprice'=>$this->problem_message,'logo'=>'/images/gorcka.png']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
$executor=ExecutorProfile::where('id',$this->problem_message->executor_profile_id)->first();
        return [

            'employer_id'=>$this->problem_message->tasks->user_id,
            'employer_name'=>$this->problem_message->tasks->users->name.' '.$this->problem_message->tasks->users->last_name,
            'task_title'=>$this->problem_message->tasks->title,
            'text'=>$this->problem_message->problem_description,

        ];
    }
}
