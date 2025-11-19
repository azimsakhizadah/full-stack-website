<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f8fafc;
            }
            .container {
                text-align: center;
                margin-top: 100px;
            }
            h1 {
                font-size: 50px;
                font-weight: 700;
                margin-bottom: 20px;
            }
            p {
                font-size: 18px;
                color: #555;
            }
            a {
                color: #6366f1;
                text-decoration: none;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <h1>Laravel</h1>
            <p>You have successfully installed Laravel.</p>

            @if (Route::has('login'))
                <div style="margin-top: 30px;">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a style="margin-left: 10px;" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
