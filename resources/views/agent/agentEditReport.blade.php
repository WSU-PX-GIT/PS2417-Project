<x-appagent-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PX - Final Project</title>
    </head>

    <body>

    <div class="main-area">
        <h2>Edit CPD Record</h2>
        <form method="POST" action="{{ route('updateReport', $report->cpd_id) }}" enctype="multipart/form-data">
            @csrf

            <p>
                <label for="CPD_name">CPD Activity: </label>
                <input type="text" id="CPD_name" name="CPD_name" value="{{ $report->cpd_name }}">
            </p>

            <p>
                <label for="Qualification">Qualification: </label>
                <select id="Qualification" name="Qualification">
                    <option value=""></option>
                    @foreach ($qualifications as $qualification)
                        <option value="{{ $qualification->qualification_id }}" {{ $qualification->qualification_id == $report->qualification_id ? 'selected' : '' }}>{{ $qualification->truncated_name }}</option>
                    @endforeach
                </select>
            </p>

            <p>
                <label for="Qualification_category">Qualification Category: </label>
                <input type="text" id="Qualification_category" name="Qualification_category">
            </p>

            <p>
                <label for="cpd_type">CPD Type: </label>
                <input type="radio" id="Compulsory" name="cpd_type" value="Compulsory" {{ $report->cpd_type == 'Compulsory' ? 'checked' : '' }}>
                <label for="Compulsory">Compulsory</label>
                <input type="radio" id="Elective" name="cpd_type" value="Elective" {{ $report->cpd_type == 'Elective' ? 'checked' : '' }}>
                <label for="Elective">Elective</label><br>
            </p>

            <p>
                <label for="units">Number of Units: </label>
                <input type="number" id="units" name="units" value="{{ $report->units }}">
            </p>

            <p>
                <label for="CPD_evidence">Upload CPD completion Evidence:</label>
                <input type="file" id="CPD_evidence" name="CPD_evidence">
            </p>

            <p>
                <label for="CPD_year">CPD Year: </label>
                <input type="number" id="CPD_year" name="CPD_year" value="{{ $report->CPD_year }}">
            </p>

            <p>
                <label for="year_completed">Year Completed: </label>
                <input type="number" id="year_completed" name="year_completed" value="{{ $report->year_completed }}">
            </p>

            <p>
                <button type="button" onclick="window.location.href='{{ url('agentAllCPD') }}';">Cancel</button>
                <input type="submit" value="Update">
            </p>
        </form>
    </div>

    </body>

    </html>

</x-appagent-layout>
