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
            </section>
            <br>

            <button type="button" onclick="window.location.href='{{ route('agentAllCPD') }}'">Back</button>
            <br>

            <form method="POST" action="{{ url('deleteReport', $report->cpd_id) }}" onsubmit="return confirm('Are you sure you want to delete this CPD record?');">
                @csrf
                <button type="submit" name="delete">Delete</button>
            </form>

            <br>
            <button type="button" onclick="window.location.href='{{ route('editReport, $report->cpd_id') }}';">Edit</button>

{{--            <form method="POST" action="{{ url('agentEditReport') }}">--}}
{{--                @csrf--}}
{{--                <button type="submit" name="edit">Edit</button>--}}
{{--            </form>--}}
        </div>

    </div>
    </body>

    </html>

</x-appagent-layout>