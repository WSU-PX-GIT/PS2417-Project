<x-appadmin-layout>
<div class="main-area">
{{--    <x-slot name="header">--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Registration') }}
        </h2>
{{--    </x-slot>--}}
    <br>
    <form action="{{ route('user.search') }}" method="GET" class="search_bar">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>
    </form>

    <br>
    <h3>
        {{ __('Or create Administrator user') }}
    </h3>
    <button><x-nav-link :href="route('admincreate')" :active="request()->routeIs('admincreate')">
        {{ __('Create Admin') }}
    </x-nav-link></button>
</div>
</x-appadmin-layout>
