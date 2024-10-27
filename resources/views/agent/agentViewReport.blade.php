<x-appagent-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PX - Final Project</title>
    </head>

    <body>


    <div class="main-area">
        <h2>{{ $report->cpd_name }}</h2>
        <div class="detail-area">
            <section id="document-details">
                <p><strong>CPD Name:</strong> {{ $report->cpd_name }}</p>
                <p><strong>Qualification:</strong> {{ $report->qualification_name }}</p>
                <p><strong>Region:</strong> {{ $report->region }}</p> <!-- assuming a relationship exists -->
                <p><strong>CPD Type:</strong> {{ $report->cpd_type }}</p>
                <p><strong>Units:</strong> {{ $report->units }} {{ $report->cpd_unit }}</p>
                <p><strong>CPD Year:</strong> {{ $report->CPD_year }}</p>
                <p><strong>Year Completed:</strong> {{ $report->year_completed }}</p>
                <p><strong>Expiry Date:</strong> {{ $report->expiry_date }}</p>
                <p><strong>Days until Expired:</strong> {{ (int) \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($report->expiry_date)) }} Days</p>
                <p><strong>Evidence Uploaded:</strong> {{ $report->cpd_evidence }} <button type="button" onclick="window.location.href='{{ route('downloadReport', $report->cpd_evidence) }}'"> Download File </button> </p>

            </section>

            <br>

            <p>
                <button type="button" onclick="window.location.href='{{ route('agentAllCPD') }}'">Back</button>
                <button type="button" onclick="if(confirm('Are you sure you want to delete this CPD record?')) { window.location.href='{{ route('deleteReport', $report->cpd_id) }}'; }">Delete</button>
                <button type="button" onclick="window.location.href='{{ route('editReport', $report->cpd_id) }}';">Edit</button>
            </p>
        </div>

    </div>
    </body>

    </html>

</x-appagent-layout>
