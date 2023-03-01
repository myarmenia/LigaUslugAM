<?php

namespace App\Http\Controllers;

use App\Models\AnswerAndQuestion;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class AnswerAndQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.answer_and_question.index');
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
        // dd($request->question);
       $answer= AnswerAndQuestion::create([
            'answer_and_question'=>$request->question,
        ]);

       if($request->has('img_path')){

            $path = FileUploadService::upload($request->img_path,'admin/answerandquestion/'. $answer->id);
            $answer->update(['img_path'=>$path]);
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
