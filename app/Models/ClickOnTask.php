<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickOnTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'executor_profile_id',
        'service_price_from',
        'service_price_to',
        'cost',
        'startdate_from',
        'start_date_to',
        'offer_to_employer',
        'deadline_notify_status',
        'employer_watched_click'

    ];
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }



}
