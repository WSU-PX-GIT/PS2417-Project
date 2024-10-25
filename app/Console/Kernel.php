<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Registering the new SendFixedDateCPDReminderEmails command
    protected $commands = [
        \App\Console\Commands\SendFixedDateCPDReminderEmails::class, // The new command for fixed dates
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule reminders for the fixed dates: 23rd June and 24th October
        $schedule->command('cpd:send-fixed-date-reminders')
            ->yearlyOn(6, 23, '00:00')
            ->timezone('Australia/Sydney'); // Adjust the timezone as necessary

        $schedule->command('cpd:send-fixed-date-reminders')
            ->yearlyOn(10, 24, '00:00')
            ->timezone('Australia/Sydney');
    }

    protected function commands()
    {
        $this->load(DIR.'/Commands'); // Ensures all commands in the directory are loaded
        require base_path('routes/console.php'); // Load the routes for console commands
    }
}
