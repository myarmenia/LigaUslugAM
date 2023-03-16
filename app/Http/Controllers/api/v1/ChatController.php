<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResourse;
use App\Models\Chat;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
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
      $this->executor_variable=$executor_profile_id ->id;


     $employer_chat = Chat::whereIn('task_id',$task)
                                       ->where(function($q) {
                                         $q->where('user_id',Auth::id())
                                             ->orWhere("executor_profile_id", $this->executor_variable);
                                       });
     $employer_chat = $employer_chat->distinct()->get(['task_id','user_id','executor_profile_id']);

      $tasks_for_chatting = ChatResourse::collection($employer_chat);
      return response()->json(["data"=>$tasks_for_chatting]);
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
        $user_id = Auth::user()->id;
        $clickontask = ClickOnTask::where('task_id',$request->task_id)->first();
        if($clickontask){
                    $creat_chat=Chat::create([
                        "task_id" => $request->task_id,
                        "user_id" => $request->user_id,
            "executor_profile_id" => $request->executor_profile_id,
            "employer_message" => $request->employer_message,
            "executor_message" => $request->executor_message,
            ]);

            $chat=Chat::where([
                ["task_id",'=', $request->task_id],
                ["user_id","=", $request->user_id],
                ["executor_profile_id","=", $request->executor_profile_id],
            ])->get();
            if($creat_chat){
                     return response()->json(["message"=>$chat]);
            }
        }
    }


    public function chatFileUpload(Request $request){
        if($request->has('message_file')){
            $chatFilevalidate = $request->validate([
                        'message_file'=>'file|mimes:jpeg,jpg,png,gif,csv,txt,pdf,docx,DOCX,JPEG,JPG,PNG,GIF,CSV,TXT,PDF|max:2048'

                    ]);

             if($chatFilevalidate){
                $creat_chat_file=Chat::where([
                    ["task_id",'=', $request->task_id],
                    ["user_id","=", $request->user_id],
                    ["executor_profile_id","=", $request->executor_profile_id],
                ])->create([
                    "task_id" => $request->task_id,
                    "user_id" => $request->user_id,
                    "executor_profile_id" => $request->executor_profile_id,

                ]);

                if(Auth::id()==$creat_chat_file->user_id)
                {

                        if( $creat_chat_file){
                            $file=$request->file('message_file');
                            $filename=time().$file->getClientOriginalName();
                            $file->move(public_path('admin/img/chatfiles'),$filename);

                            $creat_chat_file_update=$creat_chat_file->update([
                                "employer_message_file" => $filename,
                            ]);
                            if($creat_chat_file_update){
                                return response()->json(["message"=>"Employer inserted file"]);
                            }else{
                                return response()->json(["message"=>"failed"]);
                            }
                        }


                }else{
                    if( $creat_chat_file){
                        $file=$request->file('message_file');
                        $filename=time().$file->getClientOriginalName();
                        $file->move(public_path('admin/img/chatfiles'),$filename);

                        $creat_chat_file_update=$creat_chat_file->update([
                            "executor_message_file" => $filename,
                        ]);
                        if($creat_chat_file_update){
                            return response()->json(["message"=>"Executor inserted file"]);
                        }else{
                            return response()->json(["message"=>"failed"]);
                        }
                    }

                }


            }else{
                return response()->json(["message"=>"notvalidate"]);
            }


        }




    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function taskChat(Request $request)
    {
        $task_chat = Chat::where([
            ['task_id','=',$request->task_id],
            ['user_id','=',$request->user_id],
            ['executor_profile_id','=',$request->executor_profile_id]
        ])->get();

        return response()->json(["message"=>$task_chat]);
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
