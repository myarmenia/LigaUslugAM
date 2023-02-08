<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorForSpecialTask extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $show_new_task;
    public $user_id;
    public function __construct($user_id,$show_new_task)
    {
        // dd($show_new_task->special_task_executors->executor_profiles);
        // dd($show_new_task);
            $this->show_new_task=$show_new_task;
            $this->user_id=$user_id;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $user=User::where('id',$this->user_id)->first();

        if($user->geting_notification == 1){
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
                ->subject('Eсть специальное задание')
                ->view('Mails.notifyexecutorforspecialtask',['show_new_task'=>$this->show_new_task,'logo'=>'/images/logo_footer.png']);


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
