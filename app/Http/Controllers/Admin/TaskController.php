<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FullTaskDescriptionForAdminResource;
use App\Models\Category;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $inputsearch;
    public function index(Request $request)
    {


        $category = Category::all();

        $query=Task::latest();
        if(!empty($request->searchtask_name)){
            $this->inputsearch=$request->searchtask_name;
            $query->where('title','like', '%'.$request->input('searchtask_name') .'%');
            $query->orWhere('id','like', '%'.$request->input('searchtask_name') .'%');
            $query->orWhereIn('user_id', User::where(function( $inner_query ){
                                             $inner_query->where('name', 'like', '%' . $this->inputsearch . '%')
                                                       ->orWhere('last_name', 'like', '%' . $this->inputsearch . '%');
                                     })->pluck('id'));

         }
        if($request->has('category_name')){
            $query->where('category_name','like', '%'.$request->input('category_name') .'%');

        }
        if($request->has('date_from') && !empty($request->input('date_from'))){
            $query->where('task_starttime','>=', $request->input('date_from'));

        }
        if($request->has('date_to') && !empty($request->input('date_to'))){
            $query->where('task_finishtime','<=', $request->input('date_to'));

        }
        if(!empty($request->input('task_status'))){
            $query->where('status', $request->input('task_status'));

        }


        $task=$query->paginate(2)->withQueryString();

        return view('admin.all_task',compact('task','category'))->with('session_categoryName',$request->input('category_name'));
    }
    // public function index(Request $request)
    // {
    //     $category = Category::all();
    //     // $task = Task::orderBy('id','desc')->paginate(10);
    //     $task = $this->filter(null, null, null, null, null)->paginate(10);
    //     return view('admin.all_task',compact('task','category'));
    // }

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
        $task = $task->orderBy('id','desc');

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
