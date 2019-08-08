@extends('perfil.layout')
@section('content')
<div class="map"></div>
    <div class="container-fluid">
        <div class="row justify-content-end">
        @include('perfil.partials.nav')
        <publicar-inmueble></publicar-inmueble> 
    </div>
</div>
@stop

@push('styles')
<link rel="stylesheet" href="wizard/css/style.css" />
@endpush

@push('scripts')
<script src="wizard/js/jquery.backstretch.min.js"></script>
<script src="wizard/js/scripts.js"></script>
@endpush
