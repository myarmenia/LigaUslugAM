<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use App\Models\Task;
use App\Notifications\NotifyEmployerExecutorRejectedSpecialTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)

    {


        $executor=ExecutorProfile::where('user_id',Auth::id())->first();
        $special_task='';
         if($type == 'employer'){
            $task=Task::where('user_id',Auth::id())->with('special_task_executors')->pluck('id');
            $special_task=specialTaskExecutor::whereIn('task_id',$task)->with('tasks','executor_profiles.users')->orderBy('id','DESC')->get();
        }else if($type == 'executor'){

            $special_task=specialTaskExecutor::where('executor_id',$executor->id)->with('tasks','tasks.users')->orderBy('id','DESC')->get();
        }



        return response()->json(['special_task'=>$special_task]);
    }
    public function rejectEmployerForSpecialTask(Request $request){

        // dd($request->all());
        $task = Task::where('id',$request->task_id)->with('users')->first();


        $delete_task = Task::where('id',$request->task_id)->delete();
        if($delete_task){
            $special_task = specialTaskExecutor::where('task_id',$request->task_id)->with('tasks.users')->first();


            $task->users->notify(new NotifyEmployerExecutorRejectedSpecialTask($special_task));
            $special_task->delete();
        }
        return response()->json(['message'=>'Персональный заказ отклонён']);

    }
    // public function selectSpecialTaskExecutor(Request $request){
    //     $updatetask=Task::where('id',$request->task_id)->update([
    //         'executor_profile_id' => $request->executor_profile_id,
    //                      'status' => "inprocess",
    //     ]);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
