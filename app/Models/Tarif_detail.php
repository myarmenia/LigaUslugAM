<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'price',
        'url'
    ];
}
