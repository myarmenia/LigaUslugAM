<?php

namespace App\Http\Resources;

use App\Models\Chat;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $executor=ExecutorProfile::where('user_id',Auth::id())->first();
        $task = Task::where('id',$this->task_id)->first();
        if(Auth::id() == $task->user_id){
            $chat=Chat::where([
                ['task_id','=',$this->task_id],
                ['executor_message','!=',null],
                ['employer_read_at','=',null]
                ])->get();
                return count($chat);
        }
        if(Auth::id()==$executor->user_id){
            $chat=Chat::where([
                ['task_id','=',$this->task_id],
                ['employer_message','!=',null],
              
                ['executor_read_at','=',null]
                ])->get();
                return count($chat);
        }



    }
}
