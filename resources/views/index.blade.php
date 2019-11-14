@extends('layouts.web') @section('content')
<div class="container-fluid home">
    @if(Auth::User())
    <login-component :user={{Auth::User()->id}}></login-component>
    @else
    <login-component :user="0"></login-component>
    @endIf

        {{-- <div class="row links">
                <div class="col-md-6 orange">
                    <img src="/img/icon-busco.png" />
                    <h2>¿Buscas una propuesta?</h2>
                    <p>
                        Selecciona los inmuebles que te interesan y comieza una
                        negociación.
                    </p>
                    <a href="#" data-toggle="modal" data-id="1"
                    data-target="#loginModal" class="btn">Busco</a>
                </div>
                <div class="col-md-6 white">
                    <img src="/img/icon-vendo.png" />
                    <h2>¿Tienes una propuesta?</h2>
                    <p>Sube tus inmuebles y comieza una negociación.</p>
                    <a href="#" data-toggle="modal"
                    data-target="#loginModal" data-id="2" class="btn">Tengo</a>
                </div>
            </div> --}}
    {{-- <div class="row">
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
    </div> --}}
    <div class="row justify-content-center valores">
        <div class="col-md-4 col-lg-3">
            <h2>Valor 1</h2>
            <p>Explicar los valores agregados</p>
            <img src="/img/icon-star.svg" />
        </div>
        <div class="col-md-4 col-lg-3">
            <h2>Valor 2</h2>
            <p>Explicar los valores agregados</p>
            <img src="/img/icon-star.svg" />
        </div>
        <div class="col-md-4 col-lg-3">
            <h2>Valor 3</h2>
            <p>Explicar los valores agregados</p>
            <img src="/img/icon-star.svg" />
        </div>
    </div>
    <div class="row justify-content-center interfaz">
        <div class="col-12 col-lg-9">
            <h2><span>Interfaz</span>Un sistema</h2>
            <p>
                Descubra cómo Permutado.com muestra potenciales clientes que
                buscan y tienen todo tipo de inmuebles a negociar en un sistema
                perfecto para encontrar fácil y rapidamente los resultados del
                próximo negocio.
            </p>
        </div>
    </div>
    <div class="row justify-content-center workday">
        <div class="col-md-6 col-lg-4 align-self-center">
            <h2>Sube tu propuesta o busca una en segundos</h2>
            <p>
                Workday ayuda a organizaciones de todos los sectores a triunfar.
                Tanto si su organización es una mediana empresa como si figura
                en la lista Fortune 50, nuestro sistema cloud le permite conocer
                su organización y su negocio a fondo y le ofrece la agilidad
                necesaria para adaptarse al cambio.
            </p>
        </div>
        <div class="col-md-6 col-lg-5 align-self-center">
            <img src="/img/pc.png" />
        </div>
    </div>

    <div class="row justify-content-center interfaz">
            <div class="col-12 col-lg-9">
                {{-- <h2><span>Interfaz</span>Un sistema</h2>
                <p>
                    Descubra cómo Permutado.com muestra potenciales clientes que
                    buscan y tienen todo tipo de inmuebles a negociar en un sistema
                    perfecto para encontrar fácil y rapidamente los resultados del
                    próximo negocio.
                </p> --}}
            </div>
        </div>
   
</div>
@stop
