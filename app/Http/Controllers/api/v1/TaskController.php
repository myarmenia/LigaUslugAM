<?php

namespace App\Http\Controllers\api\v1;

use App\Events\NotificationEvent;
use App\Events\NotifyAsTaskExecutor as EventsNotifyAsTaskExecutor;
use App\Events\NotifyAsTaskExecutorEvent;
use App\Events\RejectTaskExecutor;
use App\Events\RejectTaskExecutorNotSelected;
use App\Events\ShowAllTasksCountToExecutorEvent;
use App\Events\UnreadNotificationCountEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CheckTaskValidation;
use App\Http\Resources\InProcessResource;
use App\Http\Resources\RespondedExecutorResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Models\User;
use App\Models\Category;
use App\Models\ClickOnTask;
use App\Models\ExecutorCategory;
use App\Models\ExecutorProfile;
use App\Models\ImageTask;
use App\Models\specialTaskExecutor;
use App\Models\Subcategory;
use App\Models\Task;
use App\Models\TransactionApi;
use App\Notifications\Employer;
use App\Notifications\ExecutorAppleidTaskButNotSelected;
use App\Notifications\NotifyAsTaskExecutor;
use App\Notifications\NotifyEmployerExecutorCompletedTask;
use App\Notifications\NotifyExecutorEmployerCompletedTask;
use App\Notifications\NotifyExecutorForMeeting;
use App\Notifications\NotifyExecutorForNewJob;
use App\Notifications\NotifyExecutorForNewJobEveryTime;
use App\Notifications\NotifyExecutorForSpecialTask;
use App\Notifications\RejectTaskExecutorNotification;

use Illuminate\Http\File;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

use function PHPUnit\Framework\assertNotNull;

