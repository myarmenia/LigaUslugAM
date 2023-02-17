<?php

namespace App\Http\Controllers\api\v1;

use App\Events\SectionTaskCountEvent;
use App\Http\Controllers\Controller;
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

        $user_id = Auth::user()->id;
        $notappliedtaskservice = TaskCountService::notappliedtask($user_id);
        $respondedtaskService = TaskCountService::respondedExecutor($user_id);
        $inprocesstaskservice = TaskCountService::inProcessTask($user_id);
        $completedtaskservice = TaskCountService::completedTasks($user_id);
        $specialtaskcountservice = TaskCountService::specialTaskcount($type,$user_id);
        $arr=[
            'user_id' => $user_id,
            'notappliedtask' => $notappliedtaskservice,
            'respondedtask' => $respondedtaskService,
            'inprocesstask' => $inprocesstaskservice,
            'specialtask'=> $specialtaskcountservice
        ];
        // dd(json_encode($arr));

        event(new SectionTaskCountEvent($user_id,$arr));

        // return response()->json($arr);
        // dd($specialTaskcount);
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
