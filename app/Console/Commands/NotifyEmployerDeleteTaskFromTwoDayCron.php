<?php

namespace App\Console\Commands;

use App\Models\ClickOnTask;
use App\Models\Task;
use App\Notifications\NotifyEmployerDeleteTaskFromTwoDay;
use Illuminate\Console\Command;

class NotifyEmployerDeleteTaskFromTwoDayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notclickfromtwodays:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // через 2 дня предупреждаем заказчику о том, что задание будет удалено, если нет откликов

       $time= date_default_timezone_set('Europe/Moscow');
       info($time);
        $now_time=date('Y-m-d H:i:s',strtotime('now'));


        $auth_task=Task::where('status',false)->pluck('id');

        $click_on_task=ClickOnTask::whereIn('task_id',$auth_task)->pluck('task_id');
       

        $task = Task::where('status','=','false')
                ->where(function ($query)  use($click_on_task) {
                    $query->whereNotIn('id', $click_on_task);

                })->get();

        info($task);
                foreach($task as $item){
                    $task_date=$item->created_at;

                    $task_date = date('Y-m-d H:i:s', strtotime($task_date . '+2 day'));
                info(strtotime($task_date . '+2 day'));

                    if($task_date<$now_time){
                        info($item);

                        $item->users->notify(new NotifyEmployerDeleteTaskFromTwoDay($item));

                    }
                }


        // \Log::info("ggggg");

    }
}
