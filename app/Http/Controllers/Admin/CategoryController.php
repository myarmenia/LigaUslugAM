<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category = Category:: paginate(20);

        return view('admin.all_category',compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required|min:2|max:255'

        ]);



            if(!$validate->fails()){

                $insert_category=Category::create([
                    "category_name" => $request->category_name,
                        "status" => $request->status,
                ]);
                if($insert_category){
                    return redirect()->back()->with('message','Категория создана!');
                }

            }else{

                return redirect()->back()->with('message_error','Заполните все поля');
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
        $show_special_category = Category::where('id',$id)->first();
        return view('admin.edit_category',compact('show_special_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


            $update_category=Category::where('id',$id)->update([
                "category_name" => $request->category_name,
            ]);
            if($update_category){

                return redirect()->back()->with('message','Подтема обновлена ');
            }else{
                return redirect()->back()->with('message_error','Подтема необновлена ');
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete_category=Category::where('id',$id)->delete();
        return redirect()->back()->with('message','Подтема удалена ');
    }
}
