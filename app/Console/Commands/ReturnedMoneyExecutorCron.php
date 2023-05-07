<?php

namespace App\Console\Commands;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\Subcategory;
use App\Notifications\ReturnedMoneyExecutorTwoDay;
use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Log;
use IlluminateSupportFacadesLog;

class ReturnedMoneyExecutorCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'returnedmoney:cron';

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

        date_default_timezone_set('Europe/Moscow');
        $now_time = date('Y-m-d H:i:s',strtotime('now'));
        // dd($now_time);
       \Log::info("ggggg");
        $click_on_task = ClickOnTask::where('status','false')->get();
            foreach($click_on_task as $item){
                $task_date = $item->created_at;

                $task_date = date('Y-m-d H:i:s', strtotime($task_date . '+2 day'));

                if($task_date<$now_time){

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

                        $find_click->status = 'returned_money';
                        $find_click->save();

                }
            }


    }
}
