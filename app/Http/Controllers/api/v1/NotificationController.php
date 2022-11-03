<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function get(){

         // $notification = Auth::user()->unreadNotifications;
         $notification = Auth::user()->notifications()->get();
        $count = Auth::user()->unreadNotifications->count();


        return response()->json(['count'=>$count,'notification'=>$notification]);

    }
    public function read(Request $request)
    {
            Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
            return 'success';

    }

    public function destroy($id)
    {

        $user_id=Auth::id();

        auth()->user()->notifications()->where('id', $id)->delete();

        return response()->json(['message'=>'Уведомление удалено']);


    }
}
