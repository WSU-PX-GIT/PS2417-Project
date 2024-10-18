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






        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="top_bar">
                @include('layouts.navigation')
            </div>
            <!-- Page Heading -->
{{--            @isset($header)--}}
{{--                <header class="top_bar">--}}
{{--                    <div class="max-w-7xl ml-auto mr-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endisset--}}

            <!-- Page Content -->
            <main>
                <div id="sideNav" class="side_nav">
                    <div>
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                </div>
                <div id="main-area" class="main-area">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
