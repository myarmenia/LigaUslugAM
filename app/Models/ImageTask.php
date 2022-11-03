<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'image_name'
    ];
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
