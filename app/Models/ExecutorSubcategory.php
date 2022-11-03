<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutorSubcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'executor_profile_id',
        'subcategory_name',
    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorSubcategory::class,'executor_profile_id');
    }
}
