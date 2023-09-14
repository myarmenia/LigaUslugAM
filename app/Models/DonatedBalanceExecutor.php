<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonatedBalanceExecutor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_id');
    }


}
