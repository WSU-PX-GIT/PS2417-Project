<x-appadmin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Registration') }}
        </h2>
    </x-slot>
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>

    </form>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight ml-5 content-center">
        {{ __('Or create Administrator user') }}
    </h3>
    <button><x-nav-link :href="route('admincreate')" :active="request()->routeIs('admincreate')">
        {{ __('Create Admin') }}
    </x-nav-link></button>
</x-appadmin-layout>
