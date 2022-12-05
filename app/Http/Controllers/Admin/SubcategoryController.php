<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $all_subcategory = Subcategory::paginate(120);
        $all_subcategory=Category::with('subcategories')->paginate(5);



        return view('admin.all_subcategory',compact('all_subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('category_name','id');
        return view('admin.add_subcategory',compact('category'));

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
            'subcategory_name' => 'required|min:2|max:100'

        ]);

            if(!$validate->fails()){

                $insert_subcategory=Subcategory::create([
                         "category_id" => $request->category_id,
                    "subcategory_name" => $request->subcategory_name,
                               "price" => $request->subcategory_name_price,
                              "status" => $request->status,
                ]);

                if( $insert_subcategory){
                    return redirect()->back()->with('message','Подкатегория создана!');
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
        $show_subcategory = Subcategory::where('id',$id)->first();

        return view('admin.edit_subcategory',compact('show_subcategory'));
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

        $subcategory_update = Subcategory::where('id',$id)->update([

                'subcategory_name' => $request->subcategory_name,
                           'price' => $request->subcategory_price
        ]);
        if($subcategory_update){
            return redirect()->back()->with('message','Подкатегория обновлена ');
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

        $delete_subcategory=Subcategory::where('id',$id)->delete();
        return redirect()->back()->with('message','Подкатегория удалена');
    }
}
