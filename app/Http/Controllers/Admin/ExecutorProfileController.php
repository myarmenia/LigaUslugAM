<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\ExecutorWorkingRegion;
use App\Models\Reiting;
use App\Models\User;
use Illuminate\Http\Request;

class ExecutorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $inputsearch;
    public $region;
    public function index(Request $request){
        $paginate=10;
        $i=$request['page'] ? ($request['page']-1)*$paginate : 0;
        $query=ExecutorProfile::latest();
        if(!empty($request->executor_filter && $request->filter_category)){
            $this->inputsearch=$request->executor_filter;
            if($request->filter_category == 'rating'){
                $query->where('total_reiting', 'like', '%' . $this->inputsearch . '%');

            }

            if($request->filter_category == 'region'){
                $query->whereIn('id',ExecutorWorkingRegion::where(function($inner_query){
                    $inner_query->where('executorwork_region', 'like', '%' . $this->inputsearch . '%');
                })->pluck('executor_profile_id'));
            }
            if($request->filter_category == 'phone_number'){
                $query->whereIn('user_id',User::where(function($inner_query){
                    $inner_query->where('phonenumber', 'like', '%' . $this->inputsearch . '%');
                })->pluck('id'));
            }
            if($request->filter_category == 'executor_name'){
                $query->whereIn('user_id',User::where(function($inner_query){
                    $inner_query->where('name', 'like', '%' . $this->inputsearch . '%')
                                ->orWhere('last_name', 'like', '%' . $this->inputsearch .'%');
                })->pluck('id'));
            }

        }
        $all_executor=$query->paginate($paginate)->withQueryString();

        return view('admin.all_executor',compact('all_executor','i'))->with('session_filterCategory',$request->filter_category);

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
        $executor_profile=ExecutorProfile::where('id',$id)->first();
        $rating=Reiting::where('executor_profile_id',$id)->get();

        return view('admin.executor_profile_page',compact('executor_profile','rating'));
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
