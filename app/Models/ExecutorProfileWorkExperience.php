<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorProfileWorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'executor_profile_id',
        'working_place',
        'recruitment_data',
        'dismissal_data'

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class);
    }
}
