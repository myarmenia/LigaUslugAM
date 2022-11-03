<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportFeedbackProblemMessage extends Model
{
    use HasFactory;
    protected $fillable=[
        'problem_message_id',
        'user_id',
        'text'
    ];
    public function problem_messages(){
        return $this->belongsTo(ProblemMessage::class,'problem_message_id');
    }
}
