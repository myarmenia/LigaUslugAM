<?php

namespace App\Http\Controllers\api\v1;

use App\Events\NotificationEvent;
use App\Events\SectionTaskCountEvent;
use App\Events\SpecialTaskCountEvent;
use App\Events\UnreadNotificationCountEvent;
use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use App\Models\Task;
use App\Notifications\NotifyEmployerExecutorRejectedSpecialTask;
use App\Services\ExecutorTaskCountService;
use App\Services\TaskCountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($type)

    {
        $special_task='';

        if($type == 'employer'){

            $special_task = TaskCountService::employerspecialTask(Auth::id());

        }else if($type =='executor'){

            $special_task = ExecutorTaskCountService::executor_special_task(Auth::id());
        }

        return response()->json(['special_task'=>$special_task]);
    }
    public function rejectEmployerForSpecialTask(Request $request){

        $task = Task::where('id',$request->task_id)->with('users')->first();

        // if($delete_task){
            $special_task = specialTaskExecutor::where('task_id',$request->task_id)->with('tasks.users')->first();


            $task->users->notify(new NotifyEmployerExecutorRejectedSpecialTask($special_task));
               // =======creating socket for event ==================
               $employer_notification = DB::table('notifications')->where('notifiable_id', $task->user_id)->orderBy('created_at','desc')->get();

               $database = json_decode($employer_notification);
               event(new NotificationEvent($task->user_id, $database));
               $unread_notification_count = Auth::user()->unreadNotifications()->count();
               event(new UnreadNotificationCountEvent( $task->user_id, $unread_notification_count));


            $special_task->delete();
            $delete_task = Task::where('id',$request->task_id)->delete();
        // }
        return response()->json(['message'=>'Персональный заказ отклонён']);

    }


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
