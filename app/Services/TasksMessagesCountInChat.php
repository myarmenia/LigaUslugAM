<?php
namespace  App\Services;

use App\Http\Controllers\api\v1\BaseController;
use App\Models\Chat;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TasksMessagesCountInChat extends BaseController{
    public static $executor_variable;
    public static function index($user_id)
    {
        $task = Task::pluck('id');

        $executor_profile_id = ExecutorProfile::where('user_id',$user_id)->first();

        if($executor_profile_id){
            self::$executor_variable = $executor_profile_id->id;
        }

        $employer_executor_chat = Chat::whereIn('task_id',$task)
                                        ->where(function($q) {
                                            $q->where('user_id',Auth::id())
                                                ->orWhere("executor_profile_id", self::$executor_variable);
                                        });

        $employer_executor_chat = $employer_executor_chat->distinct()->get(['task_id','chatroom_name','user_id','executor_profile_id']);

        $unread_chat_count=0;
        foreach($employer_executor_chat as $item){

            $one_task=self::taskchatcount($item->task_id,$user_id);
            $unread_chat_count+=$one_task;
        }
        $success=$unread_chat_count;
        // return response()->json(['unread_chat_count'=>$unread_chat_count]);
        return $success;

    }
    public function taskchatcount($task_id,$user_id){

        $executor=ExecutorProfile::where('user_id',$user_id)->first();
        $task = Task::where('id',$task_id)->first();
        if($user_id == $task->user_id){
            $chat=Chat::where([
                ['task_id','=',$task_id],
                ['executor_message','!=',null],
                ['employer_read_at','=',null]
                ])->get();

                return count($chat);
        }
        if($user_id==$executor->user_id){
            $chat=Chat::where([
                ['task_id','=',$task_id],
                ['employer_message','!=',null],

                ['executor_read_at','=',null]
                ])->get();

                return count($chat);
        }

    }




}
