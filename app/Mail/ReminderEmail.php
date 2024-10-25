<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $agentName;

    /**
     * Create a new message instance.
     *
     * @param array $details
     * @param string $agentName
     */
    public function __construct($details, $agentName)
    {
        $this->details = $details;
        $this->agentName = $agentName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->details['title'])
            ->markdown('emails.reminder')
            ->with([
                'agentName' => $this->agentName
            ]);
    }
}
