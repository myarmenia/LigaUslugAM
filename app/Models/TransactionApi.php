<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TransactionApi extends Model
{
    use HasFactory;

    protected $fillable=[
        'executor_profile_id',
        'transaction_name',
        'transaction_description',
        'account',
        'status',
        'paymentId'
    ];
    public function executor_profiles(){
        return $this->belongsTo(ExecutorProfile::class,'executor_profile_id');
    }
}
