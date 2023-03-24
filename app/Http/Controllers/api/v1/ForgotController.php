<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Message;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ForgotController extends Controller
{
        public function forgot(ForgotRequest $request)
        {
            $email=$request->email;
            if(User::where('email',$email)->doesntExist()){
                return response([
                    'message'=>'User dosent exists'
                ],404);
            }
            $token =Str::random(10);
            try{
                DB::table('password_resets')->insert([
                    'email'=>$email,
                    'token'=>$token
                ]);
                // in resources we create Mails folder  in
                // Mail::send('Mails.forgot',['token'=>$token,'email'=>$email],function (Message $message) use ($email){
                //         $message->to($email);
                //         $message->subject('Восстановление пароля');
                // });
                return response([

                    'message'=>'Проверти вашу почту'
                ]);

            }catch(\Exception $exception){
                return response([
                    'message'=>$exception->getMessage()
                ],400);
            }

        }
        public function reset (ResetRequest $request){
            $token=$request->token;
            $email=$request->email;
            if(!$passwordResets = DB::table('password_resets')->where(['token'=>$token,'email'=>$email] )->first()){
                return response([
                    'message'=>'Invalid token!'
                ],400);
            }
            /** @var User $user */
            if(!$user=User::where('email',$passwordResets->email)->first()){
                return response([
                    'message'=>'User dosen\'t exist!'
                ],404);
            }
            // genereting new password
            $user->password=Hash::make($request->password);
            $user->save();

            return response([
                'message'=>'Вы успешно изменили ваш пароль'
            ]);


        }
}

