<?php

namespace App\Http\Controllers\Pages;

use App\Events\CallBackToAdmin;
use App\Events\RequestCallBack;
use App\Http\Controllers\Controller;
use App\Models\Callback;
use App\Models\User;
use App\Notifications\CallBackNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CallbackController extends Controller
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
        $validate = $request->validate([
                     'name' => 'required',
             'phone_number' => 'required',
            // 'selected_date' => 'required',
            // 'selected_time' => 'required',
        ]);

        if($validate){

            $insert=Callback::create([
                        'name' => $request->name,
                'phone_number' => $request->phone_number,
             //  'selected_date' => $request->selected_date,
             //  'selected_time' => $request->selected_time,

           ]);
           if($insert){

            //    eventy grancas e EventServiceProvider-um
           $a=event(new RequestCallBack($insert));
            if($a){
                event(new CallBackToAdmin($insert));
                return response()->json(['message'=>'Спасибо за оставленный звонок, наши сотрудники свяжутся с вами']);
            }


           }else{
               return response()->json(['message'=>'Данные не введены']);
           }

        }



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
