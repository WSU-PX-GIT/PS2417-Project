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
                    {{ __('Agent Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('agentaddReport')" :active="request()->routeIs('agentaddReport')">
                    {{ __('Add Report') }}
                </x-nav-link>
                <a href="ActionRequired_page.html">Action Required</a>
            </div>
            <div>
                <a href="non_compliant_page.html">Non-Compliant</a>
                <a href="reporting_page.html">Reporting</a>
            </div>
            <div>
                <a href="CPD_management_page.php">CPD Management</a>
                <a href="VersionUpdates_page.html">Version Updates</a>
            </div>
        </div>
        <div id="mainarea" class="main-area">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
