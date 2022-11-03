<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\Employer;
use Illuminate\Http\Request;
//
use Illuminate\Support\Facades\Notification;

class TestEnrollmentController extends Controller
{
    public function sendTestNotification(){
        $user = Auth::user();
        $enrollmentData=[
                      'body' => 'You recived  an new test notification',
            'enrollmentText' => 'You are allowed to enroll',
                       'url' => url('/api/v1/user/login'),
                  'Thankyou' => 'You have 14 days to enroll',
                  'user_name' => $user->name,
                  'user_email' =>$user->email,

        ];
        // $user->notify(new Employer($enrollmentData));
        Notification::send($user,new Employer($enrollmentData));
        return response()->json(['message'=>$enrollmentData],200);
    }
}
