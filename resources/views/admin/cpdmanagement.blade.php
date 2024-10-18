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
            <th>Qualification Classes</th>
            <th>CPD Unit</th>
            <th>Expiry Renewal Date</th>

        </tr>

            <tr>
                @if (count($reports) > 0)
                    <ul>
                        @foreach ($reports as $report)
                            <li>{{ $report->qualification_name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No results found.</p>
                @endif

            </tr>

    </table>
</div>
</body>
</html>

</x-appadmin-layout>
