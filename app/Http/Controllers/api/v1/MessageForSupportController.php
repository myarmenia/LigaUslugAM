<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProblemMessageRequest;
use App\Models\ProblemMessage;
use App\Models\Support;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageForSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->has('email') && $request->has('text')){

                $insert_message=Support::create([
                        "user_id" => $user_id,
                          "email" => $request->email,
                           "text" => $request->text,
                ]);
                if($insert_message){

                    return response()->json(["message"=>"Спасибо за доверие, мы свяжемся с вами в течение 1 недели"]);
                }


        }else{
            return response()->json(["message"=>"Заполните все поля"]);
        }
    }
    public function problemMssage(Request $request){
        $validator = Validator::make($request->all(), [
            'problem_description' => 'required|min:10',
        ]);
        if ($validator->fails())
        {

            return response(['errors'=>$validator->errors()->all()], 422);
        }

            $request['user_id']=$request->user_id;
            $request['executor_profile_id']=$request->executor_profile_id;
            $request['task_id']=$request->task_id;
        $problem_message = ProblemMessage::create($request->all());
        $user = Auth::user()->id;
        $inprocess = Task::with('problem_messages')->with('executor_profiles.users')->with('image_tasks')->where(['user_id'=>$user,'status'=>'completed'])->get();
        return response()->json(['tasks'=>$inprocess]);

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
