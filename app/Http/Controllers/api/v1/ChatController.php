<?php

namespace App\Http\Controllers\api\v1;

use App\Events\ChatReadedEvent;
use App\Events\NewTaskChatEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResourse;
use App\Models\Chat;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Carbon\Carbon;
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
        $generate_chat_id=0;
        if($clickontask){
            $room='';
            if($request->has('chatroom_name')){
                $room=$request->chatroom_name;
            }
            else{
                $room="room_".$request->task_id."_".$request->user_id."_".$request->executor_profile_id;
            }

                    $creat_chat = Chat::create([
                  "chatroom_name" => $room,
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
                $executor = ExecutorProfile::where('id',$request->executor_profile_id)->first();
                $task=Task::where('id',$request->task_id)->first();


                // if($request->employer_message!=null){

                //     event(new NewTaskChatEvent($executor->users->id, ['task_id'=>$request->task_id,'text'=>$request->employer_message,'chat'=>$chat]));
                // }
                // if($request->executor_message!=null){

                //     event(new NewTaskChatEvent($task->users->id, ['task_id'=>$request->task_id,'text'=>$request->employer_message,'chat'=>$chat]));
                // }
                event(new NewTaskChatEvent($room, ['chat'=>$chat]));
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

    public function readChatIds(Request $request){

        $current = Carbon::now();


        foreach($request->ids as $item){
            $chat = Chat::where('id',$item)->first();
            $chat->read_at=$current;
            $chat->save();

            $executor_profile = ExecutorProfile::where('id',$chat->executor_profile_id)->first();
            $this->executor_variable = $executor_profile->id;
            if(Auth::id() == $chat->user_id){
                event(new ChatReadedEvent($executor_profile->users->id, ['task_id'=>$chat->task_id,'read_at'=>$current,'chat'=>$chat]));
            }

            // $user_executor_chat = Chat::where('id',$item)
            // ->where(function($q) {
            //     $q->where('user_id',Auth::id())
            //         ->orWhere("executor_profile_id", $this->executor_variable);
            // });
        }

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
