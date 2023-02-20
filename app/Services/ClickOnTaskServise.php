<?php

namespace  App\Services;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;

class ClickOnTaskService{

    // public function index($user_id)
    // {

    //     $executor=ExecutorProfile::where('user_id',$user_id)->first();
    //     $responded_task_for_Executor =  ClickOnTask::with('tasks','tasks.users','tasks.image_tasks')->where(['executor_profile_id'=>$executor->id, 'status'=>'false'])->orderBy('id','desc')->get();



    //       return $responded_task_for_Executor;
    // }

}

