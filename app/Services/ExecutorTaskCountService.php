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

    public static function showalltasktoexecutor($user_id){

        $executor=ExecutorProfile::where('user_id', $user_id)->first();
        $executor_category=ExecutorCategory::where('executor_profile_id',$executor->id)->pluck('category_name')->toArray();
        // dd($executor_category);
        // -----select task where not in special task executors
        $special_task_executor_table=specialTaskExecutor::where('executor_id',$executor->id)->pluck('task_id')->toArray();




        $task=Task::whereIn('category_name',$executor_category)
                    ->whereNotIn('id',$special_task_executor_table)
                    ->where([
                            ['executor_profile_id','=',Null],
                            ['user_id','!=', $user_id]
                            ])->with('users')->with('image_tasks')->orderBy('id','desc')->pluck('id');


        $click_on_task=ClickOnTask::whereIn('task_id',$task)->where([[ 'executor_profile_id','=',$executor->id],['status','=',false]])->pluck('task_id');

        $second_filter_task=Task::whereIn('category_name',$executor_category)
                        ->whereNotIn('id',$special_task_executor_table)
                        ->whereNotIn('id',$click_on_task)
                        ->where([
                                ['executor_profile_id','=',Null],
                                ['user_id','!=', $user_id]
                                ])->with('users')->with('image_tasks')->orderBy('id','desc')->get();
        $notSelectedTaskCountforexecutor=count($second_filter_task);

        return ['task_length' => $notSelectedTaskCountforexecutor,'Tasks' => $second_filter_task];

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

      $executor=ExecutorProfile::where('user_id',$user_id)->first();
      $executorcompletedtask= Task::with('users')->with('image_tasks','reitings')->where(['executor_profile_id'=>$executor->id,'status'=>'completed'])->get();
        return $executorcompletedtask;
    }

    public static function executor_special_task($user_id){

        $executor=ExecutorProfile::where('user_id',$user_id)->first();

        // $special_task=specialTaskExecutor::where('executor_id',$executor->id)->with('tasks','tasks.users')->get();
        $special_task=specialTaskExecutor::where('executor_id',$executor->id)->with(['tasks'=>function($query){
            $query->where('status','not confirmed')->with('users');
        }])->get();
dd($special_task);
        return $special_task;
    }

    public static function get($user_id){

        $showalltasktoexecutorservice=self::showalltasktoexecutor($user_id);
        $respondedtaskforexecutorservice = self::respondedtaskforexecutor( $user_id );
        $tasksinprogressforexecutorservice = self::tasksinprogressforexecutor( $user_id );
        $completedtaskexecutorservice = self::completedtasksforexecutor( $user_id );
        $specialtaskexecutorservice = self::executor_special_task($user_id );

            $exec_arr=[
            'user_id' => $user_id,
            'showalltasktoexecutor' => $showalltasktoexecutorservice['task_length'],
            'respondedtaskforexecutor' => count($respondedtaskforexecutorservice),
            'tasksinprogressforexecutor' => count($tasksinprogressforexecutorservice),
            'completedtaskexecutor'  => count($completedtaskexecutorservice),
            'specialtaskexecutor'=> count($specialtaskexecutorservice)
        ];

// dd($exec_arr);
        event(new ExecutorSectionTaskCountEvent($user_id,$exec_arr));

        return   $exec_arr;

    }

}
