<x-appagency-layout>
    <div class="main-area">
{{--    <x-slot name="header">--}}
        <h2>
            {{ __('Agency Registration') }}
        </h2>
{{--    </x-slot>--}}
        <br>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    <form action="{{ route('agency.search') }}" method="GET" class="search_bar">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>

    </form>
        <br>
    <h3>
        {{ __('Or create Agency user:') }}
    </h3>
        <button type="button" onclick="window.location.href='{{ route('agencycreate') }}'">Create Agency User</button>
    </div>
</x-appagency-layout>
