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
        'compony',
        'phone',
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

    public function payments_card()
    {
        return $this->hasOne(Payments_card::class);
    }
    // public function tarif_user()
    // {
    //     return $this->hasOne(Payments_card::class);
    // }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class, Tarif_user::class);
    }
    public function card()
    {
        return $this->hasOne(Card::class);
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
