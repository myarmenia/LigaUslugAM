<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InProcessResource extends JsonResource
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
            'id'=>$this->id,
            'task_id'=>$this->tasks,
            
            "executor_profile_id"=>New ExecutorProfileInProcessResource($this->executor_profiles),
            "service_price_from"=>$this->service_price_from,
            'service_price_to'=>$this->service_price_to,
            'cost'=>$this->cost,
            'startdate_from'=>$this->startdate_from,
            'start_date_to' =>$this->start_date_to,
            'offer_to_employer'=>$this->offer_to_employer,
        ];
    }
}
