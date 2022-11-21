<?php

namespace App\Notifications;

use App\Models\Reiting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorForGettingRating extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $rating;
    public function __construct(Reiting $ratingforexecutor)
    {

        return $this->rating=$ratingforexecutor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if($this->rating->tasks->users->geting_notification == 1){

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
        return (new MailMessage)->subject('Заказчик оценил вашу работу')->view('Mails.notifyexecutorforgettingrating',['rating'=> $this->rating,'logo'=>'/images/logo_footer.png']);
    }

    public function toDatabase($notifiable)
    {

        return
            [
                'task_id' => $this->rating->task_id,
                'task_title' => $this->rating->tasks->title,
                'user_id' => $this->rating->user_id,
                'employer_name' => $this->rating->tasks->users->name,
                'employer_last_name' => $this->rating->tasks->users->last_name,
                'executor_profile_id' => $this->rating->executor_profile_id,
                'executor_name' => $this->rating->tasks->executor_profiles->users->name,
                'executor_last_name' => $this->rating->tasks->executor_profiles->users->last_name,
                'employer_star_count_to_executor'=>$this->rating->employer_star_count_to_executor,
                'employer_review_to_executor'=>$this->rating->employer_review_to_executor,
                'created_at'=>$this->rating->created_at,
                'from_employer'=>$this->rating->tasks->users->name.' '.$this->rating->tasks->users->last_name
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
