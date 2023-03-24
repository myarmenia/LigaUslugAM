<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable=[
        "chatroom_name",
        "task_id",
        "user_id",
        "executor_profile_id",
        "employer_message",
        "executor_message",
        "employer_message_file",
        "executor_message_file",
        "employer_read_at",
        "executor_read_at"

    ];

    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
