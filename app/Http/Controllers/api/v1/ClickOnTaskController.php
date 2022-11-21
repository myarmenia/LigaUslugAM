<?php

namespace App\Http\Controllers\api\v1;

use App\Events\NotificationEvent;
use App\Events\UnreadNotificationCountEvent;
use App\Http\Controllers\Controller;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategory;
use App\Models\Task;
use App\Models\TransactionApi;
use App\Models\User;
use App\Notifications\NotifiyEmployer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClickOnTaskController extends Controller
{
    public function clickOnTask(Request $request){
        $user_id = Auth::user()->id;
        $check_status = User::where('id',$user_id)->first();
        if($check_status->status =="Пасив"){
            return response()->json(['message'=>'Вы не можете подать заявку на эту работу, пока ваш статус пассивный.']);
        }else{


                $click = Task::where('id',$request->task_id)->first();
                $attach_click_price = Subcategory::where('subcategory_name',$click->subcategory_name)->first();
                $click_price = $attach_click_price->price;
                $check_balance=ExecutorProfile::where('user_id',$user_id)->first();

                if($check_balance->balance-$click_price>0){
                    $second_time_click=ClickOnTask::where(['task_id'=>$request->task_id,'executor_profile_id' => $check_balance->id])->first();

                    if($second_time_click){
                        return response()->json(['message'=>'Вы уже откликнулись на этот заказ.']);
                    }
                    if($request->service_price_to<$request->service_price_from){
                        return response()->json(['message'=>'Стоимость услуги До не может быть меньше, чем От.']);
                    }
                        $clickontask=ClickOnTask::create([
                            'task_id' => $request->task_id,
                            'executor_profile_id' => $check_balance->id,
                            'service_price_from' => $request->service_price_from,
                            'service_price_to' => $request->service_price_to,
                            'cost' => $request->cost,
                            'startdate_from' => $request->startdate_from,
                            'start_date_to' => $request->start_date_to,
                            'offer_to_employer' => $request->offer_to_employer
                    ]);

                        // inserting subcategory  price into the  transaction_api table  when the  executor click on task, getting  subcategory  price which is the price of applaying  the task

                        $balance=TransactionApi::create([
                          'executor_profile_id' => $check_balance->id,
                          'transaction_name' => "Отклик",
                          'transaction_description' => $attach_click_price->subcategory_name,
                          'account' => $attach_click_price->price,
                    ]);
                    // updateing executor  balance after

                    $update_executor_profile_balance=ExecutorProfile::where('user_id',Auth::user()->id)->update([
                        'balance'=>$check_balance->balance-$click_price
                    ]);
                    $updated_executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
                            $employer=User::where('id',$click->user_id)->first();

                            $employer->notify(new NotifiyEmployer($clickontask));
                            // ---------------------creating event for socket-------------------------
                            $user_notification=DB::table('notifications')->where('notifiable_id',  $employer->id)->orderBy('created_at','desc')->get();
                            $database=json_decode($user_notification);
                            event(new NotificationEvent($employer->id, $database));
                            $unread_notification_count = Auth::user()->unreadNotifications()->count();
                            event(new UnreadNotificationCountEvent($employer->id, $unread_notification_count));
                            return response()->json(['message'=>'success']);
                }else{
                    return response()->json(['message'=>'Вы не можете подать заявку на эту работу, потому что вашего баланса недостаточно']);
                }
         }
    }


    public function respondedTaskForExecutor()
    {
        $user_id=Auth::user()->id;
        $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();

      //   $responded_task_for_Executor =  ClickOnTask::where(['executor_profile_id'=>$executor->id, 'status'=>'false'])->pluck('task_id');
       $responded_task_for_Executor =  ClickOnTask::with('tasks','tasks.users','tasks.image_tasks')->where(['executor_profile_id'=>$executor->id, 'status'=>'false'])->orderBy('id','desc')->get();
      // $tasks=Task::whereIn( 'id',$responded_task_for_Executor)->with('users','image_tasks')->get();


          return response()->json(['ClickOnTask'=>  $responded_task_for_Executor]);
    }
    public function employerWatchedClick(Request $request){

        foreach($request->ids as $data){
            $update=ClickOnTask::where('id',$data)->update([
                'employer_watched_click'=>1
            ]);
        };
        $clickonTask=ClickOnTask::whereIn('id',$request->ids)->get();
        return response()->json(['watched'=>$clickonTask]);



    }

}
