<?php

namespace App\Notifications;

use App\Models\ClickOnTask;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotifiyEmployer extends Notification
{
    public $clickontask;
    use Queueable;

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

        if($this->clickontask->tasks->users->geting_notification==1){

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
        return (new MailMessage)
                    // ->greeting('Уважаемый(ая) '.$this->clickontask->tasks->users->name.',')
                    ->greeting('simon'.$this->clickontask->tasks->users->name.',')
                    ->line('На ваше задание появился новый отклик. Ознакомьтесь с предложением и выберите пожалуйста специалиста для выполнения вашего задания.')
                    ->action('Перейти по ссылке', url('/http://ligauslug.ru/'))
                    ->line('Заранее спасибо вам.');
    }
    public function toDatabase($notifiable)
    {
        // return $this->clickontask
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
                             'status' => 'apply',


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
