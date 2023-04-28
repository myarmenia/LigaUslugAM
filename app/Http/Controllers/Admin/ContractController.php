<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract=Contract::all();

        return view('admin.contract.index',compact('contract'));
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
        $validator=Validator::make($request->all(), [
            'description' => 'required',
            'contract_path'=>'file|required|mimes:docx',
        ]);
        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $create_contract = Contract::create([
            "description"=>$request->description,

        ]);

        if($request->has('contract_path')){

            $path = FileUploadService::upload($request->contract_path,'admin/contracts/'.$create_contract->id);
            // dd($path);
            $create_contract->update([
                'name'=>$path['name'],
                'contract_path'=>$path['path']

            ]);
            return redirect()->back()->with('success','Файл был успешно загружен');
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
        $contract = Contract::where('id',$id)->first();
        if(file_exists('admin/contract/'.$contract->contract_path)){

            unlink('admin/contract/'.$contract->contract_path);
        }
        $contract = Contract::where('id',$id)->delete();
        return redirect()->back();
    }
}
