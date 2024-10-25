<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CPDReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;

    public function __construct($agent)
    {
        $this->agent = $agent;
    }

    public function build()
    {
        return $this->subject('CPD Compliance Reminder')
            ->markdown('emails.reminder')
            ->with([
                'agentName' => $this->agent->name, // Assuming the agent's name field is 'name'
            ]);
    }
}
