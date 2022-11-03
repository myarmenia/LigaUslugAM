<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorEmployerCompletedTask extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $task;
    public function __construct(Task $task)
    {
        return $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->task->executor_profiles->users->geting_notification==1){

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


        return (new MailMessage)->view('Mails.notifyexecutoremployercompletedtask',['task'=> $this->task,'logo'=>'/images/logo_footer.png']);
    }
    public function toDatabase($notifiable)
    {

        return
            [

                'task_id' => $this->task->id,
                'task_title' => $this->task->title,
                'employer_name' => $this->task->users->name,
                'employer_lastName' => $this->task->users->last_name,
                'executor_profile_id'=>$this->task->executor_profile_id,
                'executor_name' => $this->task->executor_profiles->users->name,
                'executor_lastName' => $this->task->executor_profiles->users->last_name,
                'executor_material_price'=>$this->task->executor_material_price,
                'executor_work_price'=>$this->task->executor_work_price,
                'executor_total_price'=>$this->task->executor_total_price,
                'created_at'=>$this->task->created_at,
                'from_employer'=>$this->task->users->name.' '.$this->task->users->last_name
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
        return [
            //
        ];
    }
}
