<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_id',
        'model',
        'car_numbers',
        'status'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

}
