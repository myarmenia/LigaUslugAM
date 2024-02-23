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
                    ->subject(__('message.completion_of_work_one_day_left'))
                    ->greeting(__('message.dear_executor'))
                    ->line('Թիվ '.$this->items->task_id.' համարի առաջադրանքի ժամկետը մոտենում է ավարտին')
                    ->action(__('message.follow_the_link'), url('http://ligauslug.ru/'))
                    ->line(__('message.thank_you_in_advance_for_submitting_your_work_on_time'));
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
