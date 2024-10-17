<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl ml-auto mr-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        <div id="sideNav" class="side_nav">
            <div>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Admin Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('adminassign')" :active="request()->routeIs('adminassign')">
                    {{ __('Create/Assign Admin') }}
                </x-nav-link>
                <x-nav-link :href="route('adminAddCPD')" :active="request()->routeIs('adminAddCPD')">
                    {{ __('Create New CPD') }}
                </x-nav-link>
            </div>

            <div>
                <x-nav-link :href="route('adminViewCPD')" :active="request()->routeIs('adminViewCPD')">
                    {{ __('View CPD') }}
                </x-nav-link>
                <x-nav-link :href="route('adminEditCPD')" :active="request()->routeIs('adminEditCPD')">
                    {{ __('Edit CPD') }}
                </x-nav-link>
                <x-nav-link :href="route('adminDeleteCPD')" :active="request()->routeIs('adminDeleteCPD')">
                    {{ __('Delete CPD') }}
                </x-nav-link>

            </div>
        </div>
        <div id="mainarea" class="main-area">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
