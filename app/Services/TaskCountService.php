<?php
namespace  App\Services;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskCountService {
    public static function notappliedtask(string $user_id){


        $finished_task = Task::where(['user_id'=>$user_id,'status'=>'false'])->orderBy('id','desc')->get();
        $array=[];
        foreach($finished_task as $items){

            $clickontask=ClickOnTask::where('task_id',$items->id)->first();
            if(!$clickontask){
                array_push($array,$items->id);
            }
        }

        $task=Task::whereIn('id',$array)->orderBy('id','desc')->with('image_tasks')->get();

        // event(new EmployerNotAppliedTaskCountEvent( Auth::user()->id, count($task)));
        // event(new SectionTaskCountEvent( Auth::user()->id, count($task)));

        return count($task);

    }
    public static function respondedExecutor(string $user_id){

        // $user_id = Auth::user()->id;
        $task = Task::with(['click_on_tasks'=>function($q){
                $q->where('status','false');
           }])->where(['user_id'=>$user_id,'executor_profile_id'=>null])->get();
       $arr=[];
       foreach($task as $items){

           if($items->click_on_tasks->isNotEmpty() == true){
               array_push($arr,$items->id);
           };
       }

       if(count($arr)>0){
           $showrespondedtask =Task::with(['click_on_tasks'=>function($q){
                       $q->where('status','false');
                       }])->whereIn('id',$arr)->orderBy('id','desc')->get();
        //    $responded_executor = RespondedExecutorResource::collection($showrespondedtask);

        //     event(new RespondedExecutorEvent(Auth::user()->id,count($showrespondedtask)));
        //     event(new SectionTaskCountEvent( Auth::user()->id, count($showrespondedtask)));

            return count($showrespondedtask);

       }else{
            return 0;
       }



   }
    public static function inProcessTask(string $user_id){
        $inprocess = Task::with('problem_messages')->with('executor_profiles.users')->with('image_tasks')->where(['user_id'=>$user_id,'status'=>'inprocess'])->orderBy('id','desc')->get();
        if($inprocess->isNotEmpty()){

            return count($inprocess);

        }else{
            return count($inprocess);
        };
    }
    public static function completedTasks(string $user_id){

        $finished_task=Task::with('reitings')->with('executor_profiles','executor_profiles.users','problem_messages')->where(['user_id'=>$user_id,'status'=>'completed'])->orderBy('id','desc')->get();
        return count($finished_task);

    }
    public static function specialTaskcount(string $type, string $user_id)

    {
        $executor=ExecutorProfile::where('user_id',$user_id)->first();
        $special_task='';
         if($type == 'employer'){
            $task=Task::where('user_id',Auth::id())->with('special_task_executors')->pluck('id')->toArray();

            $special_task=specialTaskExecutor::whereIn('task_id',$task)->with('tasks','executor_profiles.users')->orderBy('id','DESC')->get();

            return count($special_task);
        }else if($type == 'executor'){

            $special_task=specialTaskExecutor::where('executor_id',$executor->id)->with('tasks','tasks.users')->orderBy('id','DESC')->get();
            return count($special_task);
        }



        return response()->json(['special_task'=>$special_task]);
    }







}
