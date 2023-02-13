<?php

namespace App\Console\Commands;

use App\Models\ExecutorCategory;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Models\User;
use App\Notifications\NotifyExecutorForNewJob;
use Illuminate\Console\Command;

class NewJobCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newjob:cron';

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
        date_default_timezone_set('Europe/Moscow');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;

       $deadlineday = date('Y-m-d',strtotime('-1 day'));

       $check_categories = Task::where('created_at','>=',$deadlineday)->pluck('category_name');

        $executor_categories = ExecutorCategory::whereIn('category_name',$check_categories)->pluck('executor_profile_id');
        // $match_executor = [];
        $user_ides=ExecutorProfile::whereIn('id', $executor_categories)->pluck('user_id');


        $user=User::whereIn('id',$user_ides)->get();
        foreach($user as $item){
            $check_executor_categories=$item->executor_profiles->executor_categories->pluck('category_name');
            $data= Task::where('created_at','>=',$deadlineday)->whereIn('category_name', $check_executor_categories)->get();

            // \Log::info($data);
            $item->notify(new NotifyExecutorForNewJob($data));
            // \Log::info( $user_ides);

        }
        \Log::info( $user_ides);


    }
}
