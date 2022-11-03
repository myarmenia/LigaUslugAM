<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorPortfolioLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'executor_profile_id',
        'portfolio_link',

    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class);
    }
}
