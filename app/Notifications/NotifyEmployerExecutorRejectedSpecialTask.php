<?php

namespace App\Notifications;

use App\Models\specialTaskExecutor;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyEmployerExecutorRejectedSpecialTask extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $special_task;
    public function __construct(specialTaskExecutor $special_task)
    {
        $this->special_task=$special_task;
        // dd($this->special_task);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if($this->special_task->tasks->users->geting_notification==1){

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
        return (new MailMessage)->subject('Специалист отклонил персональный заказ')->view('Mails.notifyemployerexecutorrejectedtask',['special_task'=> $this->special_task->tasks->title,'logo'=>'/images/logo_footer.png']);

        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

            return
            [
                 'task_id' => $this->special_task->tasks->id,
                 'task_title' =>$this->special_task->tasks->title,
                 'employer_name' => $this->special_task->tasks->users->name,
                 'employer_lastName' => $this->special_task->tasks->last_name,
                 'text'=>'Уважаемый заказчик, исполнитель,  отклонил персональный заказ! Ваш заказ будет удален.'
        ];
    }
}
