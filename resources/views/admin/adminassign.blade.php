<x-appadmin-layout>
<div class="main-area">
{{--    <x-slot name="header">--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Registration') }}
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
    <form action="{{ route('admin.search') }}" method="GET" class="search_bar">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>
    </form>

    <br>
    <h3>
        {{ __('Or create Administrator user:') }}
    </h3>
    <button type="button" onclick="window.location.href='{{ route('admincreate') }}'">Create Admin</button>

</div>
</x-appadmin-layout>
