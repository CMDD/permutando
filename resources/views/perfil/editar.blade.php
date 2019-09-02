@extends('perfil.layout')
@section('content')
<div class="map"></div>
    <div class="container-fluid">
        <div class="row justify-content-end">
        @include('perfil.partials.nav')
        <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <span>Editar  Inmueble</span>
      </div>
    </div>
    <div class="row inmuebles">
        <div class="col box">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="gallery">
                    <div><img src="/{{$inmueble->imagen}}"></div>
                        @foreach($imagenes as $i)
                    <div><img src="/{{$i->image}}"></div>
                        @endforeach
                        
                    </div>
                    <div class="info">
                        <h3>{{$inmueble->tipo_inmueble}}</h3>
                        <div class="desc">
                            <div>
                                <span><strong>Área:</strong> {{$inmueble->area}} Area mts<sup>2</sup></span>
                                <span><strong>Habitaciones:</strong> {{$inmueble->habitaciones}}</span>
                                <span><strong>Baños:</strong> 3</span>
                            </div>
                            <div>
                                <span><strong>Valor:</strong> ${{$inmueble->valor}}</span>
                                <span><strong>Barrio:</strong> {{$inmueble->barrio}}</span>
                            </div>
                        </div>
                        <div class="more">
                            <strong>Caracteristicas:</strong>
                            <p>{{$inmueble->caracteristicas}}</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 form">
                    <form method="Post" action="/contacto" >
                    {!!csrf_field()!!}
                        <h4>Contactar</h4>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        <input type="text" class="form-control" name="tel" placeholder="Teléfono/Celular">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <input type="hidden" class="form-control" name="to" value="{{$inmueble->user_id}}">
                        <input type="hidden" class="form-control" name="inmueble" value="{{$inmueble->id}}">
                        <textarea class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                        <button type="submit" class="btn">Enviar</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
  </div>
    </div>
</div>
@stop

@push('styles')
    <link rel="stylesheet" href="/css/slick.css" />
    <style>
.slick-prev, .slick-next {
    z-index: 1;
    font-size: 0;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    cursor: pointer;
    color: transparent;
    border: none;
    outline: none;
    background: transparent;
}

.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
    color: transparent;
    outline: none;
    background: transparent;
}

.slick-prev {
    left: 10px;
}

[dir='rtl'] .slick-prev {
    right: 10px;
    left: auto;
}

.slick-next {
    right: 10px;
}

[dir='rtl'] .slick-next {
    right: auto;
    left: 10px;
}

.slick-prev:after,
.slick-prev:before,
.slick-next:after,
.slick-next:before {
    content: '';
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
}

.slick-prev:after, .slick-next:after { opacity: 0; }
.slick-prev:hover:after, .slick-next:hover:after { opacity: 1; }
.slick-prev:hover:before, .slick-next:hover:before { opacity: 0; }
.slick-prev.slick-disabled:before, .slick-next.slick-disabled:before { opacity: .5; }
.slick-prev.slick-disabled:hover:after, .slick-next.slick-disabled:hover:after { opacity: 0; }

.slick-prev:before,
[dir='rtl'] .slick-next:before {
    background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='50px' height='50px' viewBox='0 0 16 16' enable-background='new 0 0 16 16' xml:space='preserve'%3E%3Cpath fill='%23ffffff' d='M8,0.5C3.858,0.5,0.5,3.857,0.5,8c0,4.142,3.358,7.5,7.5,7.5c4.144,0,7.5-3.358,7.5-7.5 C15.5,3.857,12.144,0.5,8,0.5z M8,14.813c-3.763,0-6.813-3.052-6.813-6.813c0-3.763,3.051-6.813,6.813-6.813 c3.764,0,6.813,3.05,6.813,6.813C14.813,11.763,11.764,14.813,8,14.813z M5.953,7.999l2.078,2.719h0.657L6.607,7.999l2.08-2.717 H8.031L5.953,7.999z'/%3E%3C/svg%3E");
}

.slick-prev:after,
[dir='rtl'] .slick-next:after {
    background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='50px' height='50px' viewBox='0 0 16 16' enable-background='new 0 0 16 16' xml:space='preserve'%3E%3Cpath fill='%23ffffff' d='M8,0.5C3.858,0.5,0.5,3.857,0.5,8c0,4.142,3.358,7.5,7.5,7.5c4.144,0,7.5-3.358,7.5-7.5 C15.5,3.857,12.144,0.5,8,0.5z M8.031,10.718L5.953,7.999l2.078-2.717h0.656l-2.08,2.717l2.081,2.719H8.031z'/%3E%3C/svg%3E");
}

.slick-next:before,
[dir='rtl'] .slick-prev:before {
    background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='50px' height='50px' viewBox='0 0 16 16' enable-background='new 0 0 16 16' xml:space='preserve'%3E%3Cpath fill='%23ffffff' d='M8,0.5C3.858,0.5,0.5,3.857,0.5,8c0,4.142,3.358,7.5,7.5,7.5c4.144,0,7.5-3.358,7.5-7.5 C15.5,3.857,12.144,0.5,8,0.5z M8,14.813c-3.763,0-6.813-3.052-6.813-6.813c0-3.763,3.051-6.813,6.813-6.813 c3.764,0,6.813,3.05,6.813,6.813C14.813,11.763,11.764,14.813,8,14.813z M8,5.282H7.345l2.079,2.717l-2.08,2.719H8l2.078-2.719 L8,5.282z'/%3E%3C/svg%3E");
}

.slick-next:after,
[dir='rtl'] .slick-prev:after {
    background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='50px' height='50px' viewBox='0 0 16 16' enable-background='new 0 0 16 16' xml:space='preserve'%3E%3Cpath fill='%23ffffff' d='M8,0.5C3.858,0.5,0.5,3.857,0.5,8c0,4.142,3.358,7.5,7.5,7.5c4.144,0,7.5-3.358,7.5-7.5 C15.5,3.857,12.144,0.5,8,0.5z M8,10.718H7.344l2.08-2.719L7.345,5.282H8l2.078,2.717L8,10.718z'/%3E%3C/svg%3E");
}

.gallery img {
    width:100%;
}
.box {
    background: #fff;
    max-width: 1000px;
    -webkit-box-shadow: 3px 3px 3px #cccccc;
    box-shadow: 3px 3px 3px #cccccc;
    border-radius: 20px;
    padding:20px;
    margin: auto;
}
.box .info h3 {
    font-size: 1.5rem;
    color: #005b95;
    border-bottom: 1px solid #ccc;
    padding: 20px 0;
    margin-bottom: 30px;
}
.box .info .desc {
    display: flex;
    margin-bottom: 30px;
}
.box .info .desc > div {
    flex: 0 0 50%;
}
.box .desc span {
    display: block;
    margin-bottom: 5px;
}

.box .form h4 {
    margin:20px 0;
}
.box .form-control {
    margin-bottom: 10px;
}
.box .btn {
    color: #fff;
    background: #f19100;
    padding: .2rem 1rem;
}
.box .btn:hover {
    color: rgba(255, 255, 255, 0.7);
}
.box .form {
    border-top:1px solid #ccc;
}
@media (min-width: 992px) {
    .box .form {
        border:0;
        border-left:1px solid #ccc;
    }
    .box .form h4 {
        margin:0 0 20px 0;
    }
}

</style>
@endpush

@push('scripts')
    <script src="/js/slick.min.js"></script>
    <script>
        $('.gallery').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            accessibility: false
        });
    </script>
@endpush
