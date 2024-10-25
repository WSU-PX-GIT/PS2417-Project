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

            <th>Region</th>
            <th>Qualification</th>

        </tr>

            <tr>
                <td><a href="{{ route('adminViewCPD') }}">

                    </a></td>
                <td>{{ $reports->region }}</td>
                <td>{{ $reports->qualification_name }}</td>

            </tr>

    </table>
</div>
</body>
</html>

</x-appadmin-layout>
