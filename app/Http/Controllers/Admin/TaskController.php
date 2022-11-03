<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FullTaskDescriptionForAdminResource;
use App\Models\ExecutorProfile;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task=Task::orderBy('id','desc')->paginate(10);
        return view('admin.all_task',compact('task'));
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


        $show_task = Task::where('id',$id)->first();
        $executor=ExecutorProfile::where('id',$show_task->executor_profile_id)->first();
    //   if(empty($show_task->executor_profile_id)){
    //       dd("yes");
    //   }else{
    //       dd("no");
    //   }
        // $show_task_for_admin = new  FullTaskDescriptionForAdminResource($show_task);
        // dd($show_task ->users->name);
        // foreach($show_task_for_admin as $key=> $items){
        //     dd($items->title);
        // }
        return view('admin.show_task',compact('show_task','executor'));
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
