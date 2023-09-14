<?php

namespace App\Notifications;

use App\Models\DonatedBalanceExecutor;
use App\Models\ExecutorProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonatedBalanceNotificaton extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $donated_balance;
    public $user_id;
    public function __construct(DonatedBalanceExecutor  $donated_balance)
    {
        dd($this->donated_balance);

        return $this->donated_balance = $donated_balance;
    }



    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $executor=ExecutorProfile::where('id',$this->donated_balance->executor_id)->first();

        if( $executor->users->geting_notification == 1){
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
                    ->subject('Подарок')
                    ->view('Mails.notifyexecutdonatedmoney',['donated'=> $this->donated_balance,'logo'=>'/images/logo_footer.png']);

    }
    public function toDatabase($notifiable)
    {
        // return $this->clickontask
        return [

                'executor_id' => $this->donated_balance->executor_id,
                'executor_name' => $this->donated_balance->executor_profiles->users->name.' '.$this->donated_balance->executor_profiles->users->last_name,
                'donated_money' => $this->donated_balance->donated_money,
                'text'=>"Вы заполнили 70% анкеты и Ваш счет пополнен на '{{$this->donated_balance->donated_money}}' рублей."

            ];
    }
}
