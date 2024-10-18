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
{{--    <link rel="stylesheet" type="text/css" href="style.css">--}}
    <style>
        body {
            height: 100%;
            background-color: #F5F5F5;
            color: #424242;
            font-size: 100%;
            margin: 0;
            overflow: scroll;
        }
        .top_bar {
            position: fixed;
            display: block;
            justify-content: space-between;
            align-items: center;
            height: 75px;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;

            background-color: white;
            box-shadow: 0px 2px 10px;
            padding: 0;
            margin: 0;
        }

        .side_nav {
            min-height: 100%;
            width: 200px;
            position: fixed;

            z-index: 999;
            top: 75px;
            left: 0;
            bottom: 0;
            background-color: #569186;
            overflow-x: hidden;
            overflow-y: auto;
            padding-top: 20px;
        }

        p {
            padding: 5px;
            padding-left: 25px;
            padding-right: 25px;
        }

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

        .side_nav a {
            padding-left: 25px;
            padding-top: 5px;
            padding-bottom: 5px;

            text-decoration: none;
            font-size: 100%;
            color: white;
            display: block;
            transition: all 0.3s ease;

        }

        .side_nav a:hover {
            color: #f1f1f1;
            text-decoration: underline;
            background-color: #478177;
        }

        .nav_button {
            border: none;
            display: none;
        }

        h1 {
            text-align: left;
            color: black;
        }

        h2 {
            color: #569186;
            font-weight: bold;
            font-size:25px;
        }

        a {
            color: #569186;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .main-area {
            position: relative;
            left: 100px;
            top: 10px;
            background-color: white;
            box-shadow: 0px 0px 10px;
            padding: 20px;
            /*padding-top: 5px;*/
            box-sizing: border-box;
            width: calc(100% - 100px);
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
            border: none;
        }

        input[type=submit],
        button {
            padding: 10px 15px 10px 15px;
            width: auto;
            background-color: #569186;
            color: #ffffff;
        }
        button:hover {
            color: #f1f1f1;
            background-color: #478177;
        }

        input {
            text-align: left;
        }

        table {
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
            width: 20%;
            display: inline-block;
        }

        .search_bar {
            width: 100%;
            gap: 5px;
            display: flex;
        }

        </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
{{--    @isset($header)--}}
{{--        <header class="bg-white shadow">--}}
{{--            <div class="max-w-7xl ml-auto mr-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}
{{--    @endisset--}}

    <!-- Page Content -->
    <main>

        <div class="top_bar">
            @include('layouts.navigation')
        </div>
        <div id="sideNav" class="side_nav">
            <div>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Agency Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('agencyassign')" :active="request()->routeIs('agencyassign')">
                    {{ __('Create/Assign Agency') }}
                </x-nav-link>
                <a href="ActionRequired_page.html">Action Required</a>
            </div>
            <div>
                <a href="non_compliant_page.html">Non-Compliant</a>
                <a href="reporting_page.html">Reporting</a>
            </div>
        </div>
        <div id="main-area" class="main-area">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
