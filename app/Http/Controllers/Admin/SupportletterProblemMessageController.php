<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterFromAdmin;
use App\Models\ProblemMessage;
use App\Models\SupportFeedbackProblemMessage;
use App\Models\User;
use App\Notifications\SupportFeedbackNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportletterProblemMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problem_message = ProblemMessage::with('tasks','tasks.users','tasks.executor_profiles')->where('status','not_answered')->orderBy('id','desc')->paginate(20);

        return view('admin.all_supports_letter_problem_message',compact('problem_message'));
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
 
        $show_special_message=ProblemMessage::find($id);
        return view('admin.show_user_problem_message_letter',compact('show_special_message'));
    }

    public function supportFeedBack(Request $request){

        $request->validate([
            "text" => "required|min:10"
        ]);


        $request['user_id']=$request->user_id;

        $supportFeedbackProblemMessage = SupportFeedbackProblemMessage::create([
            'problem_message_id'=>$request->problem_message_id,
            'text'=>$request->text,
            'user_id'=>$request->user_id,
        ]);


        if($supportFeedbackProblemMessage){

            $find_message=ProblemMessage::where('id',$request->problem_message_id)->update([
                'status'=>'answered'
            ]);
            $supportFeedbackProblem=SupportFeedbackProblemMessage::with('problem_messages','problem_messages.tasks','problem_messages.tasks.users')->where('id',$supportFeedbackProblemMessage->id)->first();
            $user=User::where('id',$request->user_id)->first();
            $user=$user->notify(new SupportFeedbackNotification($supportFeedbackProblem));
            // $user=User::find($request->user_id)->notify(new SupportFeedbackNotification($supportFeedbackProblem));

            return redirect()->back()->with('message','Письмо успешно отправлено!');
        }else{
            return redirect()->back()->with('message_error','Письмо не было отправлено!');
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
