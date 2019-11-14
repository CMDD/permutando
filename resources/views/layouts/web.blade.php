<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Permutado</title>
        <link
            rel="stylesheet"
            href="css/bootstrap.min.css"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            href="css/main.css"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            href="css/buscador.css"
            type="text/css"
            media="all"
        />
        @stack('styles')
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/slick.css" />
    </head>

    <body>
        <div id="app">
            <!--<div class="map"></div>-->
           
            @include('partials.nav')

            {{-- @include('partials.registro') --}}

            <!-- @if(Auth::user())
                <div class="container-fluid">
                    <web-index></web-index>
                </div>

            @else
                
            @endif -->
            @yield('content') @include('layouts.footer')
        </div>

        {{-- <script
            type="text/javascript"
            src="https://code.jquery.com/jquery-3.3.1.min.js"
        ></script> --}}
        <script src="js/app-2.js"></script>
        <script
            type="text/javascript"
            src="js/bootstrap.bundle.min.js"
        ></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script src="wizard/js/jquery.backstretch.min.js"></script>
        <script src="wizard/js/scripts.js"></script>

        <script
            async
            defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQW6mlbcn4P312vnTaZNdknL0O1JRwdvA"
        ></script>
       

        <script src="/js/slick.min.js"></script>
        <script>
            $(".slide").slick({
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                accessibility: false
            });
        </script>
       
    </body>
</html>
