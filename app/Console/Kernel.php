<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DeadlineCron::class,
        Commands\NewJobCron::class,
        Commands\DeleteNotAppliedTaskCron::class,
        Commands\ReturnedMoneyExecutorCron::class,
        Commands\NotifyEmployerDeleteTaskFromTwoDayCron::class,
        Commands\NotifyEmployerDeleteTaskFromThreeDayCron::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('deadline:cron')->everyMinute();
        $schedule->command('newjob:cron')->dailyAt('08:00');
        $schedule->command('deletenotappliedtask:cron')->everyMinute();
        $schedule->command('returnedmoney:cron')->dailyAt('08:00');
        $schedule->command('notclickfromtwodays:cron')->dailyAt('09:29');
        $schedule->command('notclickfromthreedays:cron')->dailyAt('08:00');


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
