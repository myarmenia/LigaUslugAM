<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

    if(!function_exists('admin_notification_count')){
        function admin_notification_count(){
                  $unreadnotificationcount = Auth::user()->unreadNotifications->count();
        //              $notification = Auth::user()->unreadNotifications;
        return $unreadnotificationcount;
        }
    }
    if(!function_exists('admin_unreadnotification')){
        function admin_unreadnotification(){

                     $unreadnotification = Auth::user()->unreadNotifications;
                    //  foreach($unreadnotification as $items){

                    // }

             return  $unreadnotification;
        }
    }
    if(!function_exists('admin_unreadnotification_new_user_registered')){
        function admin_unreadnotification_new_user_registered(){

            $admin_newuserregister = Auth::user()->notifications()->where(['read_at'=>null,'type'=>"App\Notifications\NewUserNotification"])->get();
                $count = count($admin_newuserregister);
             return   $count;
        }
    }
    if(!function_exists('admin_unreadnotification_call_back')){
        function admin_unreadnotification_call_back(){

            $admin_call_back =  Auth::user()->notifications()->where(['read_at'=>null,'type'=>"App\Notifications\CallBackNotification"])->get();
                $count = count($admin_call_back);

             return   $count;
            return 'a';
        }
    }
    if(!function_exists('admin_unreadnotification_users_give_question')){
        function admin_unreadnotification_users_give_question(){

            $admin_users_give_question = Auth::user()->notifications()->where(['read_at'=>null,'type'=>"App\Notifications\UsersGiveQuestion"])->get();
                $count = count($admin_users_give_question);

             return   $count;
        }
    }
    //get all unread notification from  Служба поддержки
    if(!function_exists('admin_unreadnotification_message_for_support')){
        function admin_unreadnotification_message_for_support(){

            $admin_message_for_support = Auth::user()->notifications()->where(['read_at'=>null,'type'=>"App\Notifications\NotifyAdminMessageForSupport"])->get();
                $count = count($admin_message_for_support);

             return   $count;
        }
    }
    if(!function_exists('admin_unreadnotification_disagree_price')){
        function admin_unreadnotification_disagree_price(){

            $admin_message_for_support = Auth::user()->notifications()->where(['read_at'=>null,'type'=>"App\Notifications\NotifyAdminProblemMessage"])->get();
                $count = count($admin_message_for_support);

             return   $count;
        }
    }



?>
