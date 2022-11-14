<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\GiveQuestion;
use App\Models\User;
use App\Notifications\UsersGiveQuestion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

class GiveQuestionController extends Controller
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
        $message = GiveQuestion::create([
            "message" => $request->message,
              "email" => $request->email
        ]);
        if($message){
            $admins = User::whereHas('roles',function($query){
                $query->where('id',1);
            })->get();
            Notification::send($admins,new UsersGiveQuestion($message));


            // event(new GiveQuestion($message));
            return response()->json(['message'=>'Спасибо за сообщение, наши сотрудники свяжутся с вами']);
        }
    }
    public function uploadFileTest(Request $request){
        dd($request->image);
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
