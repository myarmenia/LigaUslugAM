<?php

namespace App\Notifications;

use App\Models\ProblemMessage;
use App\Models\SupportFeedbackProblemMessage;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SupportFeedbackNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $support_feedback;
    public function __construct(SupportFeedbackProblemMessage $supportFeedbackProblem)
    {

        return $this->support_feedback=$supportFeedbackProblem;

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


        return (new MailMessage)->view('Mails.supportfeedbackproblemmessage',['supportfeedback'=> $this->support_feedback,'logo'=>'/images/logo_footer.png']);
    }
    public function toDatabase($notifiable)
    {
     
                        return
                               [

                                    'task_id' => $this->support_feedback->problem_messages->tasks->id,
                                    'task_title' => $this->support_feedback->problem_messages->tasks->title,
                                    'employer_name' => $this->support_feedback->problem_messages->tasks->users->name,
                                    'employer_lastName' => $this->support_feedback->problem_messages->tasks->users->last_name,
                                    'text'=>$this->support_feedback->text,
                                    'created_at'=>$this->support_feedback->created_at,
                                    'from_support'=>'ОТ служба поддержки'
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
