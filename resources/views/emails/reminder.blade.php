@component('mail::message')
    # CPD Compliance Reminder

    Dear {{ $agentName }},

    This is a friendly reminder to check and update your records in our system.

    Please log in to review your current status and ensure all required tasks are completed before the upcoming deadlines.

    If you have any questions or need assistance, feel free to contact us at [support@cpdtracking.com](mailto:support@cpdtracking.com).

    Best regards,
    The CPDTracking Team
@endcomponent
