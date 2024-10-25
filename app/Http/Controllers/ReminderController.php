<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class ReminderController extends Controller
{
    public function sendReminder(User $agent)
    {
        // Prepare details for the email
        $details = [
            'title' => 'CPD Certificate Renewal Reminder',
        ];

        // Send email
        Mail::to($agent->email)->send(new ReminderEmail($details, $agent->name));

        return back()->with('success', 'Reminder sent successfully!');
    }
}
