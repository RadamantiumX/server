<?php

namespace App\Console;

use App\Models\Analytic;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    //protected $commands =[Commands\TestTask::class];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Analytic::where('updated_at', '<', Carbon::now()->subDays(7))->delete();
        })->weekly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
