<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safety_system extends Model
{
    use HasFactory;
    protected $fillable = [
        'telminal_id',
        'name',
        'content',
        'status'
    ];

    public function terminal_location()
    {
        return $this->belongsTo(Terminal_location::class);
    }
}
