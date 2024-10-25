<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\CPDReminderEmail;

class SendFixedDateCPDReminderEmails extends Command
{
    // Define the command signature (how it's called via Artisan)
    protected $signature = 'cpd:send-fixed-date-reminders';

    // Describe what this command does
    protected $description = 'Send reminder emails on 23rd June and 24th October for CPD compliance.';

    public function construct()
    {
        parent::construct();
    }

    public function handle()
    {
        // Get today's date
        $today = Carbon::now();

        // Define the specific reminder dates (23rd June and 24th October)
        $juneReminderDate = Carbon::createFromDate($today->year, 6, 23);
        $octoberReminderDate = Carbon::createFromDate($today->year, 10, 24);

        // Check if today's date matches one of the reminder dates
        if ($today->isSameDay($juneReminderDate) || $today->isSameDay($octoberReminderDate)) {

            // Query all agents to send reminder emails
            $agents = DB::table('users')
                ->where('role', 'agent') // Assuming 'users' table holds the role info
                ->get();

            // Send the reminder emails to all agents
            foreach ($agents as $agent) {
                Mail::to($agent->email)->send(new CPDReminderEmail($agent));
                $this->info('Reminder sent to: ' . $agent->email);
            }

            $this->info('Reminder emails sent successfully for the fixed CPD dates.');
        } else {
            $this->info('No reminders to send today.');
        }
    }
}
