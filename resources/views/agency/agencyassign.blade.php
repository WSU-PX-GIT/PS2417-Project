<x-appagency-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agency Registration') }}
        </h2>
    </x-slot>
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="search" placeholder="Search Users">
        <button type="submit">Search</button>
        @if (count($results) > 0)
            <ul>
                @foreach ($results as $result)
                    <li>{{ $result->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    </form>
</x-appagency-layout>
