<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorWorkingRegion extends Model
{
    use HasFactory;
    protected $fillable = [
        'executor_profile_id',
        'executorwork_region',
        'working_rayon',

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class);
    }
}
