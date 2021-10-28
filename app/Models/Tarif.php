<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'parametr',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, Tarif_user::class);
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }
}

