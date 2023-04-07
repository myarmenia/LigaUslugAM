<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalUnreadChatCount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $executor_variable;
    public function index()
    {
        $task = Task::pluck('id');

        $executor_profile_id = ExecutorProfile::where('user_id',Auth::id())->first();

        if($executor_profile_id){
            $this->executor_variable = $executor_profile_id->id;
        }

        $employer_executor_chat = Chat::whereIn('task_id',$task)
                                        ->where(function($q) {
                                            $q->where('user_id',Auth::id())
                                                ->orWhere("executor_profile_id", $this->executor_variable);
                                        });

        $employer_executor_chat = $employer_executor_chat->distinct()->get(['task_id','chatroom_name','user_id','executor_profile_id']);
        $k=0;
        foreach($employer_executor_chat as $item){

            $aa=$this->taskchatcount($item->task_id);
            $k+=$aa;
        }
        dd($k);

    }
    public function taskchatcount($task_id){
        // dd($task_id);
        $executor=ExecutorProfile::where('user_id',Auth::id())->first();
        $task = Task::where('id',$task_id)->first();
        if(Auth::id() == $task->user_id){
            $chat=Chat::where([
                ['task_id','=',$task_id],
                ['executor_message','!=',null],
                ['employer_read_at','=',null]
                ])->get();

                return count($chat);
        }
        if(Auth::id()==$executor->user_id){
            $chat=Chat::where([
                ['task_id','=',$task_id],
                ['employer_message','!=',null],

                ['executor_read_at','=',null]
                ])->get();

                return count($chat);
        }

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
