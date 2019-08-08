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

        <link rel="stylesheet" href="/css/app.css" />
    </head>

    <body>
        <div id="app">
            <div class="map"></div>

            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand mx-3" href="#">Permutado</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    id="navbarSupportedContent"
                    class="collapse navbar-collapse justify-content-end"
                >
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/perfil-publicar">Tengo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Partner y servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                        @if(Auth::user())
                            <li class="nav-item dropdown">
                                <input type="hidden" id="userId" value="{{Auth::User()->id}}">
                                <button type="button" class="btn nav-link mx-3 dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::User()->name}}</button>
                                <div class="dropdown-menu dropdown-menu-right mx-3" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/perfil-mis-publicaciones">Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Cerrar sesión</a>
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <button type="button" class="btn nav-link mx-3" data-toggle="modal" data-target="#loginModal">Iniciar sesión</button>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            @include('partials.registro')

            <div class="container-fluid">
                <web-index></web-index>
            </div>
        </div>

        <script
            type="text/javascript"
            src="https://code.jquery.com/jquery-3.3.1.min.js"
        ></script>
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
        <script src="js/app.js"></script>

        <script></script>
    </body>
</html>
