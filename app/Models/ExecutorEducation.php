<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'executor_profile_id',
        'education_type',
        'education_place'

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }
}
