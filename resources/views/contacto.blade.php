@extends('layouts.web')
@section('content')
<div class="container-fluid contacto">
    <div class="row head">
        <div class="col-12">
            <h1>Contacto</h1><img src="/img/icon-contacto.png">
        </div>
    </div>
    <div class="row form">
        <div class="col-12">
            <h2>¡Preguntanos cualquier inquietud que tengas!</h2>
        </div>
        <div class="col-12">
            <form>
                <input type="text" placeholder="Nombre" class="form-control">
                <input type="text" placeholder="Email"  class="form-control">
                <textarea rows="6" placeholder="Mensaje" class="form-control"></textarea>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
    </div>
</div>


@stop

@push('styles')
<style>

    .contacto {
        margin-top: 56px;
        font-size: 1.3rem;
        font-weight: 300;
        letter-spacing: 1px;
    }
    .head {
        background: #f19100;
        color: #fff;
    }
    .head .col-12 {
        max-width: 1000px;
        margin: 60px auto;
    }
    .head h1 {
        margin: 0 20px 10px 0;
        letter-spacing: 2px;
        display: inline-block;
        vertical-align: middle;
    }
    .head img {
        display: inline-block;
        vertical-align: middle;
        max-height: 80px;
        margin-top: 10px;
    }
    .form h2 {
        max-width: 1000px;
        margin: 80px auto 60px auto;
        text-align: center;
        border-bottom: 2px solid #005b95;
        color: #005b95;
        font-weight: 800;
        font-size: 1.8rem;
        letter-spacing: 4px;
        padding-bottom: 5px;
    }
    .form form {
        max-width: 700px;
        margin: auto;
    }
    .form .form-control {
        border-color: #005b95;
        margin-bottom: 5px;
        border-radius: 0;
        color: #005b95;
    }
    .form .form-control:focus {
        box-shadow: none;
    }
    .form .form-control::placeholder {
        color: rgba(0, 91, 149, 0.8);
    }
    .form .btn {
        background: #005b95;
        color: #fff;
        border-radius: 0;
        margin-bottom: 80px;
        padding: 5px 20px;
    }
    .form .btn:hover {
        background: #f19100;
    }
</style>
@endpush

@push('styles')


@endpush
