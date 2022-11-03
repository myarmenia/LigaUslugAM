<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorPortfolio extends Model
{
    use HasFactory;
     protected $fillable = [
        'executor_profile_id',
        'portfolio_pic',
        'portfoliopic_base'

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class);
    }
}
