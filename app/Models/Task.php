<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'category_name',
        'subcategory_name',
        'nation',
        'country_name',
        'region',
        'address',
        'task_description',
        'task_starttime',
        'task_finishtime',
        'price_from',
        'price_to',
        'executor_profile_id',
        'executor_material_price',
        'executor_work_price',
        'executor_total_price',
        'executor_completed_task',
        'task_location',
        'views',
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

// for getting user name from users tables but we have executor_user_id in tasks table
    public function executor(){
        return $this->belongsTo(User::class, 'id');
    }
    public function executor_task(){
        return $this->belongsTo(ExecutorProfile::class, 'executor_profile_id');
    }
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class, 'executor_profile_id');
    }


    public function click_on_tasks(){
        return $this->hasMany(ClickOnTask::class);
    }
    public function  image_tasks(){
        return $this->hasMany(ImageTask::class);
    }
    public function categories(){
        return $this->belongsTo(Category::class,'category_name');
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }
    public function reitings(){
        return $this->hasOne(Reiting::class);
    }
    public function problem_messages(){
        return $this->hasMany(ProblemMessage::class);
    }
    // public function special_task_executors(){
    //     return $this->hasMany(specialTaskExecutor::class);
    // }
    public function special_task_executors(){
        return $this->hasOne(specialTaskExecutor::class);
    }


}
