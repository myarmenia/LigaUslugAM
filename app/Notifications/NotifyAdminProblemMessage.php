<?php

namespace App\Notifications;

use App\Models\ExecutorProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyAdminProblemMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $problem_message;
    public function __construct($problem_message)
    {
        $this->problem_message=$problem_message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $executor=ExecutorProfile::where('id',$this->problem_message->executor_profile_id)->first();
        return [
             'problem_message_id'=>$this->problem_message->id,
            'employer_id'=>$this->problem_message->tasks->user_id,
            'employer_name'=>$this->problem_message->tasks->users->name.' '.$this->problem_message->tasks->users->last_name,
            'employer_email'=>$this->problem_message->tasks->users->email,
            'task_title'=>$this->problem_message->tasks->title,
            'text'=>$this->problem_message->problem_description,
            'executor_id'=>$this->problem_message->executor_profile_id,
            'executor'=>$this->problem_message->tasks->executor_profiles->users->name.' '.$this->problem_message->tasks->executor_profiles->users->last_name
        ];

    }
}
