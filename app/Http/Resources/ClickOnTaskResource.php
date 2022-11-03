<?php

namespace App\Http\Resources;

use App\Models\ClickOnTask;
use Illuminate\Http\Resources\Json\JsonResource;

class ClickOnTaskResource extends JsonResource
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
        return[

                                 "id" => $this->id,
                            "task_id" => $this->task_id,
                "executor_profile_id" => $this->executor_profile_id,
                "executor_profile_name"=>$this->executor_profiles->users->name,
                "executor_profile_avatar"=>$this->executor_profiles->users->img_path,
                 "service_price_from" => $this->service_price_from,
                   "service_price_to" => $this->service_price_to,
                               "cost" => $this->cost,
                     "startdate_from" => $this->startdate_from,
                      "start_date_to" => $this->start_date_to,
                  "offer_to_employer" => $this->offer_to_employer,
                             "status" => $this->status,
    "employer_offer_to_executor_task_meeting_date" => $this->employer_offer_to_executor_task_meeting_date,
    "employer_offer_to_executor_task_meeting_time" => $this->employer_offer_to_executor_task_meeting_time,
            "employer_watched_click" => $this->employer_watched_click,
                         "created_at" => $this->created_at,
                         "updated_at" => $this->updated_at

        ];
    }

}

