<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'email_verified_at',
        'password',
        'role',
        'remember_token'
    ];
}
