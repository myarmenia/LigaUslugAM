<?php
namespace  App\Services;

use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use App\Models\Task;

class AllTasksService {

    public static function alltaskswithoutowntask(){

        $query=Task::with('users','image_tasks')->where('status','false')->latest();


        if(Auth('api')->user()){

            $executor = ExecutorProfile::where('user_id', Auth('api')->user())->first();
            $special_task_executor_table = specialTaskExecutor::where('executor_id',$executor->id)->pluck('task_id')->toArray();
            $query=$query->whereNotIn('id',$special_task_executor_table)
                         ->where([
                            ['user_id','!=', $executor->id],
                         ]);


        }




        $task = Task::whereNotIn('id',$special_task_executor_table)
                    ->where([
                            ['status','=','false'],
                            ['executor_profile_id','=',Null],
                            ['user_id','!=', $user_id]
                            ])
                    ->with('users')
                    ->with('image_tasks')->orderBy('id','desc')->pluck('id');

                return $task;

    }

}
