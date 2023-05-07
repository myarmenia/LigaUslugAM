<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReturnedMoneyExecutorTwoDay extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $message;
    public function __construct($message)
    {
        $this->message=$message;

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
        return (new MailMessage)->subject('Ваши деньги возвращены ')->view('Mails.returnedmoney',['click_on_task'=> $this->message->tasks->title,'logo'=>'/images/logo_footer.png']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
                        return
                               [
                                'task_id' => $this->message->task_id,
                             'task_title' => $this->message->tasks->title,
                                'user_id' => $this->message->tasks->user_id,
                               'employer' => $this->message->tasks->users->name,
                    'executor_profile_id' => $this->message->executor_profile_id,
                          'executor_name' => $this->message->executor_profiles->users->name,
                                 'status' => $this->message->status

                        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
