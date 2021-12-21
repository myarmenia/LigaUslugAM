<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_number',
        'balance',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
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
