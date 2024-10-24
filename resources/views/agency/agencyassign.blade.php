<x-appagency-layout>
    <div class="main-area">
{{--    <x-slot name="header">--}}
        <h2>
            {{ __('Agency Registration') }}
        </h2>
{{--    </x-slot>--}}
        <br>
    <form action="{{ route('user.search') }}" method="GET" class="search_bar">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>

    </form>
        <br>
    <h3>
        {{ __('Or create Agency user') }}
    </h3>
    <button><x-nav-link :href="route('agencycreate')" :active="request()->routeIs('agencycreate')">
            {{ __('Create Agency') }}
        </x-nav-link></button>
    </div>
</x-appagency-layout>
