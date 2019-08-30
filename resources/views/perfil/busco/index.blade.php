@extends('perfil.layout')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-end">
        @include('perfil.partials.nav')
       <perfil-busco></perfil-busco>
       
    </div>
    <div class="mapa" id="mymap"></div>
   
</div>
@stop

@push('styles')
<link rel="stylesheet" href="/wizard/css/style.css" />
<style>
.accion-buscar{
    height: 60px;
    margin-top: 1%;
}
</style>
@endpush

@push('scripts')
<script
async
defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQW6mlbcn4P312vnTaZNdknL0O1JRwdvA"
></script>
<script src="/wizard/js/jquery.backstretch.min.js"></script>
<script src="/wizard/js/scripts.js"></script>
@endpush
