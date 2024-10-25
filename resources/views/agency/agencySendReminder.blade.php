<x-appagency-layout>
    <body>

    <div class="main-area" id="main-area">

        <h2>Agent Reminder</h2>

        <br>

        <table id="cpd_list">
            <tr>
                <th>Agent ID</th>
                <th>Name</th>
                <th>CPD Name</th>
                <th>Expiry</th>
                <th>Reminder</th>

            </tr>

            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->user_id }}</td>
                    <td>{{ $report->user_name }}</td>
                    <td>{{ $report->cpd_name }}</td>
                    <td>{{ $report->expiry_date }}</td>
                    <td><button>Send Reminder</button></td>
                </tr>
            @endforeach


        </table>

    </div>

    </body>
</x-appagency-layout>
