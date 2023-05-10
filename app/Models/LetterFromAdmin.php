<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterFromAdmin extends Model
{
    use HasFactory;
    protected $fillable=[
        "support_id",
        "user_id",
        "text"
    ];
}
