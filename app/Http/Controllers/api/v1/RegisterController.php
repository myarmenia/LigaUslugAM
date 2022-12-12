<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NotifyNewUserRegistration;
use App\Notifications\UserRegistrationAdmin;
use Illuminate\Mail\Message;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use LVR\Phone\Phone;
use LVR\Phone\E123;
use LVR\Phone\E164;
use LVR\Phone\NANP;
use LVR\Phone\Digits;

class RegisterController extends Controller

{


    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' =>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'phonenumber'=>'required|digits:11',
            'phonenumber' => new Digits,

        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());

        // event(new Registered($user));
        $user->notify(new NotifyNewUserRegistration($user));


        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        // $user->notify(new UserRegistrationAdmin($user));

        // $response = ['user'=>$user,'token' => $token];
        $response = ['message' => 'Проверьте свою электронную почту!'];
        // return response($response, 200);
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        if($token){
            $response = ['message' => 'You have been successfully logged out!'];
        }else{
            echo "ok";
        }

        return response($response, 200);
    }
}
