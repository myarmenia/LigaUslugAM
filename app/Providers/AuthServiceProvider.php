<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        // Passport::routes();
        VerifyEmail::toMailUsing(function ($notifiable, $url){
            return (new MailMessage)
            ->subject('Подтвердите адрес электронной почты')
            ->line('Нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.')
            ->action('Подтвердите адрес электронной почты',$url);
        });
    }
}
