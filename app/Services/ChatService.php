<?php
namespace  App\Services;

use App\Http\Resources\ChatResourse;
use App\Http\Resources\OpposideSideChatsResource;
use App\Models\Chat;
use App\Models\Executor;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use stdClass;

class ChatService {
    public static $executor_variable;
    public static  function index(){

        $task = Task::pluck('id');

        $executor_profile_id = ExecutorProfile::where('user_id',Auth::id())->first();
        self::$executor_variable=$executor_profile_id ->id;


        $employer_chat = Chat::whereIn('task_id',$task)
                                        ->where(function($q) {
                                            $q->where('user_id',Auth::id())
                                                ->orWhere("executor_profile_id", self::$executor_variable);
                                        });

        $employer_chat = $employer_chat->distinct()->get(['task_id','chatroom_name','user_id','executor_profile_id']);

        $tasks_for_chatting = ChatResourse::collection($employer_chat);

        return $tasks_for_chatting;
    }
    public static function employer_executor($user_id){

            $executor_profile=ExecutorProfile::where('user_id',$user_id)->first();

            $chat = Chat::where('user_id',$user_id)->orWhere('executor_profile_id',$executor_profile->id)->distinct()->get(['task_id','chatroom_name','user_id','executor_profile_id']);


            $tasks_for_chatting = self::tasks_chat(['chat'=>$chat,'id'=>$user_id]);
            return $tasks_for_chatting;
    }
    public static function tasks_chat($request){

        $message=[];
        $user=User::where('id',$request['id'])->first();
        foreach($request['chat'] as $item){

            $find_chat=Chat::where('chatroom_name',$item->chatroom_name)->first();

            $obj=new stdClass();
            $obj->chatroom_name = $item->chatroom_name;
            $obj->task_id = $item->task_id;
            $obj->tasks = $find_chat->tasks;
            $obj->user_id = $item->user_id;
            $obj->user_name = $find_chat->users->name;
            $obj->user_avatar = $find_chat->users->img_path;
            $obj->executor_profile_id = $item->executor_profile_id;
            $obj->executor_name = $item->executor_profiles->users->name;
            $obj->executor_profile_avatar = $item->executor_profiles->users->img_path;
            $obj->executor_profile_id=$item->executor_profile_id;


            $executor=ExecutorProfile::where('user_id',$request['id'])->first();

            if($item->user_id === $request['id']){

                $chat = Chat::where([
                    ['task_id','=',$item->task_id],
                    ['executor_message','!=',null],
                    ['employer_read_at','=',null]
                    ])->get();

                $obj->unread_chat_count=count($chat);
            }
            if($item->executor_profile_id == $executor->id){

                $chat = Chat::where([
                    ['task_id','=',$item->task_id],
                    ['employer_message','!=',null],
                    ['executor_read_at','=',null]
                ])->get();

                $obj->unread_chat_count=count($chat);
            }
            array_push($message,$obj);

        }
        // dd($message);
        return $message;
    }
}
