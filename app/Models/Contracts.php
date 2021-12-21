<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number',
        'date_and',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
