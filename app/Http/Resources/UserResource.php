<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $task=$this->whenLoaded('tasks');
        return [
                    'id'=> $this->id,
         'category_name'=> $this->category_name,
      'subcategory_name'=> $this->subcategory_name,
                'region'=> $this->region,
               'address'=> $this->address,
      'task_description'=> $this->task_description,
        'task_starttime'=> $this->task_starttime,
       'task_finishtime'=> $this->task_finishtime,
          'task_reiting'=>$this->reitings,
    'executor_profile_id'=> $this->executor_profile_id,
      'executor_material_price'=>$this->executor_material_price,
        'executor_work_price'=>$this->executor_work_price,
        'executor_total_price'=>$this->executor_total_price,
        // 'executor_profile_id'=> new TaskResource($this->executor_profiles),
        'executor_profile'=> $this->executor_profiles,
        'problem_messages'=> $this->problem_messages,
        'executor_profile_user_avatar'=> $this->executor_profiles->users->img_path,
        ];

    }
}
