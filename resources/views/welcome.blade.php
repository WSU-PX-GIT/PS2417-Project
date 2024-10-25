<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                height: 100%;
                background-color: #F5F5F5;
                color: #424242;
                font-size: 100%;
                margin: 0;
                overflow: scroll;
                font-family: 'Helvetica';
            }

            .top_bar {
                position: fixed;
                display: block;
                height: 87px;
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

            .main-area {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            nav {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 50%;
                transition: all 0.3s ease;
                gap: 2px;
            }

            nav a {
                background-color: #569186;
                padding: 10px 25px;
                text-decoration: none;
                width: 93%;
                color: #F5F5F5;
                text-align: center;
                transition: all 0.3s ease;
            }

            nav a:hover {
                text-decoration: underline;
                background-color: #478177;
            }
        </style>
    </head>
    <body>

    <div class="top_bar">

        <x-application-logo></x-application-logo>

    </div>

    <div class="main-area">
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
    </body>
</html>
