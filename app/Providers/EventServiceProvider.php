<?php

namespace App\Providers;

use App\Events\GiveQuestion;
use App\Events\RequestCallBack;
use App\Listeners\GiveQuestionAdmin;
use App\Listeners\GivQuestionAdmin;
use App\Listeners\SendCallBackNotification as ListenersSendCallBackNotification;
use App\Listeners\SendNewUserNotification;
use App\Notifications\SendCallBackNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class
        ],
        // eventy grancum enq EventServiseProviderum wor heto listen anenq  te ur petq e uxarkenq notificatian
        RequestCallBack::class =>[
           ListenersSendCallBackNotification::class
        ],
        // GiveQuestion::class =>[
        //     GiveQuestionAdmin::class
        //  ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
