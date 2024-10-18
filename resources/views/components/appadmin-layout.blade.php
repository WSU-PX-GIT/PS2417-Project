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
            <style>
                .side_nav {
                    min-height: 100%;
                    width: 200px;
                    position: fixed;

                    z-index: 1000;
                    top: 75px;
                    left: 0;
                    bottom: 0;
                    background-color: #569186;
                    overflow-x: hidden;
                    overflow-y: auto;
                    padding-top: 20px;
                }

                .main-area {
                    position: relative;
                    left: 100px;
                    top: 0px;
                    /*background-color: white;*/
                    /*box-shadow: 0px 0px 10px;*/
                    padding: 20px;
                    padding-top: 5px;
                    box-sizing: border-box;
                    width: calc(100% - 125px);
                    height: 100%;
                }

                .main-area h2 {
                    background-color: #F5F5F5;
                    color: black;
                    padding: 5px;
                    text-align: center;
                }

                .main-area p {
                    color: black;
                }

                form {
                    top: 25px;
                }

                label {
                    width: 30%;
                    display: inline-block;
                }

                input[type=text],
                select,
                textarea {
                    width: 100%;
                    padding: 10px;
                }

                input[type=text]:focus,
                select:focus,
                textarea {
                    background-color: #ccdad7;
                }

                input[type=submit],
                button {
                    padding: 10px 15px 10px 15px;
                    width: auto;
                    background-color: #569186;
                    color: #ffffff;
                }

                input {
                    text-align: left;
                }

                table {
                    /* font-family: Arial, Helvetica, sans-serif; */
                    border-collapse: collapse;
                    width: 100%;
                }

                table td,
                table th {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                table tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                table tr:hover {
                    background-color: #e7e7e7;
                }

                table th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #a7a7a7;
                    color: white;
                }

                #document-details {
                    display: flex;
                    flex-direction: column;
                }

                #document-details p {
                    display: flex;
                    justify-content: flex-start;
                }

                #document-details p strong {
                    width: 15%;
                    display: inline-block;
                }
            </style>
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
