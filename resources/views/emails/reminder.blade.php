@component('mail::message')
{{--    CPD Compliance Reminder--}}
    Dear {{ $agentName }},

    This is a friendly reminder to check and update your records in our system.

    Please log in to review your current status and ensure all required tasks are completed before the upcoming deadlines.

    If you have any questions or need assistance, feel free to contact us at [support@cpdtracking.com].

    Best regards,<br>
    The CPDTracking Team

    @component('mail::button', ['url' => 'https://cpdtracking.com/login'])
        Log In to Your Account
    @endcomponent

    For assistance, contact [support@cpdtracking.com].
@endcomponent
