<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;
    protected $fillable=['region_id','rayon_name'];
    public function regions(){
        return $this->belongsTo(Region::class,'region_id');
    }

}
