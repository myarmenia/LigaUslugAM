<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialTaskExecutor extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'executor_id',

    ];
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_id');
    }
   
}
