<?php

namespace App\Http\Controllers\api\v1;

use App\Events\ExecutorSectionTaskCountEvent;
use App\Events\SectionTaskCountEvent;
use App\Http\Controllers\Controller;
use App\Services\ExecutorTaskCountService;
use App\Services\TaskCountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskSectionCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {

        $get_employer_task_section_count=TaskCountService::get($type,Auth::id());

        return response()->json($get_employer_task_section_count);

    }
    public function executor($type){

       $user_id = Auth::id();

        $get_executor_tasks_section_count=ExecutorTaskCountService::get($type,$user_id);

        return response()->json($get_executor_tasks_section_count);

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
