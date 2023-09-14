<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExecutorProfile;
use App\Models\Subcategory;
use App\Models\Task;
use App\Services\AllTasksService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function index($categoryId,$subcategoryName)

    // {

    //     $subcategory=explode('_',$subcategoryName);
    //     $get_category_id=Subcategory::where('subcategory_name',$subcategory[0])->first();
    //     $find_subcategory_category=Subcategory::whereIn('subcategory_name',$subcategory)->get();


    //     if($get_category_id->category_id=$categoryId){
    //         $category_subcategory=Category::where('id',$categoryId)->with('subcategories')->first();

    //         $query = Task::latest();
    //         $query->whereIn('subcategory_name', $subcategory)->with('users');


    //         $task = $query->paginate(10)->withQueryString();
    //         return response()->json(['message'=>$task,'category'=>$category_subcategory,'selected_subcategory'=> $find_subcategory_category]);
    //     }

    // }
    public function index(Request $request)
    {
        $json_decode_subcategory = json_decode($request->subcategory_name);



        $find_subcategory_category=Subcategory::whereIn('subcategory_name',$json_decode_subcategory)->get();
dd($find_subcategory_category);

        if($request->category_id!=null){
            $category_subcategory=Category::where('id',$request->category_id)->with('subcategories')->first();

            $query = Task::latest();
            $query->whereIn('subcategory_name', $request->subcategory_name)->with('users');

            if($request->has('region_name')){
                $query->where('region',$request->region);
            }


            $task = $query->paginate(10)->withQueryString();
            return response()->json(['message'=>$task,'category'=>$category_subcategory,'selected_subcategory'=> $find_subcategory_category]);
        }

    }
    public function allTasks(){

        $query = Task::with('users')->latest();

        $query->where('status','false');

        $all_task=$query->paginate(5)->withQueryString();

        return response()->json(['message'=>$all_task]);

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
