<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_number extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone_number',
        'token',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