class   TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $from;
    public $to;
    public $status;
    public function  getList(Request $request){
        $this->from=$request->from;
        $this->to=$request->to;
        $this->status=$request->status;
        $task=Task::where('user_id',Auth::id())->where(function($query) use ($request){

                // $query->orWhere([
                //         ['p', '>=', $this-> task_price['price_from']],
                //         ['price_to',   '<=', $this->task_price['price_to']],
                //     ]);
        });
    }

    public function createNewTask(CheckTaskValidation $request){

        // executor,Дистанционно,client
        $user=Auth::user()->id;



         if($request->task_location=='Дистанционно'){
            $validated = $request->validated();

            $task=Task::create([
                'user_id'=> $user,
                  'title'=> $request['title'],
          'category_name'=> $request['category_name'],
       'subcategory_name'=> $request['subcategory_name'],
       'task_description'=> $request['task_description'],
         'task_starttime'=> $request['task_starttime'],
        'task_finishtime'=> $request['task_finishtime'],
             'price_from'=> $request['price_from'],
               'price_to'=> $request['price_to'],
          'task_location'=> $request['task_location'],
      ]);
         }
         else if($request->task_location=='executor'){
            $validated = $request->validated();

             $task=Task::create([
                'user_id'=> $user,
                  'title'=> $request['title'],
          'category_name'=> $request['category_name'],
       'subcategory_name'=> $request['subcategory_name'],

       'task_description'=> $request['task_description'],
         'task_starttime'=> $request['task_starttime'],
        'task_finishtime'=> $request['task_finishtime'],
             'price_from'=> $request['price_from'],
               'price_to'=> $request['price_to'],
          'task_location'=> $request['task_location'],

      ]);
         }
         else{
        $request->validate([
                 'region' => 'required',
                'address' => 'required',
                 'nation' => 'required',
           'country_name' => 'required'
            ]);
            $validated = $request->validated();

            $task=Task::create([
                'user_id'=> $user,
                  'title'=> $request['title'],
          'category_name'=> $request['category_name'],
       'subcategory_name'=> $request['subcategory_name'],
                 'nation'=> $request['nation'],
           'country_name'=> $request['country_name'],

                 'region'=> $request['region'],
                'address'=> $request['address'],
       'task_description'=> $request['task_description'],
         'task_starttime'=> $request['task_starttime'],
        'task_finishtime'=> $request['task_finishtime'],
             'price_from'=> $request['price_from'],
               'price_to'=> $request['price_to'],
          'task_location'=> $request['task_location'],
      ]);

         }

        if ($request->hasfile('task_img')) {
            foreach($request->file('task_img') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('admin/img/img_tasks'), $name);
                $image_task=ImageTask::create([
                    'task_id'=>$task->id,
                    'image_name'=>$name
                ]);
            }
        }
        if($request->has('executor_id')){

            $offertask=specialTaskExecutor::create([
                'task_id'=>$task->id,
                'executor_id'=>$request->executor_id
            ]);

            Task::where('id',$task->id)->update(['status'=>'not confirmed']);

        }



        $show_new_task=Task::with('users','image_tasks','special_task_executors','special_task_executors.executor_profiles.users')->where('id',$task->id)->get(["id","user_id", "title","category_name","subcategory_name","nation","country_name","region","address","task_description","task_starttime","task_finishtime","price_from","price_to","task_location","status"]);

        $deadlineday = date('Y-m-d',strtotime('-1 day'));

        $check_categories = Task::where('created_at','>=',$deadlineday)->pluck('category_name');

        $executor_categories = ExecutorCategory::where('category_name',$task->category_name)->pluck('executor_profile_id');


        if($request->has('executor_id')){

            $executor_prof=ExecutorProfile::where('id',$request->executor_id)->first();
            $executor_prof->users->notify(new NotifyExecutorForSpecialTask($executor_prof->user_id,$show_new_task[0]));
             // =======creating socket for event ==================
             $executor_notification = DB::table('notifications')->where('notifiable_id', $executor_prof->users->id)->orderBy('created_at','desc')->get();
             $database = json_decode($executor_notification);
             event(new NotificationEvent( $executor_prof->users->id, $database));
             $unread_notification_count = Auth::user()->unreadNotifications()->count();
             event(new UnreadNotificationCountEvent( $executor_prof->users->id, $unread_notification_count));
            return response()->json($show_new_task);
        }

        $user_ides = ExecutorProfile::whereIn('id', $executor_categories)->pluck('user_id');

        $user = User::whereIn('id',$user_ides)->get();
            foreach($user as $item){
                // =======notification section start ==================
                $item->notify(new NotifyExecutorForNewJobEveryTime($item->id,$show_new_task));

                // =======creating socket for event ==================
                $user_notification = DB::table('notifications')->where('notifiable_id',$item->id)->orderBy('created_at','desc')->get();
                $database = json_decode($user_notification);
                event(new NotificationEvent( $item->id, $database));
                $unread_notification_count = Auth::user()->unreadNotifications()->count();
                event(new UnreadNotificationCountEvent( $item->id, $unread_notification_count));

            }
        return response()->json($show_new_task);
    }

    public function completedTasks(){
        $user=Auth::user()->id;

        $finished_task=Task::with('reitings')->with('executor_profiles','executor_profiles.users','problem_messages')->where(['user_id'=>$user,'status'=>'completed'])->orderBy('id','desc')->get();

      // $finishedTaskEndpoint= UserResource::collection($finished_task);
      //  return response()->json($finishedTaskEndpoint);
      return response()->json($finished_task);
    }
    public function completedTasksForExecutor(){
        $user_id=Auth::user()->id;
        $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
        $executorcompletedtask= Task::with('users')->with('image_tasks','reitings')->where(['executor_profile_id'=>$executor->id,'status'=>'completed'])->get();
        return response()->json(['tasks'=>$executorcompletedtask]);
    }

    public function notAppliedTask()
    {
        $user = Auth::user()->id;
        $finished_task = Task::where(['user_id'=>$user,'status'=>'false'])->orderBy('id','desc')->get();
        $array=[];
        foreach($finished_task as $items){

            $clickontask=ClickOnTask::where('task_id',$items->id)->first();
            if(!$clickontask){
                array_push($array,$items->id);
            }
        }

        $task=Task::whereIn('id',$array)->orderBy('id','desc')->with('image_tasks')->get();


        return response()->json($task);

    }

    public function inProcessTask(){
        $user = Auth::user()->id;
        $inprocess = Task::with('problem_messages')->with('executor_profiles.users')->with('image_tasks')->where(['user_id'=>$user,'status'=>'inprocess'])->orderBy('id','desc')->get();
        if($inprocess->isNotEmpty()){
            return response()->json(['tasks'=>$inprocess]);

        }else{
            return response()->json(['message'=>"У вас нет задач в процессе"]);
        };

    }
    public function tasksInProgressForExecutor(){
        $user_id=Auth::user()->id;
        $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
        $inprocess = Task::with('users')->with('image_tasks')->where(['executor_profile_id'=>$executor->id,'status'=>'inprocess'])->orderBy('id','desc')->get();
        return response()->json(['tasks'=>$inprocess]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employerComplateTask(Request $request)
    {
        foreach($request->employercomplatetask as $items){

            $task=Task::where('id',$items['task_id'])->first();

            if($task->status =='inprocess'){

                $update_task=Task::where('id',$items['task_id'])->update([
                    'status'=>'completed'
                ]);
                $task = Task::with('users','executor_profiles.users')->where('id',$items['task_id'])->first();

                $task->executor_profiles->users->notify(new NotifyExecutorEmployerCompletedTask($task));
                 // =======creating socket for event ==================
                 $user_notification = DB::table('notifications')->where('notifiable_id',  $task->executor_profiles->users->id)->orderBy('created_at','desc')->get();
                 $database = json_decode($user_notification);
                 event(new NotificationEvent($task->executor_profiles->users->id, $database));

                 $unread_notification_count = Auth::user()->unreadNotifications()->count();
                 event(new UnreadNotificationCountEvent($task->executor_profiles->users->id, $unread_notification_count));
                return response()->json($task);
            }
            else if($task->status =='completed'){
                return response()->json(['message'=>'Эта задача уже выполнена']);
            }
            else{
                return response()->json(['message'=>'Эта задача не может быть закрыта, так как она не находится в состоянии "Заказы в работе".']);
            }

        }

    }


    public function selectTaskExecutor(Request $request){

        if($request->has('select_task_executor')){

            foreach($request->select_task_executor as $value){
                $updatetask=Task::where('id',$value['task_id'])->update([
                    'executor_profile_id' => $value['executor_profile_id'],
                                 'status' => "inprocess",
                ]);
                $check_task_status=Task::where('id',$value['task_id'])->first();

                if($updatetask){

                    $task = Task::where('id',$value['task_id'])->first();


                    $click_on_task = ClickOnTask::where('task_id',$value['task_id'])->get();

                    foreach($click_on_task as $items){

                        if($items['executor_profile_id']!= $value['executor_profile_id']){

                            $click=Task::where('id',$value['task_id'])->first();

                            $attach_click_price=Subcategory::where('subcategory_name',$click->subcategory_name)->first();

                            $click_price = $attach_click_price->price;

                            $finding_executor_for_returning_click_money = ExecutorProfile::where('id', $items['executor_profile_id'])->first();

                            $executor_balance=$finding_executor_for_returning_click_money->balance;
                            $total_sum=$click_price+$executor_balance;
                            $returning_price = ExecutorProfile::where('id',$items['executor_profile_id'])->update([
                                'balance' => $total_sum
                            ]);
                            // changing status after selecting executor in  clickontask table  status  rejected

                            $not_selected_executor_status = ClickOnTask::where([
                                    ['task_id','=',$value['task_id'] ],
                                    ['executor_profile_id','!=', $value['executor_profile_id']]
                                ])->update([
                                    "status" => "rejected"
                                ]);

                             $notifyExecutorForTaskNotSelected = ExecutorProfile::where('id',$items['executor_profile_id'])->first();

                            $clickontask_rejected_executor = ClickOnTask::with('executor_profiles.users')->where(['task_id'=>$value['task_id'],'status'=>'rejected'
                            ])->first();

                            $notifyExecutorForTaskNotSelected->users->notify(new RejectTaskExecutorNotification($clickontask_rejected_executor));

                            $user_notification = DB::table('notifications')->where('notifiable_id', $notifyExecutorForTaskNotSelected->users->id)->orderBy('created_at','desc')->get();
                            $database = json_decode($user_notification);
                            event(new NotificationEvent($notifyExecutorForTaskNotSelected->users->id,$database));

                            $unread_notification_count = Auth::user()->unreadNotifications()->count();
                            event(new UnreadNotificationCountEvent( $notifyExecutorForTaskNotSelected->users->id, $unread_notification_count));

                        }
                        else{
                             // changing status after selecting executor when executor_profile_id is equal request executor_profile_id  in  clickontask table  status into inprocess

                            $update_status = ClickOnTask::where(['task_id'=>$value['task_id'],'executor_profile_id'=>$value['executor_profile_id']])->update([
                                'status'=>"inprocess"
                            ]);

                            $selected_executor_click_on_task = ClickOnTask::with('executor_profiles.users')->where(['task_id'=>$value['task_id'],'executor_profile_id'=>$value['executor_profile_id']])->first();

                        }
                    }

                    // working websocket event

                    $executor = ExecutorProfile::Select('user_id')->with('users')->where('id',$value['executor_profile_id'])->first();

                    $executor->users->notify(new NotifyAsTaskExecutor($selected_executor_click_on_task));

                    // working notification part

                    $user_notification = DB::table('notifications')->where('notifiable_id', $executor->users->id)->orderBy('created_at','desc')->get();
                    $database=json_decode($user_notification);

                    event(new NotificationEvent($executor->users->id,$database));
                    $unread_notification_count = Auth::user()->unreadNotifications()->count();
                    event(new UnreadNotificationCountEvent($executor->users->id, $unread_notification_count));

                    return response()->json(['message'=>'success'], 200);

                }
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rejectTaskExecutor(Request $request)
    {

        if($request->has('reject_task_executor')){

            foreach($request->reject_task_executor as $value){

                $task = Task::where('id',$value['task_id'])->first();


                 $click_on_task = ClickOnTask::where(['executor_profile_id'=>$value['executor_profile_id'],'task_id'=>$value['task_id']])->update([
                    'status'=>'rejected']);
                $click_on_task = ClickOnTask::with('tasks','tasks.users')->where(['executor_profile_id'=>$value['executor_profile_id'],'task_id'=>$value['task_id']])->first();
                $subcategory_price = Subcategory::where('subcategory_name', $click_on_task->tasks->subcategory_name)->first();

                $rejected_executor = ExecutorProfile::where('id',$value['executor_profile_id'])->first();
                $executor_balance=$rejected_executor->balance;
                $return_click_price=$subcategory_price->price;
                $total_balance=$executor_balance+$return_click_price;

                $update_executor_balance =  ExecutorProfile::where('id',$value['executor_profile_id'])->update([
                    'balance'=>$total_balance
                ]);

                $executor=ExecutorProfile::Select('user_id')->with('users')->where('id',$value['executor_profile_id'])->first();
                // working websocket event

                // event(new RejectTaskExecutor($executor->users->id ,['task_id'=>$value['task_id'],'executor_name'=>$executor->users->email]));
                $message=[
                              'body' => 'Уважаемый Исполнитель, спасибо за заявку, но заказчик уже выбрал Исполнителя',
                    'enrollmentText' => 'Перейди по ссылке',
                               'url' => url('/api/v1/user/login'),
                          'Thankyou' => 'Спасибо за заявку',
                         'user_name' => $executor->users->name,
                        'user_email' => $executor->users->email,

                ];

                $executor->users->notify(new RejectTaskExecutorNotification($click_on_task));
                $call_method = $this->respondedExecutor();

                $user_notification = DB::table('notifications')->where('notifiable_id', $executor->users->id)->orderBy('created_at','desc')->get();
                $database=json_decode($user_notification);
                event(new NotificationEvent($executor->users->id,$database));

                $unread_notification_count = Auth::user()->unreadNotifications()->count();
                event(new UnreadNotificationCountEvent($executor->users->id, $unread_notification_count));


                // Notification::send($executor->users,new RejectTaskExecutorNotification($message));


                return response()->json(['message'=>$message],200);
            }
        }
    }
//======= y заказчика Откликнувшиеся исполнители===============
    public function respondedExecutor(){

        $user_id = Auth::user()->id;
        $task = Task::with(['click_on_tasks'=>function($q){
                $q->where('status','false');
           }])->where(['user_id'=>$user_id,'executor_profile_id'=>null])->get();
       $arr=[];
       foreach($task as $items){

           if($items->click_on_tasks->isNotEmpty() == true){
               array_push($arr,$items->id);
           };
       }

       if(count($arr)>0){
           $showrespondedtask =Task::with(['click_on_tasks'=>function($q){
                       $q->where('status','false');
                       }])->whereIn('id',$arr)->orderBy('id','desc')->get();
           $responded_executor = RespondedExecutorResource::collection($showrespondedtask);

           return response()->json(['message'=>$responded_executor]);
       }else{
           return response()->json(['message' => null]);
       }

   }

    public function showAllTaskToExecutor(){
        $user_id=Auth::id();

        $executor=ExecutorProfile::where('user_id', $user_id)->first();
        $executor_category=ExecutorCategory::where('executor_profile_id',$executor->id)->pluck('category_name');
        // -----select task where not in special task executors
        $special_task_executor_table=specialTaskExecutor::where('executor_id',$executor->id)->pluck('task_id');



        $task=Task::whereIn('category_name',$executor_category)
                    ->whereNotIn('id',$special_task_executor_table)
                    ->where([
                            ['executor_profile_id','=',Null],
                            ['user_id','!=', $user_id]
                            ])->with('users')->with('image_tasks')->orderBy('id','desc')->pluck('id');

       $click_on_task=ClickOnTask::whereIn('task_id',$task)->where([[ 'executor_profile_id','=',$executor->id],['status','=',false]])->pluck('task_id');
         $task=Task::whereIn('category_name',$executor_category)
                         ->whereNotIn('id',$special_task_executor_table)
                         ->where([
                                 ['executor_profile_id','=',Null],
                                 ['user_id','!=', $user_id]
                                 ])->with('users')->with('image_tasks')->orderBy('id','desc')->get();
        $notSelectedTaskCountforexecutor=count($task);


        return response()->json(['task_length'=>$notSelectedTaskCountforexecutor,'Tasks'=>$task]);
    }
    public function showAllTaskToExecutorCount(){
        $user_id=Auth::id();
        $executor=ExecutorProfile::where('user_id', $user_id)->first();
        $executor_category=ExecutorCategory::where('executor_profile_id',$executor->id)->pluck('category_name');

        $task=Task::whereIn('category_name',$executor_category)
                    ->where([
                            ['executor_profile_id','=',Null],
                            ['user_id','!=', $user_id]
                            ])->with('users')->with('image_tasks')->orderBy('id','desc')->pluck('id');
       $click_on_task=ClickOnTask::whereIn('task_id',$task)->where([[ 'executor_profile_id','=',$executor->id],['status','=',false]])->pluck('task_id');
         $task=Task::whereIn('category_name',$executor_category)
                         ->whereNotIn('id',$click_on_task)
                         ->where([
                                 ['executor_profile_id','=',Null],
                                 ['user_id','!=', $user_id]
                                 ])->with('users')->with('image_tasks')->orderBy('id','desc')->get();
        $notSelectedTaskCountforexecutor=count($task);

        event(new ShowAllTasksCountToExecutorEvent( $executor->users->id,$notSelectedTaskCountforexecutor));
        return response()->json(['task_length'=>$notSelectedTaskCountforexecutor]);

    }


// we decler $task_price then we can use in
    public  $task_price;
    public function filter(Request $request){

            $this->task_price = $request->task_price;
            $task = Task::where('executor_profile_id',  null)
                         ->where(function ($query) use ($request){
                                if($request->has('executor_categories')){

                                    $arr = [];
                                    foreach($request['executor_categories'] as $value){
                                        array_push($arr,$value);
                                    };

                                    $query->WhereIn('category_name',$arr);
                                }
                                if($request->has('task_location')){
                                    if($request->task_location == 'У клиента'){
                                        $query->Where(['task_location'=>$request['task_location'],'region'=>$request['region']]);
                                    }
                                    else{
                                        $query->Where('task_location',$request['task_location']);
                                    }
                                }
                                if($request->has('task_price')){
                                    if(!isset($request->task_price['price_to']) && isset($request->task_price['price_from'])){
                                        $query->Where('price_from', '>=', $this-> task_price['price_from'],

                                        );
                                    }else{
                                    $query->Where([
                                                        ['price_from', '>=', $this-> task_price['price_from']],
                                                        ['price_to',   '<=', $this->task_price['price_to']],
                                                    ]);
                                                }
                                }
                            })
                            ->get();
        if ($task->isNotEmpty() == true){
            return response()->json(['data' => $task]);
        }else{
            return response()->json(['data' => 'Уважаемый исполнитель! По заданным параметрам  ничего не найдено в базе']);
        }

    }

    public function meetingWithRespondedExecutor(Request $request){
        if($request->has('task_id','executor_profile_id') ){

                $update = ClickOnTask::where(['task_id'=>$request->task_id,'executor_profile_id'=>$request->executor_profile_id])->update([
                    "employer_offer_to_executor_task_meeting_date" => $request->employer_offer_to_executor_task_meeting_date,
                    "employer_offer_to_executor_task_meeting_time" => $request->employer_offer_to_executor_task_meeting_time
                ]);
                if($update){
                    $clickontask = ClickOnTask::where('task_id',$request->task_id)->first();
                    $clickontask->executor_profiles->users->notify(new NotifyExecutorForMeeting($clickontask));
                    // returning task with its executor clicks with meeting date and time
                    $task=Task::where('id',$request->task_id)->with('click_on_tasks')->get();

                        return response()->json(['task'=>$task]);

                }else{
                    return response()->json(['message'=>"Одно из значений неверно!"]);
                }
        };
    }
   public function showClikTask(Request $request){

        $task=Task::with('users','executor_profiles.users','image_tasks','click_on_tasks','click_on_tasks.executor_profiles.users','reitings','problem_messages','special_task_executors.executor_profiles.users')->find($request->id);
        return response()->json(['click-on-special-task'=> $task]);

    }
    // =========== у исполнитела === Заказы в работе == когда Завершить заказ ============

    public function materialWorkPrice(Request $request){

        $user=Auth::user()->id;

        $executor = ExecutorProfile::where('user_id',Auth::id())->first();
        if($request->executor_completed_task == 1){
            $task = Task::where(['id'=>$request->task_id,'executor_profile_id'=>$executor->id]);

            $task = $task->update([

                'executor_completed_task'=>1
            ]);
            if($task){
                if($request->has('executor_material_price') && $request->has('executor_work_price')){
                    if($request->executor_material_price!=null && $request->executor_work_price!=null){

                        $task_update=Task::where(['id' => $request->task_id,'executor_profile_id' => $executor->id])->update([
                            'executor_material_price' => $request->executor_material_price,
                            'executor_work_price' => $request->executor_work_price,
                            'executor_total_price' => $request->executor_material_price*1+$request->executor_work_price*1
                        ]);
                        if($task_update){

                            $task = Task::with('users','executor_profiles','executor_profiles.users')->where('id',$request->task_id)->first();
                            $task->users->notify(new NotifyEmployerExecutorCompletedTask($task));

                            $user_notification = DB::table('notifications')->where('notifiable_id',$task->users->id)->orderBy('created_at','desc')->get();
                            $database=json_decode($user_notification);
                            event(new NotificationEvent($task->users->id, $database));

                            $unread_notification_count = Auth::user()->unreadNotifications()->count();
                            event(new UnreadNotificationCountEvent($task->users->id, $unread_notification_count));


                        }

                    }
                }
            }





        }
            $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
            $inprocess = Task::with('users')->with('image_tasks')->where(['executor_profile_id'=>$executor->id,'status'=>'inprocess'])->orderBy('id','desc')->get();
            return response()->json(['tasks'=>$inprocess]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user_id=Auth::id();

        $task = Task::where(['id'=>$id,'user_id'=>$user_id])->delete();
        if($task){
            return response()->json(['message'=>'Задача удалена']);
        }else{
             return response()->json(['message'=>'Задача неудалена']);
        }

    }
}
