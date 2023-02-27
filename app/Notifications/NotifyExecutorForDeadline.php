<?php

namespace App\Notifications;

use App\Models\ClickOnTask;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;



class NotifyExecutorForDeadline extends Notification
{
    use Queueable;
    public $items;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClickOnTask $items)
    {
        return $this->items = $items;
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
                    ->subject('Завершение работы, осталось один день')
                    ->greeting('Уважаемый исполнитель!')
                    ->line('Время номер '.$this->items->task_id.' задачи подходит к концу')
                    ->action('Перейти по ссылке,', url('http://ligauslug.ru/'))
                    ->line('Заранее благодарим за сдачу работы вовремя!');
    }
    public function toDatabase($notifiable)
    {
        return [
                                            'id' => $this->items->id,
                                       'task_id' => $this->items->task_id,
                           'executor_profile_id' => $this->items->executor_profile_id,
                            'service_price_from' => $this->items->service_price_from,
                              'service_price_to' => $this->items->service_price_to,
                                          'cost' => $this->items->cost,
                                'startdate_from' => $this->items->startdate_from,
                                 'start_date_to' => $this->items->start_date_to,
                             'offer_to_employer' => $this->items->offer_to_employer,
                                        'status' => $this->items->status,
  'employer_offer_to_executor_task_meeting_date' => $this->items->employer_offer_to_executor_task_meeting_date,
  'employer_offer_to_executor_task_meeting_time' => $this->items->employer_offer_to_executor_task_meeting_time,
                        'deadline_notify_status' => $this->items->deadline_notify_status,
                                    'created_at' => $this->items->created_at,
                                    'updated_at' => $this->items->updated_at

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
