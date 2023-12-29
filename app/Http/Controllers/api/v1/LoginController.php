<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Passport\HasApiTokens;

class LoginController extends Controller{





    public function login(Request $request){




        $login = $request->validate([
                'email'=>'required',
                'password'=>'required',
            ]);



            if(!Auth::attempt([

                'email'=>$request->email,
                'password'=>$request->password,
            ])){

                return response(['message'=>'Invalid login credentails.'],400);
            }





            if(!Auth::attempt($login) ){
                return response(['message'=>'Invalid login credentails.'],400);
            }

            $user=User::find(Auth::id());

            if($user->email_verified_at){
                $accessToken = Auth::user()->createToken('authToken')->accessToken;

                return response(['user'=>['user_id'=> Auth::user()->id,'user_name'=> Auth::user()->name,'user_email'=> Auth::user()->email],'access_token'=>$accessToken]);
            }else{

                return response(['message'=>'Подтвердите адрес электронной почты!']);
            }

    }
    public function updateSocLink(Request $request){
        $user_id=Auth::user()->id;
        // $fasebook_link="https://mail.ru/";
        $fasebook_link=$request->input('fasebook_link');
        $instagram_link=$request->input('instagram_link');
        $updatesoclinks=User::where('id',$user_id)->update(['fasebook_link'=>$fasebook_link,'instagram_link' => $instagram_link]);
        if($updatesoclinks){
            return response(['message'=>'Вы успешно обновили ссылки в социальных сетях']);
        }else{
            return response(['message'=>'Вы не обновляли свои ссылки']);
        }


    }
    public function updateNotification(Request $request){
        $user_id=Auth::user()->id;

        $geting_notification=$request->geting_notification;

        $updatenotification=User::where('id',$user_id)->update(['geting_notification'=>$geting_notification]);
        return response(['message'=>'Вы успешно обновили свой увидомления по заказам']);
    }
}
