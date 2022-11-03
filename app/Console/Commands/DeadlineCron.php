<?php

namespace App\Console\Commands;

use App\Models\ClickOnTask;
use App\Models\ExecutorProfile;
use App\Models\User;
// use Illuminate\Notifications\Notification;
use App\Notifications\NotifyExecutorForDeadline;
use Carbon\Carbon;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Auth;

class DeadlineCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deadline:cron';

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
        $click_on_task = ClickOnTask::where(['deadline_notify_status'=>0,'status'=>'inprocess'])->get();

        $deadlineday = date('Y-m-d',strtotime('+1 day'));

        foreach($click_on_task as $items){
            if($deadlineday == $items->start_date_to){
                  $executor = ExecutorProfile::where('id',$items->executor_profile_id )->first();
                  $executor->users->notify(new NotifyExecutorForDeadline($items));
                    $items->update([
                        'deadline_notify_status' => 1
                    ]);
            }
        }

            // \Log::info( '-------' );
            // php -d register_argc_argv=On /home1/nveram/api.nver.am/artisan deadline:cron 1>> /dev/null 2>&1

    }
}
