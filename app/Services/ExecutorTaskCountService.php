<?php
namespace  App\Services;

use App\Events\ExecutorSectionTaskCountEvent;
use App\Models\ClickOnTask;
use App\Models\ExecutorCategory;
use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ExecutorTaskCountService{



    public  static function showalltasktoexecutor($user_id){

        $executor=ExecutorProfile::where('user_id', $user_id)->first();
        $executor_category=ExecutorCategory::where('executor_profile_id',$executor->id)->pluck('category_name');
        // dd($executor_category);
        // -----select task where not in special task executors
        $special_task_executor_table=specialTaskExecutor::where('executor_id',$executor->id)->pluck('task_id');



        $task=Task::whereIn('category_name',$executor_category)
                    ->whereNotIn('id',$special_task_executor_table)
                    ->where([
                            ['executor_profile_id','=',Null],
                            ['user_id','!=', $user_id]
                            ])->with('users')->with('image_tasks')->orderBy('id','desc')->pluck('id');

        $click_on_task=ClickOnTask::whereIn('task_id',$task)->where([[ 'executor_profile_id','=',$executor->id],['status','=',false]])->pluck('task_id');
        $task=Task::whereIn('category_name',$executor_category)
                        ->whereNotIn('id',$special_task_executor_table)
                        ->where([
                                ['executor_profile_id','=',Null],
                                ['user_id','!=', $user_id]
                                ])->with('users')->with('image_tasks')->orderBy('id','desc')->get();
        $notSelectedTaskCountforexecutor=count($task);








            return ['task_length' => $notSelectedTaskCountforexecutor,'Tasks' => $task];


    }
    public static  function respondedtaskforexecutor($user_id)
    {

        $executor=ExecutorProfile::where('user_id',$user_id)->first();
        $responded_task_for_Executor =  ClickOnTask::with('tasks','tasks.users','tasks.image_tasks')->where(['executor_profile_id'=>$executor->id, 'status'=>'false'])->orderBy('id','desc')->get();

        return $responded_task_for_Executor;
    }
    public static function tasksinprogressforexecutor($user_id){

        $executor = ExecutorProfile::where('user_id',$user_id)->first();
        $inprocess = Task::with('users')->with('image_tasks')->where(['executor_profile_id'=>$executor->id,'status'=>'inprocess'])->orderBy('id','desc')->get();

        return $inprocess;
    }
    public static function completedtasksforexecutor($user_id){

      $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
      $executorcompletedtask= Task::with('users')->with('image_tasks','reitings')->where(['executor_profile_id'=>$executor->id,'status'=>'completed'])->get();
        return $executorcompletedtask;
    }
    public static function specialtaskexecutor($type,$user_id){
        $executor=ExecutorProfile::where('user_id',Auth::id())->first();
        $special_task='';
        if($type == 'employer'){
            $task=Task::where('user_id',Auth::id())->with('special_task_executors')->pluck('id')->toArray();

            $special_task=specialTaskExecutor::whereIn('task_id',$task)->with('tasks','executor_profiles.users')->orderBy('id','DESC')->get();

        }else if($type == 'executor'){
            $special_task=specialTaskExecutor::where('executor_id',$executor->id)->with('tasks','tasks.users')->orderBy('id','DESC')->get();

        }
        return $special_task;
    }
    public static function get($type,$user_id){
        $showalltasktoexecutorservice=self::showalltasktoexecutor($user_id);
        $respondedtaskforexecutorservice = self::respondedtaskforexecutor( $user_id );
        $tasksinprogressforexecutorservice = self::tasksinprogressforexecutor( $user_id );
        $completedtaskexecutorservice = self::completedtasksforexecutor( $user_id );
        $specialtaskexecutorservice = self::specialtaskexecutor('executor',$user_id );

            $exec_arr=[
            'user_id' => $user_id,
            'showalltasktoexecutor' => $showalltasktoexecutorservice['task_length'],
            'respondedtaskforexecutor' => count($respondedtaskforexecutorservice),
            'tasksinprogressforexecutor' => count($tasksinprogressforexecutorservice),
            'completedtaskexecutor'  => count($completedtaskexecutorservice),
            'specialtaskexecutor'=> count($specialtaskexecutorservice)
        ];

        event(new ExecutorSectionTaskCountEvent($user_id,$exec_arr));

        return   $exec_arr;

    }

}
