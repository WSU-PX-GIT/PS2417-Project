<x-appagent-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agent Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome, Agent User!") }}
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Agent Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-appagent-layout>
