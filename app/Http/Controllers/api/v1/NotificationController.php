<?php

namespace App\Http\Controllers\api\v1;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $dd=DB::table('notifications')->where('notifiable_id',  Auth::id())->orderBy('created_at','desc')->get();
            $database=json_decode($dd);

            return response()->json(['notification'=>$database]);

    }

    public function destroy($id)
    {

        $user_id=Auth::id();

        auth()->user()->notifications()->where('id', $id)->delete();

        return response()->json(['message'=>'Уведомление удалено']);


    }
    public function unreadNotificationCount(){

       $unread_notification_count=Auth::user()->unreadNotifications()->count();

        event(new NotificationEvent(Auth::id(),['unread_notification_count'=>$unread_notification_count]));
        return $unread_notification_count;
    }
}
