<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'type_registration',
        'compony_name',
        'balance',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function card()
    {
        return $this->hasMany(Card::class);
    }

    public function phone_number()
    {
        return $this->hasOne(Phone_number::class);
    }


    public function support_task()
    {
        return $this->hasMany(Support_task::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contracts::class);
    }

    public function history_of_balance_replenishment()
    {
        return $this->hasMany(History_of_balance_replenishment::class);
    }

    public function history_of_card_replenishment()
    {
        return $this->hasMany(History_of_card_replenishment::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
