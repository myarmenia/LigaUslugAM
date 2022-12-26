<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\Mail\MyDemoMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

// use Illuminate\Support\Facades\App;

// require_once 'App\Services\AnimalService';


class logoController extends Controller
{


    public function index(){
         $file=public_path('pdf/new.pdf');

        $myEmail = 'armine.khachatryan1982@gmail.com';
     
        	Mail::to($myEmail)->send(new MyDemoMail( $file));
        dd("Mail Send Successfully");

    	// Mail::to($myEmail)->send(new MyDemoMail());
        // dd("Mail Send Successfully");

    }
}
