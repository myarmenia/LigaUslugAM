<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorEducationCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'executor_profile_id',
        'certificate',
        'certificate_base'

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }
}
