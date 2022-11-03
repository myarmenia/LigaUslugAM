<?php

namespace App\Notifications;

use App\Models\Reiting;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RatingForCompletedTask extends Notification
{
    public $reiting;
    public $task;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reiting $reiting,Task $task)
    {
        return [$this->reiting = $reiting,$this->task = $task];
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
                    ->greeting('Уважаемый'.$this->reiting->executor_profiles->users->name.',')
                    ->line(''.$this->reiting->users->name.' похвалил Вас за работу')
                    ->action('Перейти по ссылке', url('http://ligauslug.ru/'))
                    ->line('Спасибо за Ваш интерес!');
    }

    public function toDatabase($notifiable)
    {
                        return
                               [
                                'task_id' => $this->reiting->task_id,
                             'task_title' => $this->task->title,
                                'user_id' => $this->reiting->user_id,
                               'employer' => $this->reiting->users->name,
                    'executor_profile_id' => $this->reiting->executor_profile_id,
                          'executor_name' => $this->reiting->executor_profiles->users->name,
        'employer_star_count_to_executor' => $this->reiting->employer_star_count_to_executor,
                                 'status' => "completed"


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
