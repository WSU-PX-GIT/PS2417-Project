<x-appagent-layout>
<body>

    <div class="main-area" id="main-area">

        <h2>Action Required</h2>

        <br>

        <table id="cpd_list">
            <tr>
                <th>CPD Name</th>
                <th>Region</th>
                <th>Qualification</th>
                <th>Expiry</th>
                <th>Days until Expired</th>

            </tr>

            @foreach ($reports as $report)
                @php
                    $daysLeft = floor(\Carbon\Carbon::now()->diffInDays($report->expiry_date, false));
                @endphp

                @if($daysLeft > 0 && $daysLeft <= 30)

                <tr>
                    <td>{{ $report->cpd_name }}</td>
                    <td>{{ $report->region }}</td>
                    <td>{{ $report->qualification_name }}</td>
                    <td>{{ $report->expiry_date }}</td>
                    <td>{{ $daysLeft }}</td>>

                </tr>
                @endif

            @endforeach


        </table>

    </div>

    </body>
</x-appagent-layout>
