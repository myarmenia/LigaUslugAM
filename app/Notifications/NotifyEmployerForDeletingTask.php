<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyEmployerForDeletingTask extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $ditails;
    public function __construct($ditails)
    {
        $this->ditails=$ditails;
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
        ->subject(__('message.deleting_tasks_due_to_lack_of_feedback'))
        ->view('Mails.notifyemployerfordeletingtask',['deletetask'=>$this->ditails,'logo'=>'/images/logo_footer.png']);
    }
    public function toDatabase($notifiable)
    {
        return [
            'task_id' => $this->ditails->id,
            'user_id' => $this->ditails->user_id,
            'employer_name' => $this->ditails->users->name,
            'employer_last_name' => $this->ditails->users->last_name,
            'task_title' => $this->ditails->title,
            'category_name' => $this->ditails->category_name,
            'subcategory_name'=>$this->ditails->subcategory_name,
            'created_at'=>$this->ditails->created_at
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
