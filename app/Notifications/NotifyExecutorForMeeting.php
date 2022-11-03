<?php

namespace App\Notifications;

use App\Models\ClickOnTask;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotifyExecutorForMeeting extends Notification
{
    use Queueable;
    public $clickontask;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClickOnTask $clickontask)
    {
        return $this->clickontask = $clickontask;
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
                    ->greeting('Уважаемый исполнитель!')
                    ->line('Вы откликнулис на  задание '.$this->clickontask->tasks->title.' и я хотел бы назначить встречу с вами '.$this->clickontask->employer_offer_to_executor_task_meeting_date. ' день, '.$this->clickontask->employer_offer_to_executor_task_meeting_time. ' час.')
                    ->action('Перейти по ссылке', url('ligauslug.ru'))
                    ->line('Я уверен в успешном ходе нашего сотрудничества.');
    }
    public function toDatabase($notifiable)
    {
        return [
                                        'task_id' => $this->clickontask->task_id,
                                        'user_id' => $this->clickontask->tasks->user_id,
                                       'employer' => $this->clickontask->tasks->users->name,
                                     'task_title' => $this->clickontask->tasks->title,
                                  'executor_name' => Auth::user()->name,
                             'service_price_from' => $this->clickontask->service_price_from,
                               'service_price_to' => $this->clickontask->service_price_to,
                                           'cost' => $this->clickontask->cost,
                                 'startdate_from' => $this->clickontask->startdate_from,
                                  'start_date_to' => $this->clickontask->start_date_to,
                              'offer_to_employer' => $this->clickontask->offer_to_employer,
                                         'status' => 'meeting',
    'employer_offer_to_executor_task_meeting_date'=> $this->clickontask->employer_offer_to_executor_task_meeting_date,
    'employer_offer_to_executor_task_meeting_time'=> $this->clickontask->employer_offer_to_executor_task_meeting_time
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
