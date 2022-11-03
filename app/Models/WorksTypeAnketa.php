<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksTypeAnketa extends Model
{
    use HasFactory;
    protected $fillable=[
        'executor_user_id',
        'category_name',
        'subgategory_name'
    ];
}
