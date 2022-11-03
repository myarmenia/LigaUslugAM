<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reiting extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'user_id',
        'executor_profile_id',
        'employer_star_count_to_executor',
        'employer_review_to_executor',
        'executor_star_count_to_employer',
        'executor_review_to_employer'
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }

}
