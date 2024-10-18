<x-appagent-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PX - Final Project</title>

</head>

<body>

    <div class="main-area">
        <h2>Add CPD Record</h2>
        <form method="POST" action="{{url('report_added')}}" enctype="multipart/form-data">
            @csrf

            <p>
                <label for="CPD_name">CPD Activity: </label>
                <input type="text" id="CPD_name" name="CPD_name">
            </p>

            <p>
                <label for="Qualification">Qualification: </label>
                <select id="Qualification" name="Qualification">
                    <option value=""></option>
                    @foreach ($qualifications as $qualification)
                        <option value="{{ $qualification->qualification_id }}">{{ $qualification->truncated_name }}</option>
                    @endforeach
                </select>
            </p>

            <p>
                <label for="cpd_type">CPD Type: </label>
                <input type="radio" id="Compulsory" name="cpd_type" value="Compulsory">
                <label for="Compulsory">Compulsory</label>
                <input type="radio" id="Elective" name="cpd_type" value="Elective">
                <label for="Elective">Elective</label><br>
            </p>

            <p>
                <label for="units">Number of Units: </label>
                <input type="number" id="units" name="units">
            </p>

            <p>
                <label for="CPD_evidence">Upload CPD completion Evidence:</label>
                <input type="file" id="CPD_evidence" name="CPD_evidence">
            </p>

            <p>
                <label for="CPD_year">CPD Year: </label>
                <input type="number" id="CPD_year" name="CPD_year" minlength="4" maxlength="4">
            </p>

            <p>
                <label for="year_completed">Year Completed: </label>
                <input type="number" id="year_completed" name="year_completed" minlength="4" maxlength="4">
            </p>

            <p>
                <button type="button" onclick="window.location.href='{{ route('agentAllCPD') }}'">Cancel</button>
                <input type="submit" value="Enter">
            </p>
    </form>
</div>
</body>


</html>
</x-appagent-layout>
