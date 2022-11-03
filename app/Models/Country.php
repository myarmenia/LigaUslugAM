<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'country_name'
    ];
    public function regions(){
        return $this->belongsTo(Region::class,'region_id');
    }
}
