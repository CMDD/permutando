<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <a class="mobile-menu">
          <span></span>
        </a>
        <span>INFORMACIÓN DEL INMUEBLE</span>
      </div>
    </div>
    <div class="row contenedor">
      <div class="col-md-5 p-2">
        <div class="caja1 p-2">
          <form action>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Valor</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" />
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-7 p-2">
        <div class="caja1"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="">
.contenedor {
}
.caja1 {
  border: 1px solid #005c96;
  height: 500px;
  border-radius: 2%;
  margin: 1%;
}
</style>