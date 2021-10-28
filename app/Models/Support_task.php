<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support_task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'subgect',
        'message',
        'status'
    ];
}

