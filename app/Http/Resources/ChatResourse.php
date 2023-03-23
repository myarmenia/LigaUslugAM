<?php

namespace App\Http\Resources;

use App\Models\Chat;
use Illuminate\Http\Resources\Json\JsonResource;


class ChatResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $task_chatcount;
    public function toArray($request)
    {

        return [
                "chatroom_name"=>$this->chatroom_name,
                "task_id" => $this->task_id,
                  "tasks" => $this->tasks,
                "user_id" => $this->user_id,
              "user_name" => $this->users->name,
            "user_avatar" => $this->users->img_path,
    "executor_profile_id" => $this->executor_profile_id,
          "executor_name" => $this->executor_profiles->users->name,
"executor_profile_avatar" => $this->executor_profiles->users->img_path,
             "unread_chat_count" => $this->taskchatcount(),

            ];
    }
    public function taskchatcount(){
        $chat=Chat::where(['task_id'=>$this->task_id,"read_at"=>null])->get();
        return count($chat);
    }
}
