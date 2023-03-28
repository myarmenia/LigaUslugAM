<?php
namespace  App\Services;

use App\Http\Resources\ChatResourse;
use App\Models\Chat;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}
