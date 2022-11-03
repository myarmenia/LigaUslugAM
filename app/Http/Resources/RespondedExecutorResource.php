<?php

namespace App\Http\Resources;

use App\Models\ExecutorProfile;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Models\User;

class RespondedExecutorResource extends JsonResource
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
        //call clickontask table, from it get executor name  and so on
        return [
                          'id' => $this->id,
                     'user_id' => $this->user_id,
                       'title' => $this->title,
               'category_name' => $this->category_name,
            'subcategory_name' => $this->subcategory_name,
                      'region' => $this->region,
                     'address' => $this->address,
            'task_description' => $this->task_description,
              'task_starttime' => $this->task_starttime,
             'task_finishtime' => $this->task_finishtime,
                  'price_from' => $this->price_from,
                    'price_to' => $this->price_to,
               'task_location' => $this->task_location,
                       'views' => $this->views,
         'executor_profile_id' => $this->executor_profile_id,
                     'status'  => $this->status,
                  'created_at' => $this->created_at,
                  'updated_at' => $this->updated_at,
               'click_on_tasks' => ClickOnTaskResource::collection($this->click_on_tasks),

        ];
    }
}

