<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ChatResourse extends JsonResource
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

                "task_id" => $this->task_id,
                  "tasks" => $this->tasks,
                "user_id" => $this->user_id,
              "user_name" => $this->users->name,
            "user_avatar" => $this->users->img_path,
    "executor_profile_id" => $this->executor_profile_id,
          "executor_name" => $this->executor_profiles->users->name,
"executor_profile_avatar" => $this->executor_profiles->users->img_path,

            ];
    }
}
