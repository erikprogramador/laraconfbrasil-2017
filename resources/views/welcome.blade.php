<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel e seu ecossistema
                </div>

                <div class="online links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://envoyer.io/">Envoyer</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <div class="offline links">
                    <a href="{{ asset('images/docs.png') }}" target="_blank">Documentation</a>
                    <a href="{{ asset('images/laracasts.png') }}" target="_blank">Laracasts</a>
                    <a href="{{ asset('images/laravel-news.png') }}" target="_blank">News</a>
                    <a href="{{ asset('images/forge.png') }}" target="_blank">Forge</a>
                    <a href="{{ asset('images/envoyer.png') }}" target="_blank">Envoyer</a>
                    <a href="{{ asset('images/github.png') }}" target="_blank">GitHub</a>
                </div>
            </div>
        </div>

        <script>
            if (! navigator.onLine) {
                document.querySelector('.online').style.display = 'none';
                document.querySelector('.offline').style.display = 'inline-block';
            }
            if (navigator.onLine) {
                document.querySelector('.offline').style.display = 'none';
            }
        </script>
    </body>
</html>
