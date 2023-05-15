<?php

namespace App\Http\Controllers\api\v1;

use App\Events\NotificationEvent;
use App\Events\SectionTaskCountEvent;
use App\Events\UnreadNotificationCountEvent;
use App\Http\Controllers\Controller;
use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\specialTaskExecutor;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategory;
use App\Models\Task;
use App\Models\TransactionApi;
use App\Models\User;
use App\Notifications\NotifiyEmployer;
use App\Notifications\NotifyEmployerDeleteTaskFromTwoDay;
use App\Notifications\ReturnedMoneyExecutorTwoDay;
use App\Services\ExecutorTaskCountService;
use App\Services\TaskCountService;
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
                    $task=Task::where('id',$request->task_id)->first();
                    if($task->status=='not confirmed'){
                        $task->status='false';
                        $task->save();
                        specialTaskExecutor::where('task_id',$request->task_id)->update([
                            'status'=>false
                        ]);
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

                    $update_executor_profile_balance = ExecutorProfile::where('user_id',Auth::user()->id)->update([
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

                            //afterclicking  this socket will change   all  employer task sections  number
                            $get_employer_task_section_count=TaskCountService::get($employer->id);

                            // $get_responded_task = ExecutorTaskCountService::respondedtaskforexecutor(Auth::id());
                            // return response()->json(['message'=>$get_responded_task ]);
                            return response()->json(['message'=>'success']);
                }else{
                    return response()->json(['message'=>'Вы не можете подать заявку на эту работу, потому что вашего баланса недостаточно']);
                }
         }
    }


    public function respondedTaskForExecutor()
    {

        $responded_task_for_Executor=ExecutorTaskCountService::respondedtaskforexecutor(Auth::id());

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
    public function returnMoney(){

        date_default_timezone_set('Europe/Moscow');
        $now_time = date('Y-m-d H:i:s',strtotime('now'));
        // dd($now_time);

        $click_on_task = ClickOnTask::where('status','false')->get();
            foreach($click_on_task as $item){
                $task_date = $item->created_at;

                $task_date = date('Y-m-d H:i:s', strtotime($task_date . '+2 day'));
                // dd($task_date);
                if($task_date<$now_time){
                    // dd($item->tasks->subcategory_name);
                    $subcategory = Subcategory::where('subcategory_name',$item->tasks->subcategory_name)->first();
                    $click_price = $subcategory->price;

                    $executor = ExecutorProfile::where('id',$item->executor_profile_id)->first();
                    $balance = $executor->balance;

                     $executor->users->notify(new ReturnedMoneyExecutorTwoDay($item));

                        $new_balance = $balance+$click_price;
                        ExecutorProfile::where('id',$item->executor_profile_id)->update([
                            'balance'=>$new_balance
                        ]);

                        $find_click = ClickOnTask::where('id',$item->id)->first();

                        $find_click->status='returnedmoney';
                        $find_click ->save();

                }
            }

    }
    public function twodays(){
         // через 2 дня предупреждаем заказчику о том, что задание будет удалено, если нет откликов
         date_default_timezone_set('Europe/Moscow');
         $now_time=date('Y-m-d H:i:s',strtotime('now'));


         $auth_task=Task::where('status',false)->pluck('id');

         $click_on_task=ClickOnTask::whereIn('task_id',$auth_task)->pluck('task_id');
         $task = Task::where('status','=','false')
                 ->where(function ($query)  use($click_on_task) {
                     $query->whereNotIn('id', $click_on_task);

                 })->get();

                 foreach($task as $item){
                     $task_date=$item->created_at;

                     $task_date = date('Y-m-d H:i:s', strtotime($task_date . '+2 day'));


                     if($task_date<$now_time){
                         info($item);
                       
                         $item->users->notify(new NotifyEmployerDeleteTaskFromTwoDay($item));

                     }
                 }


         // \Log::info("ggggg")
    }

}
