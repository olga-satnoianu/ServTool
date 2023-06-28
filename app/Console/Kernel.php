<?php

namespace App\Console;

use App\Console\Commands\DomainCheckHttp;
use App\Console\Commands\DomainCheckHttps;
use App\Console\Commands\DomainCheckPing;
use App\Console\Commands\DomainCheckSsl;
use App\Console\Commands\ServerCheck22;
use App\Console\Commands\ServerCheck443;
use App\Console\Commands\ServerCheck80;
use App\Console\Commands\ServerCheckPing;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(DomainCheckHttp::class)->everyTenMinutes();
        $schedule->command(DomainCheckHttps::class)->everyTenMinutes();
        $schedule->command(DomainCheckSsl::class)->everyTenMinutes();
        $schedule->command(DomainCheckPing::class)->everyTenMinutes();
        $schedule->command(ServerCheck80::class)->everyTenMinutes();
        $schedule->command(ServerCheck443::class)->everyTenMinutes();
        $schedule->command(ServerCheck22::class)->everyTenMinutes();
        $schedule->command(ServerCheckPing::class)->everyTenMinutes();
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
