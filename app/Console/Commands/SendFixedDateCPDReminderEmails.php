<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\CPDReminderEmail;

class SendFixedDateCPDReminderEmails extends Command
{
    protected $signature = 'cpd:send-fixed-date-reminders';
    protected $description = 'Send reminder emails for fixed-date CPD renewals on June 30th and October 31st, 7 days before those dates.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get today's date
        $today = Carbon::now();

        // Define the specific reminder dates (23rd June and 24th October)
        $juneReminderDate = Carbon::createFromDate($today->year, 6, 23);
        $todaytest = Carbon::createFromDate($today->year, 10, 18);
        $octoberReminderDate = Carbon::createFromDate($today->year, 10, 24);

        // Check if today's date matches one of the reminder dates
        if ($today->isSameDay($juneReminderDate) || $today->isSameDay($octoberReminderDate) || $today->isSameDay($todaytest)) {
            // Define the relevant renewal dates
            $renewalDate = $today->isSameDay($juneReminderDate) ? Carbon::createFromDate($today->year, 6, 30) : Carbon::createFromDate($today->year, 10, 31);

            // Query agents whose CPD renewal date is fixed on 30th June or 31st October
            $agents = DB::table('CPDReport')
                ->join('users', 'CPDReport.user_id', '=', 'users.id') // Assuming 'users' table holds user info
                ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
                ->whereIn('QualificationsDetails.expiry_renewal_date', [$renewalDate])
                ->get();

            // Send the reminder emails to all agents with the relevant expiry date
            foreach ($agents as $agent) {
                Mail::to($agent->email)->send(new CPDReminderEmail($agent, $renewalDate));
            }

            $this->info('Reminder emails sent successfully for fixed CPD dates.');
        } else {
            $this->info('No reminders to send today.');
        }
    }
}
