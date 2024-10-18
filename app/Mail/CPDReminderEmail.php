<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CPDReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $renewalDate;

    public function __construct($agent, $renewalDate)
    {
        $this->agent = $agent;
        $this->renewalDate = $renewalDate;
    }

    public function build()
    {
        return $this->markdown('emails.cpd_fixed_date_reminder')
            ->subject('Reminder: Your CPD Renewal is Due Soon')
            ->with([
                'agentName' => $this->agent->name,
                'renewalDate' => $this->renewalDate->format('F d, Y'),
            ]);
    }
}
