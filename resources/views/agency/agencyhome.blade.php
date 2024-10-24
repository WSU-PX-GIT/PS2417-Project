<x-appagency-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agency Dashboard') }}
        </h2>
    </x-slot>

    <div class="main-area">

        {{--    <x-slot name="header">--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agency Dashboard') }}
        </h2>
        <br>
        {{ __("Welcome, Agency User!") }}

    </div>
</x-appagency-layout>
