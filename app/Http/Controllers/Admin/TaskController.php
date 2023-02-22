<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FullTaskDescriptionForAdminResource;
use App\Models\Category;
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
        $category = Category::all();
        // $task = Task::orderBy('id','desc')->paginate(10);
        $task = $this->filter(null, null, null, null, null);
        return view('admin.all_task',compact('task','category'));
    }
    public function filter($searchtask_name=null, $category_name=null, $task_status=null, $date_from=null, $date_to=null){

        $task = Task::where('id','>',0);

        if($searchtask_name!=null){

        }
        if($category_name!=null){

        }
        if($task_status!=null){

        }
        if($date_from!=null){

        }
        if($date_to!=null){

        }
        $task = $task->orderBy('id','desc')->paginate(10);

        return $task;


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
