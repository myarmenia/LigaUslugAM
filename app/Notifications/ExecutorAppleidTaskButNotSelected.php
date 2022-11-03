<?php

namespace App\Notifications;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExecutorAppleidTaskButNotSelected extends Notification
{
    use Queueable;
    public  $clickontask_rejected_executor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClickOnTask  $clickontask_rejected_executor)
    {
        return $this->clickontask_rejected_executor = $clickontask_rejected_executor;
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
        return (new MailMessage)
                    ->line('Уважаемый Исполнитель, спасибо за  ваш отклик на заказ "'.$this->clickontask_rejected_executor->tasks->title.'", в этот раз клиент выбрал нужного специалиста.')
                    ->action('Перейти по ссылке', url('http://ligauslug.ru/orders'))
                    ->line('Спасибо за заявку');
    }
    public function toDatabase($notifiable)
    {
        return [
                                          'id' => $this->clickontask_rejected_executor->id,
                                     'task_id' => $this->clickontask_rejected_executor->task_id,
                                  'task_title' => $this->clickontask_rejected_executor->tasks->title,
                               'employer_name' => $this->clickontask_rejected_executor->tasks->users->name,
                          'employer_last_name' => $this->clickontask_rejected_executor->tasks->users->last_name,
                         'executor_profile_id' => $this->clickontask_rejected_executor->executor_profile_id,
                          'service_price_from' => $this->clickontask_rejected_executor->service_price_from,
                            'service_price_to' => $this->clickontask_rejected_executor->service_price_to,
                                        'cost' => $this->clickontask_rejected_executor->cost,
                              'startdate_from' => $this->clickontask_rejected_executor->startdate_from,
                               'start_date_to' => $this->clickontask_rejected_executor->start_date_to,
                           'offer_to_employer' => $this->clickontask_rejected_executor->offer_to_employer,
                                      'status' => $this->clickontask_rejected_executor->status,
'employer_offer_to_executor_task_meeting_date' => $this->clickontask_rejected_executor->employer_offer_to_executor_task_meeting_date,
'employer_offer_to_executor_task_meeting_time' => $this->clickontask_rejected_executor->employer_offer_to_executor_task_meeting_time,
                      'deadline_notify_status' => $this->clickontask_rejected_executor->deadline_notify_status,
                                  'created_at' => $this->clickontask_rejected_executor->created_at,
                                  'updated_at' => $this->clickontask_rejected_executor->updated_at

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
