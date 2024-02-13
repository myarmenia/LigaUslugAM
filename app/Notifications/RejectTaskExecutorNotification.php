<?php

namespace App\Notifications;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectTaskExecutorNotification extends Notification  implements ShouldBroadcast
{
    use Queueable;
    // public $executor;
    // public $task;
    public $click_on_task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClickOnTask $click_on_task)
    {
        $this->click_on_task = $click_on_task;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if($this->click_on_task->executor_profiles->users->geting_notification==1){

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

        return (new MailMessage)->subject(__('message.the_customer_chose_the_right_specialist'))->view('Mails.rejecttaskexecutor',['click_on_task'=> $this->click_on_task->tasks->title,'logo'=>'/images/logo_footer.png']);

    }

    public function toDatabase($notifiable)
    {
                return
                        [
                            'task_id' => $this->click_on_task->task_id,
                            'task_title' => $this->click_on_task->tasks->title,
                            'employer_name' => $this->click_on_task->tasks->users->name,
                            'employer_lastName' => $this->click_on_task->tasks->users->last_name,
                            'executor_profile_id' => $this->click_on_task->executor_profile_id,
                            'status' => $this->click_on_task->status,

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
        // return [
        //           'user_name' => $this->message['user_name'],
        //          'user_email' => $this->message['user_email'],
        // ];
    }
    /**
 * Get the broadcastable representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return BroadcastMessage
 */

}
