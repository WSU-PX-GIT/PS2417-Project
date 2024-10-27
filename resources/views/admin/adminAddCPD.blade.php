<x-appadmin-layout>
    <body>
    <div class="main-area">
        <h2>Add CPD</h2>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('addCPD') }}" >
            @csrf
            <p>
                <label for="qualification_name">Qualification Name: </label>
                <input type="text" id="qualification_name" name="qualification_name">
            </p>
            <p>
                <label for="state_or_territory">State or Territory: </label>
                <input type="text" id="state_or_territory" name="state_or_territory">
            </p>

            <p>
                <label for="state_abbreviation">State Abbreviation: </label>
                <input type="text" id="state_abbreviation" name="state_abbreviation">
            </p>

            <p>
                <label for="truncated_name">Truncated Name: </label>
                <input type="text" id="truncated_name" name="truncated_name">
            </p>

            <p>
                <label for="CPD_unit">CPD Unit: </label>
                <input type="text" id="CPD_unit" name="CPD_unit">
            </p>

            <p>
                <label for="expiry_renewal_date">Expiry Renewal Date: </label>
                <input type="date" id="expiry_renewal_date" name="expiry_renewal_date">
            </p>

            <p>
                <label for="retention_period">Retention Period: </label>
                <input type="number" id="retention_period" name="retention_period"> Years
            </p>

            <p>
                <button type="button" onclick="window.location.href='{{route('adminViewCPD')}}';">Cancel</button>

                <input type="submit" value="Enter">
            </p>
        </form>

    </div>

    </body>



</x-appadmin-layout>
