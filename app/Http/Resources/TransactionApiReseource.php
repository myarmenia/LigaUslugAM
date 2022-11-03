<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TransactionApi;

class TransactionApiReseource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
                 "id" => $this->id,
            "user_id" => $this->user_id,
            "balance" => $this->balance,
        "transaction" => TransactionApi::where(['executor_profile_id'=>$this->id,'status'=>'CONFIRMED'])->orderBy('id','desc')->get()
        ];
    }
}
