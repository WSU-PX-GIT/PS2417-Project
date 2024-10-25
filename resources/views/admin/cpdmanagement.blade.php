<x-appadmin-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PX - Final Project</title>
</head>
<body>
<div class="main-area" id="main-area">
    <h2>CPD Management</h2>
    <button type="button" onclick="window.location.href='{{ route('adminAddCPD') }}';">Add New CPD</button>
    <br><br>
    <table id="cpd_list">
        <tr>

            <th>Qualification</th>
            <th>Region</th>
            <th>CPD Unit</th>
            <th>Expiry Renewal Date</th>
            <th>Retention Period</th>
            <th>Last Updated</th>

        </tr>
                @if (count($reports) > 0)
                        @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->qualification_name}}</td>
                        <td>{{ $report->state_or_territory}}</td>
                        <td>{{ $report->CPD_unit}}</td>
                        <td>{{ $report->expiry_renewal_date}}</td>
                        <td>{{ $report->retention_period}}</td>
                        <td>{{ $report->last_updated }}</td>

                    </tr>
                        @endforeach
                @else
                    <p>No results found.</p>
                @endif

    </table>
</div>
</body>
</html>

</x-appadmin-layout>
