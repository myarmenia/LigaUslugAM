<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerReviewResource;
use App\Models\ExecutorProfile;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reiting;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function showEmployerReview(){
        $user = Auth::user()->id;


        $rating=Reiting::where('user_id',$user)->get();
       

        $k=EmployerReviewResource::collection($rating);
        return response()->json($k);
    }
}
