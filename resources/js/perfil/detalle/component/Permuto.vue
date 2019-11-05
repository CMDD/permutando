<template>
  <div>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#permutoModal">Permutar</a>

    <div id="permutoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group main-group">
                <img src="http://permutando.test/img/perfil-logo.png">
                <label class="icono">Valor de inmueble</label>
                <input type="text" disabled value="$50.000.000">
            </div>
            <h5 class="text-center mt-4">¿Qué bienes ofrecerías?</h5>
            <hr>
            <div class="row campos">
                <div class="col-md-8">
                    <label>Bien #1</label>
                    <input type="text">
                </div>
                <div class="col-md-4">
                    <label>Valor del bien</label>
                    <input type="text">
                </div>
            </div>
            <div class="row campos">
                <div class="col-md-8">
                    <label>Bien #2</label>
                    <input type="text">
                </div>
                <div class="col-md-4">
                    <label>Valor del bien</label>
                    <input type="text">
                </div>
            </div>
            <div class="row campos">
                <div class="col-md-8">
                    <label>Bien #3</label>
                    <input type="text">
                </div>
                <div class="col-md-4">
                    <label>Valor del bien</label>
                    <input type="text">
                </div>
            </div>
            <div class="row total mt-4">
                <div class="col-md-6">
                    <a href="#" class="btn">Agregar más inmuebles</a>
                    <a href="#" class="btn">Efectivo</a>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Valor total:</label>
                        <input type="text"></div>
                </div>
            </div>
            <div class="f1-buttons col-md-12 text-right">
              <button type="button" class="btn btn-submit">Ofertar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>

<style>
    .modal-content {
        border-radius: 15px;
        color: #005b95;
    }
    .modal .main-group {
        align-items: center;
    }
    .modal .main-group img {
        max-width: 100px;
        margin-right: 20px;
    }
    .modal .main-group input {
        width: 50%;
        text-align: center;
        background-color: rgba(0, 90, 149, 0.2);
        font-weight: 600;
        font-size: 18px;
        border-radius: 50px;
    }
    .modal .main-group label {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
    }
    .modal .campos label {
        margin: 0;
    }
    .modal .campos >div {
        margin-top: 10px;
    }
    .modal .total .btn {
        display: block;
        max-width: 200px;
        margin-bottom: 10px;
        border-radius: 4px;
    }
</style>
