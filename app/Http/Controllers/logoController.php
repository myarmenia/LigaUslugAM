<?php
namespace App\Http\Controllers;
use app\Services;
// use Illuminate\Support\Facades\App;

// require_once 'App\Services\AnimalService';


use Illuminate\Http\Request;

class logoController extends Controller
{
    protected AnimalService $animalService;

    public function __construct()
    {

        $this->middleware('permission:add-child', ['only' => ['create']]);
        $this->updateService = new updateService();
    }
    public function index(){
    // $animals=[
    //         { "type":"dog",
    //           "age":  10
    //         },
    //          {
    //           "type": "dog",
    //           "age" : 1}
    //         ];
    // dd(json_decode($animals,true));
        $animals = new AnimalService();
        // $animals->name="Dog";
        dd($animals);

        // return view('Mails.newjob');

    }
}
