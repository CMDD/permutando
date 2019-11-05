<template>
  <div>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#permutoModal">Permutar</a>

    <div id="permutoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Permuto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="form-group col-md-12">
              <div class="form-group">
                <div class="my-text">
                  <span>Valor del inmueble</span>$
                  <input type="text" />
                </div>
              </div>
            </div>
            <div class="form-group generator">
              <h5>¿Qué bienes ofrecerías?</h5>
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

