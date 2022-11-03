<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        'user_id'=>$this->tasks->user_id,
        'title' =>$this->tasks->title,
        'category_name'=>$this->tasks->category_name,
        'subcategory_name'=>$this->tasks->subcategory_name,
        'region'=>$this->tasks->region,
        'address'=>$this->tasks->address,
        'task_description'=>$this->tasks->task_description,
        'task_starttime'=>$this->tasks->task_starttime,
        'task_finishtime'=>$this->tasks->task_finishtime,
        'price_from'=>$this->tasks->task_finishtime,
        'price_to'=>$this->tasks->price_from,
        'task_location'=>$this->tasks->task_location,

      ];

    }
}
