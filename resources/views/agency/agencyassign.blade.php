<x-appagency-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agency Registration') }}
        </h2>
    </x-slot>
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>

    </form>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight ml-5 content-center">
        {{ __('Or create Agency user') }}
    </h3>
    <button><x-nav-link :href="route('agencycreate')" :active="request()->routeIs('agencycreate')">
            {{ __('Create Agency') }}
        </x-nav-link></button>
</x-appagency-layout>
