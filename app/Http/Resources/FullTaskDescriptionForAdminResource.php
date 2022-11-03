<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FullTaskDescriptionForAdminResource extends JsonResource
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
            'user_id'=>UserForAdminResource::collection($this->users),
            // "simon"=>"Simon",
            'title'=>"kkkkk",
            'image_tasks'=>$this->image_tasks,
            'category_name'=>$this->category_name,
            'subcategory_name'=>$this->subcategory_name,
            'region'=>$this->region,
            'address'=>$this->address,
            'task_description'=>$this->task_description,
            'task_starttime'=>$this->task_starttime,
            'task_finishtime'=>$this->task_finishtime,
            'price_from'=>$this->price_from,
            'price_to'=>$this->price_to,
            'task_location'=>$this->task_location,
            'views'=>$this->views,
        ];
    }
}
