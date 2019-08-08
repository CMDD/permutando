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
        <link rel="stylesheet" href="/css/slick.css" />
    </head>

    <body>
        <div id="app">

            <!--<div class="map"></div>-->

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

            @if(Auth::user())
                <div class="container-fluid">
                    <web-index></web-index>
                </div>
            @else
                <div class="container-fluid home">
                    <div class="row">
                        <div class="col p-0">
                            <div class="slide">
                                <div style="background-image:url('/img/img-slide-01.jpg');">
                                    <div class="box">
                                        <h2>El momento de hacer tu primer negocio</h2>
                                        <a class="btn" href="#">Más información</a>
                                    </div>
                                </div>
                                <div style="background-image:url('/img/img-slide-01.jpg');">
                                    <div class="box">
                                        <h2>El momento de hacer tu primer negocio</h2>
                                        <a class="btn" href="#">Más información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center valores">
                        <div class="col-md-4 col-lg-3">
                            <h2>Valor 1</h2>
                            <p>Explicar los valores agregados</p>
                            <img src="/img/icon-star.svg">
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <h2>Valor 2</h2>
                            <p>Explicar los valores agregados</p>
                            <img src="/img/icon-star.svg">
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <h2>Valor 3</h2>
                            <p>Explicar los valores agregados</p>
                            <img src="/img/icon-star.svg">
                        </div>
                    </div>
                    <div class="row justify-content-center interfaz">
                        <div class="col-12 col-lg-9">
                            <h2><span>Interfaz</span>Un sistema</h2>
                            <p>Descubra cómo Permutado.com muestra potenciales clientes que buscan y tienen todo tipo de inmuebles a negociar en un sistema perfecto para encontrar fácil y rapidamente los resultados del próximo negocio.</p>
                        </div>
                    </div>
                    <div class="row justify-content-center workday">
                        <div class="col-md-6 col-lg-4 align-self-center">
                            <h2>Sube tu propuesta o busca una en segundos</h2>
                            <p>Workday ayuda a organizaciones de todos los sectores a triunfar. Tanto si su organización es una mediana empresa como si figura en la lista Fortune 50, nuestro sistema cloud le permite conocer su organización y su negocio a fondo y le ofrece la agilidad necesaria para adaptarse al cambio.</p>
                        </div>
                        <div class="col-md-6 col-lg-5 align-self-center">
                            <img src="/img/pc.png">
                        </div>
                    </div>
                    <div class="row links">
                        <div class="col-md-6 orange">
                            <img src="/img/icon-busco.png">
                            <h2>¿Buscas una propuesta?</h2>
                            <p>Selecciona los inmuebles que te interesan y comieza una negociación.</p>
                            <a href="#" class="btn">Busco</a>
                        </div>
                        <div class="col-md-6 white">
                            <img src="/img/icon-vendo.png">
                            <h2>¿Tienes una propuesta?</h2>
                            <p>Sube tus inmuebles y comieza una negociación.</p>
                            <a href="#" class="btn">Tengo</a>
                        </div>
                    </div>
                    <div class="row footer">
                        <div class="col-12">
                            <img class="logo" src="/img/logo-footer.png">
                            <hr>
                        </div>
                        <div class="col-md-12 col-lg-2 align-self-center">
                            <h2>UBICACIÓN</h2>
                        </div>
                        <div class="col-md-6 col-lg-3 align-self-center">
                            <div class="box">
                                <div class="datos-img"><img src="/img/icon-phone.png" ></div>
                                <div class="datos-txt">
                                (+57 1) 8059372 - (+57 1) 8058061<br>
                                (+57 1) 300 890 13 11 - (+57 1) 317 471 40 15
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 align-self-center">
                            <div class="box">
                                <div class="datos-img"><img src="/img/icon-place.png" ></div>
                                <div class="datos-txt">
                                Calle 98 # 22 - 64 Ofc 814. Bogotá D.C. <br>
                                Colombia - Sur América
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 align-self-center">
                            <div class="box">
                                <div class="datos-img"><img src="/img/icon-email.png" ></div>
                                <div class="datos-txt">
                                asistencia@firsoftsa.com, juridico@firsoftsa.com, financiera@firsoftsa.com, proyectos@firsoftsa.com, serviciosgenerales@firsoftsa.com
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-2 align-self-center">
                            <h2>SÍGUENOS</h2>
                        </div>
                        <div class="col-md-6 col-lg-3 align-self-center">
                            <a href="#" class="social"><img src="/img/icon-facebook.png" ></a>
                            <a href="#" class="social"><img src="/img/icon-instagram.png" ></a>
                        </div>
                    </div>
                </div>
            @endif

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

<script src="/js/slick.min.js"></script>
<script>
    $('.slide').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        accessibility: false
    });
</script>

    </body>
</html>
