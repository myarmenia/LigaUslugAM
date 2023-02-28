<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $paginate = 10;
            $i=$request['page'] ? ($request['page']-1)*$paginate : 0;
           $query=User::wherehas('tasks')->latest();
           if($request->filter_category!=null && $request->input_filter!=null){
                if($request->filter_category=='employer_name_last_name'){
                    $query->where('name','like', '%'.$request->input_filter .'%');
                    $query->orWhere('last_name','like', '%'.$request->input_filter .'%');

                }
                if($request->filter_category=='employer_review_count'){
                    $query->where('employer_review_count','like', '%'.$request->input_filter .'%');

                }
                if($request->filter_category=='phone_number'){
                    $query->where('phonenumber', 'like', '%' . $request->input_filter . '%');
                }

            }

        $employer=$query->paginate($paginate)->withQueryString();
        return view('admin.employer.index',compact('employer' ,'i'))->with('session_filterCategory',$request->filter_category);

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
