<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExecutorProfile;
use App\Models\ExecutorSubcategory;
use App\Models\ExecutorWorkingRegion;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindExecutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(44);
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
    public function show($category_id,$subcategoryName)
    {

        $find_subcategory_category=Subcategory::where('subcategory_name',$subcategoryName)->first();
        if($find_subcategory_category->category_id==$category_id){
            $category_subcategory=Category::where('id',$category_id)->with('subcategories')->first();


            $findExecutorId = ExecutorSubcategory::where('subcategory_name',$subcategoryName)->pluck('executor_profile_id')->toArray();
                if(Auth('api')->user()){
                    $executor = ExecutorProfile::where('user_id',Auth('api')->user()->id)->first();


                    if($executor != null){
                        // removing element from array
                        $findExecutorId = array_diff($findExecutorId, array($executor->id));
                    }

                }

            $findExecutor=ExecutorProfile::whereIn('id', $findExecutorId)->with('users','executor_categories')->paginate(10)->withQueryString();
            if($findExecutor->total()==0){
                return response()->json(['message'=>"Специалисты по данным параметрам не найдены"]);
            }else{
                return response()->json(['message'=>$findExecutor,'category'=>$category_subcategory,'selected_subcategory'=> $find_subcategory_category]);
            }

        }else{
            return response()->json(['message'=>"Эта подкатегорий не соответствует данной категории"]);
        }

    }

    public function filter($category_id,$region,$executor_subcategory){
        $subcategory_array=explode("_",$executor_subcategory);

            $findExecutorId = ExecutorSubcategory::whereIn('subcategory_name',$subcategory_array)->pluck('executor_profile_id');

            $matched_executor = ExecutorProfile::whereIn('id',$findExecutorId)->with('users','executor_categories');

            $working_region = ExecutorWorkingRegion::distinct()->where('executorwork_region',$region)->pluck('executor_profile_id');
            $matched_executor = $matched_executor->whereIn('id',$working_region)->paginate(10)->withQueryString();
            $category=Category::where('id',$category_id)->with('subcategories')->get();

            return response()->json(['executor'=>$matched_executor,'selected_subcategories'=>$subcategory_array,'selected_region'=>$region,'category'=>$category],200);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(22);
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
        dd(33);
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
