<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tarif_id',
        'card_id',
        'status',
        'date_start',
        'date_end',
        'water_quantity',
        'oute_input',
        'other_info'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
