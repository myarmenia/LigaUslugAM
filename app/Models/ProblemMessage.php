<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemMessage extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'task_id',
        'executor_profile_id',
        'problem_description',
        'status'
    ];
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function support_feedback_problem_messages(){
        return $this->hasMany(SupportFeedbackProblemMessage::class);
    }
}
