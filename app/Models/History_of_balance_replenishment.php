<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_of_balance_replenishment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_methods',
        'amount_of_payment',
        'payment_number',
        'comment'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
