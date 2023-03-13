<?php

namespace App\Http\Controllers;

use App\Models\AnswerAndQuestion;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnswerAndQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_answer_and_question=AnswerAndQuestion::all();
        return view('admin.answer_and_question.index',compact('get_answer_and_question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.answer_and_question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator=Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       $question_answer= AnswerAndQuestion::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);

       if($request->has('img_path')){

            $path = FileUploadService::upload($request->img_path,'admin/answerandquestion/'. $question_answer->id);
            $question_answer->update(['img_path'=>$path]);
        }
       return redirect()->back()->with('message','добавлено');
    }

    public function getanswerandquestion(){
        $get_answer_and_question=AnswerAndQuestion::all();
        return response()->json(['message'=>$get_answer_and_question]);
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
        $edit_question=AnswerAndQuestion::where('id',$id)->first();

        return view('admin.answer_and_question.edit',compact('edit_question'));
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
        // dd($request->all());
        $get_anwer=AnswerAndQuestion::find($id);
        if($request->has('question')){
            $get_anwer->answer_and_question=$request->question;
            $get_anwer->save();
        }
        if($request->has('img_path')){

            $path = FileUploadService::upload($request->img_path,'admin/answerandquestion/'. $id);
            $get_anwer->update(['img_path'=>$path]);
        }
        $edit_question=AnswerAndQuestion::where('id',$id)->first();

        return view('admin.answer_and_question.edit',compact('edit_question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFile($id){
        $get_file=AnswerAndQuestion::where('id',$id)->update([
            'img_path'=>null,
        ]);

        return response()->json(['message'=>'deleted']);
    }
    public function delete($id)
    {
        $question=AnswerAndQuestion::where('id',$id)->delete();
        if($question){
            return response()->json(['message'=>'deleted']);
        }
    }
}
