<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppliedWorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
                     'task_id' => $this->task_id,
            'executor_user_id' => $this->executor_user_id,
               'category_name' => $this->category_name,
            'subcategory_name' => $this->subcategory_name,
          'service_price_from' => $this->service_price_from,
            'service_price_to' => $this->service_price_to,
                   'date_from' => $this->date_from,
                     'date_to' => $this->date_to,
                     'message' => $this->message,

        ];
    }
}
