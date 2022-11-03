<?php

namespace App\Notifications;

use App\Http\Resources\InProcessResource;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyAsTaskExecutor extends Notification implements ShouldBroadcast
{
    use Queueable;
    public $selected_executor_click_on_task;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClickOnTask $selected_executor_click_on_task)
    {
        $this->selected_executor_click_on_task = $selected_executor_click_on_task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if($this->selected_executor_click_on_task->executor_profiles->users->geting_notification==1){

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
                    ->greeting('Уважаемый(ая) коллега!')
                    ->line('Вы были выбраны для выполнения '.$this->selected_executor_click_on_task->tasks->title.' задачи.')
                    ->action('Перейди по ссылке', url('http://ligauslug.ru/'))
                    ->line('Уважаемый исполнитель, я уверен в успешном ходе нашего сотрудничества.');
    }
     /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'task_id' => $this->selected_executor_click_on_task->task_id,
            'user_id' => $this->selected_executor_click_on_task->tasks->user_id,
           'employer' => $this->selected_executor_click_on_task->tasks->users->name,
         'task_title' => $this->selected_executor_click_on_task->tasks->title,
'executor_profile_id' => $this->selected_executor_click_on_task->executor_profile_id,
      'executor_name' => $this->selected_executor_click_on_task->executor_profiles->users->name,
 'service_price_from' => $this->selected_executor_click_on_task->service_price_from,
   'service_price_to' => $this->selected_executor_click_on_task->service_price_to,
               'cost' => $this->selected_executor_click_on_task->cost,
     'startdate_from' => $this->selected_executor_click_on_task->startdate_from,
      'start_date_to' => $this->selected_executor_click_on_task->start_date_to,
  'offer_to_employer' => $this->selected_executor_click_on_task->offer_to_employer,
             'status' => $this->selected_executor_click_on_task->tasks->status,

        ];
    }
    public function toBroadcast($notifiable)
    {
        return [
            'data'=>[

                'task'=> "hel"
            ]

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

    }
}

