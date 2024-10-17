<x-appagent-layout>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PX - Final Project</title>

</head>

<body>
    <div class="main-area">
        <h2>Add CPD</h2>
        <form method="POST" action="" >
            @csrf

            <p>
                <label for="CPD_name">CPD Activity: </label>
                <input type="text" id="CPD_name" name="CPD_name">
            </p>

            <p>
                <input type="submit" value="Enter">
            </p>
    </form>
</div>
</body>


</html>
</x-appagent-layout>
