<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyExecutorForNewJobEveryTime extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $show_new_task;
    public $user_id;
    public function __construct($user_id,$show_new_task)
    {
            $this->show_new_task=$show_new_task;
            $this->user_id=$user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // $user=User::where('id',$this->user_id)->first();

        // if($user->geting_notification == 1){

        //     return ['mail','database'];
        // }else{
        //     return ['database'];
        // }
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
                    ->line('aaaaaaaaaaaaaaa.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    public function toDatabase($notifiable)
    {

        return
            [
                'task_id' => $this->show_new_task[0]->id,
                'task_title' => $this->show_new_task[0]->title,
                'user_id' => $this->show_new_task[0]->user_id,
                'employer_name' => $this->show_new_task[0]->users->name,
                'employer_last_name' => $this->show_new_task[0]->users->last_name,
                'category_name' => $this->show_new_task[0]->category_name,
                'subcategory_name'=>$this->show_new_task[0]->subcategory_name,
                'nation'=>$this->show_new_task[0]->nation,
                'country_name'=>$this->show_new_task[0]->country_name,
                'region'=>$this->show_new_task[0]->region,
                'address'=>$this->show_new_task[0]->address,
                'task_description'=>$this->show_new_task[0]->task_description,
                'task_starttime'=>$this->show_new_task[0]->task_starttime,
                'task_finishtime'=>$this->show_new_task[0]->task_finishtime,
                'price_from'=>$this->show_new_task[0]->price_from,
                'price_to'=>$this->show_new_task[0]->price_to,
                'task_location'=>$this->show_new_task[0]->task_location,
                'from_employer'=>$this->show_new_task[0]->users->name.' '.$this->show_new_task[0]->users->last_name
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
