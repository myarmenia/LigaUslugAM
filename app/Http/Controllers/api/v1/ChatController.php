<?php

namespace App\Http\Controllers\api\v1;


use App\Events\NewTaskChatEvent;
use App\Events\ReadedMessageEvent;
use App\Events\TotalunreadChatCount;
use App\Events\UpdateUnreadChatsCountEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResourse;
use App\Models\Chat;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Services\ChatService;
use App\Services\TasksMessagesCountInChat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $tasks_for_chatting = ChatService::index();

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


                $opposide_side='';
                if($request->employer_message != null){

                    $opposide_side = $executor->users->id;

                    $tasks_for_chatting = ChatService::employer_executor($opposide_side);
                        // showing in navbar
                        // $chat_message_count = TasksMessagesCountInChat::index($opposide_side);
                        // event(new TotalunreadChatCount( $opposide_side, $chat_message_count));

                    event(new UpdateUnreadChatsCountEvent($executor->users->id,$tasks_for_chatting));
                }

                if($request->executor_message != null){

                    $opposide_side = $task->users->id;

                    $tasks_for_chatting = ChatService::employer_executor($opposide_side);
                        // $chat_message_count = TasksMessagesCountInChat::index($opposide_side);
                        // event(new TotalunreadChatCount($executor->users->id,$chat_message_count));

                    event(new UpdateUnreadChatsCountEvent( $opposide_side, $tasks_for_chatting));
                }

                event(new NewTaskChatEvent($room, ['chat'=>$chat]));
                return response()->json(["message"=>$chat]);
            }
        }
    }



    public function chatFileUpload(Request $request){




            $validate = [
                'chatroom_name'=>'required',
                'task_id'=>'required',
                'user_id'=>'required',
                "executor_profile_id"=>'required',
                'message_file'=>'file|mimes:jpeg,jpg,png,gif,csv,txt,pdf,docx,DOCX,JPEG,JPG,PNG,GIF,CSV,TXT,PDF|max:2048'
            ];

            $validator = Validator::make($request->all(), $validate);

            if($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()], 404);

            }

                $creat_chat_file=Chat::where([
                    ["chatroom_name",'=',$request->chatroom_name],
                    ["task_id",'=', $request->task_id],
                    ["user_id","=", $request->user_id],
                    ["executor_profile_id","=", $request->executor_profile_id],
                ])->create([
                    "task_id" => $request->task_id,
                    "user_id" => $request->user_id,
                    "executor_profile_id" => $request->executor_profile_id,
                    "chatroom_name"=> $request->chatroom_name

                ]);
                // ======
                    $executor = ExecutorProfile::where('id',$request->executor_profile_id)->first();
                    $task=Task::where('id',$request->task_id)->first();

                    // $tasks_for_chatting=ChatService::index();
                    $opposide_side='';
                // ========
                if(Auth::id()==$creat_chat_file->user_id)
                {
                        if( $creat_chat_file){
                            $file=$request->file('message_file');
                            $filename=$file->getClientOriginalName();
                            $file->move(public_path('admin/img/chatfiles'),$filename);

                            $creat_chat_file_update=$creat_chat_file->update([
                                "employer_message_file" => $filename,
                            ]);

                            if($creat_chat_file_update){
                                // ======
                                    $opposide_side = $executor->users->id;
                                    $tasks_for_chatting = ChatService::employer_executor($opposide_side);
                                    // show opposite side task chats
                                    event(new UpdateUnreadChatsCountEvent($executor->users->id,$tasks_for_chatting));

                                    $room = $request->chatroom_name;
                                    $chat =Chat::where('chatroom_name',$request->chatroom_name)->get();
                                    event(new NewTaskChatEvent($room, ['chat'=>$chat]));

                                // =====
                                return response()->json(["message"=>"Employer inserted file"]);
                            }else{
                                return response()->json(["message"=>"failed"]);
                            }
                        }
                }else{
                    if($creat_chat_file){
                        $file=$request->file('message_file');
                        $filename=$file->getClientOriginalName();
                        $file->move(public_path('admin/img/chatfiles'),$filename);

                        $creat_chat_file_update=$creat_chat_file->update([
                            "executor_message_file" => $filename,
                        ]);
                        if($creat_chat_file_update){
                            // =====
                                $opposide_side = $task->users->id;
                                $tasks_for_chatting = ChatService::employer_executor($opposide_side);

                                event(new UpdateUnreadChatsCountEvent($task->users->id,$tasks_for_chatting));
                                // =====
                                $room = $request->chatroom_name;
                                $chat =Chat::where('chatroom_name',$request->chatroom_name)->get();
                                event(new NewTaskChatEvent($room, ['chat'=>$chat]));
                            //====
                            return response()->json(["message"=>"Executor inserted file"]);
                        }else{
                            return response()->json(["message"=>"failed"]);
                        }
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

        // $chat = Chat::where('chatroom_name',$request->chatroom_name)->first();

        foreach($request->ids as $item){
            $chat = Chat::where(['chatroom_name'=>$request->chatroom_name,'id'=>$item])->first();


            if($request->type=="employer"){
                $chat->employer_read_at=$current;
                $chat->save();

            }else{
                $chat->executor_read_at=$current;
                $chat->save();

            }
        }
        return response()->json(['message'=>"success"]);

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
