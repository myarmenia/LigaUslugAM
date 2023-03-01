<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerAndQuestion extends Model
{
    use HasFactory;
    protected $fillable=[
        "answer_and_question",
        "img_path",
    ];
}
