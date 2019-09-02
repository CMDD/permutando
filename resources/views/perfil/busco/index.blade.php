@extends('perfil.layout')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-end">
        @include('perfil.partials.nav')
       <perfil-busco></perfil-busco>
       
    </div>
    <div class="row mapa" id="mymap"></div>
   
</div>
@stop

@push('styles')
<link rel="stylesheet" href="/wizard/css/style.css" />
<style>
    .accion-buscar {
        position: absolute;
        z-index: 1;
        top: 4rem;
        left: 1rem;
        text-align: center;
        right: 1rem;
    }
    .accion-buscar select {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='34.088' height='15.081' viewBox='0 0 34.088 15.081'%3E%3Cpath d='M2679.01,982.891l-16.9,15.081-17.191-15.081Z' transform='translate(-2644.922 -982.891)' fill='%23005b95'/%3E%3C/svg%3E");
        background-position: 97% center;
        background-repeat: no-repeat;
        background-size: 12px;
        border: 0;
        border-radius: 10px;
        margin: 0;
        overflow: hidden;
        padding: 5px 16px 5px 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        min-width: 200px;
        line-height: 1.5;
        vertical-align: middle;
        display: inline-block;
    }
    .accion-buscar .btn {
        background: #005b95;
        color: #fff;
         border-radius: 50px;
        margin-left: 10px;
    }
    .accion-buscar .btn:hover {
        background: #e67319;
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
