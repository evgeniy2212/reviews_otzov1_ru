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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('congratulation:new_year')->cron('0 2 1 1 *')->timezone('America/New_York');
        $schedule->command('congratulation:new_year')->cron('00 12 01 11 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->hourly()->timezone('Europe/Kiev');
        $schedule->command('congratulation:christmas')->cron('0 2 25 12 *')->timezone('America/New_York');
        $schedule->command('congratulation:independance')->cron('0 2 3 6 *')->timezone('America/New_York');
        $schedule->command('congratulation:labor')->cron('0 2 7 9 *')->timezone('America/New_York');
        $schedule->command('congratulation:martin_luther_king')->cron('0 2 20 1 *')->timezone('America/New_York');
        $schedule->command('congratulation:memorial')->cron('0 2 25 5 *')->timezone('America/New_York');
        $schedule->command('congratulation:thanksgiving')->cron('0 2 26 11 *')->timezone('America/New_York');
        $schedule->command('congratulation:veterans')->cron('0 2 11 11 *')->timezone('America/New_York');
        $schedule->command('congratulation:remind')->daily()->timezone('America/New_York');
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
