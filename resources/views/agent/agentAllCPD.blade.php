<x-appagent-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PX - Final Project</title>
</head>

<body>


<div class="main-area" id="main-area">

    <h2>All CPD Records</h2>


    <button type="button" onclick="window.location.href='{{ route('agentAddReport') }}';">Add New CPD Record</button>
    <br><br>


    <table id="cpd_list">
        <tr>
            <th>Name</th>
            <th>Region</th>
            <th>Qualification</th>
            <th>Year Completed</th>
            <th>Last Updated</th>

        </tr>

        @foreach ($reports as $report)
        <tr>
            <td><a href="{{ route('agentViewReport', ['cpd_id' => $report->cpd_id]) }}">
                    {{ $report->cpd_name }}
                </a></td>
            <td>{{ $report->region }}</td>
            <td>{{ $report->qualification_name }}</td>
            <td>{{ $report->year_completed }}</td>
            <td>{{ $report->last_updated }}</td>

        </tr>
        @endforeach

    </table>

</div>

</body>

</html>

</x-appagent-layout>
