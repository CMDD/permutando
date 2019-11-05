<template>
  <div>
    <form action>
      <div class="row">
        <div class="col-md-5 p-3">
          <div class="caja p-4">
            <div class="form-group">
              <label>Valor</label>
              <input type="text" v-model="form.valor" :disabled="!editar" />
            </div>

            <div class="form-group">
              <label>Área Fondo</label>
              <input type="text" v-model="form.area_fondo" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Área Ancho</label>
              <input type="text" v-model="form.area_ancho" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Altura</label>
              <input type="text" v-model="form.altura" :disabled="!editar" />
            </div>

            <div class="form-group">
              <label>Capacidad Luz (KWA)</label>
              <input type="text" v-model="form.capacidad_luz" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Capacidad Carga (PSI)</label>
              <input type="text" v-model="form.carga_psi" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" v-model="form.departamento" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Ciudad / Municipio</label>
              <input type="text" v-model="form.ciudad" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Barrio</label>
              <input type="text" v-model="form.barrio" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Dirección</label>
              <input type="text" v-model="form.direccion" :disabled="!editar" />
            </div>
            <!-- <div class="my-select form-group">
              <label>Departamento</label>
              <select @change="getCiudades()" v-model="form.departamento">
                <option>{{form.departamento}}</option>

                <option
                  v-for="departamento in departamentos"
                  :key="departamento.id"
                  v-bind:value="departamento"
                >{{departamento.nombre}}</option>
              </select>
            </div>-->

            <div class="form-group">
              <label>Valor Adminsitración</label>
              <input type="text" v-model="form.administracion" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Parque Industrial</label>
              <div class="my-radio">
                <input
                  type="radio"
                  id="balcon_1"
                  value="1"
                  v-model="form.parque_industrial"
                  :disabled="!editar"
                />
                <label for="balcon_1">Si</label>
                <input
                  type="radio"
                  id="balcon_0"
                  value="0"
                  v-model="form.parque_industrial"
                  :disabled="!editar"
                />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-7 p-3">
          <div class="caja p-4">
            <div class="edit-gallery">
              <label>Imágenes</label>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_1" ref="img1" @change="img" class="inputfile" disabled />
                <label
                  for="file_1"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_2" class="inputfile" disabled />
                <label
                  for="file_2"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_3" class="inputfile" disabled />
                <label
                  for="file_3"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_4" class="inputfile" />
                <label
                  for="file_4"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_5" class="inputfile" disabled />
                <label
                  for="file_5"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_6" class="inputfile" />
                <label
                  for="file_6"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
            </div>
            <div class="row video align-items-end">
              <div class="col-6">
                <div class="form-group">
                  <label>Link del video</label>
                  <input type="text" v-model="form.video" :disabled="!editar" />
                </div>
              </div>
              <div class="col-6">
                <iframe
                  width="100%"
                  :src="form.video"
                  frameborder="0"
                  allow="autoplay; encrypted-media"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
          <div class="caja p-4 mt-4">
            <div class="row">
              <div class="col-12 mt-4">
                <label>Características</label>
                <textarea rows="4" v-model="form.caracteristicas"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" v-if="form.tipo_publicacion == 'Permuto'">
        <div class="col-12">
          <div class="caja p-4">
            <div class="col-12">
              <label>Permutado por:</label>
            </div>
            <div class="row" v-for="bien in bienes" :key="bien.id">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" v-model="bien.bien" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Valor</label>
                  <input type="text" v-model="bien.valor" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Efectivo</label>
                <input type="text" v-model="form.recibo_efectivo" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <detalle-contactar :inmueble="form.id"></detalle-contactar>
    <detalle-permuto :inmueble="form.id"></detalle-permuto>
  </div>
</template>

<script>
export default {
  props: ["datos"],
  data() {
    return {
      editar: false,
      enviando: false,
      bienes: [],
      departamentos: [],
      form: this.datos,
      contacto: {}
    };
  },
  created() {
    this.getDepartamentos();
    this.getBienes();
  },
  methods: {
    contactar() {},
    getBienes() {
      axios.get("/api/bienes/" + this.form.id).then(res => {
        this.bienes = res.data;
      });
    },
    getDepartamentos() {
      axios.get("/api/departamentos").then(res => {
        this.departamentos = res.data;
      });
    },
    getCiudades(value) {
      console.log(value);

      //   axios.get("/api/ciudades/" + this.form.departamento).then(res => {
      //     this.ciudades = res.data;
      //   });
    },
    img(event) {
      console.log(event);
      this.form.img1 = this.$refs.img1.files[0];
    }
  }
};

$(document).ready(function() {
  $(".inputfile").change(function() {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(input)
          .next()
          .css("background-image", "url(" + e.target.result + ")");
        $(input)
          .parent()
          .addClass("added");
        $(input).prop("disabled", true);
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      $(input)
        .parent()
        .removeClass("added");
      $(input).prop("disabled", false);
    }
  });

  $(document).on("click", ".edit-gallery .image.added .delete", function() {
    var input = $(this).next();
    input.val("").prop("disabled", false);
    $(this)
      .parent()
      .removeClass("added");
    input.next().css("background-image", "");
  });
});
</script>

<style>
.caja {
  border: 1px solid #005c96;
  border-radius: 15px;
}
.caja label {
  display: block;
  color: #005b95;
  font-weight: 500;
}
input,
textarea {
  flex: 0 0 auto;
  width: 100%;
  margin: 0;
  padding: 5px;
  border: 1px solid transparent;
  background: #f1f1f1;
}
input:focus,
textarea:focus {
  outline: none;
}
input {
  height: 32px;
}
.form-group {
  display: flex;
  align-items: flex-end;
}
.form-group label {
  flex: 1;
  display: inline-block;
}
.form-group input {
  width: 70%;
}
.my-radio input[type="radio"] {
  display: none;
}
.my-radio input[type="radio"] + label {
  flex: 0 0 auto;
  text-align: center;
  font-size: 0.65rem;
  line-height: 32px;
  font-weight: 600;
  width: 32px;
  margin: 0 3px;
  border-radius: 50%;
  background: #b9b9b9;
  color: #fff;
  cursor: pointer;
  text-transform: uppercase;
}
.my-radio input[type="radio"]:checked + label {
  background: #7db227;
}
.my-radio input[type="radio"]:checked + label.no {
  background: #a71e1e;
}

.my-checkbox input[type="checkbox"] {
  display: none;
}
.my-checkbox input[type="checkbox"] + label {
  flex: 0 0 auto;
  display: block;
  font-size: 0.7rem;
  font-weight: 600;
  margin: 0 6px 6px 0;
  cursor: pointer;
}
.my-checkbox input[type="checkbox"] + label:before {
  content: "";
  display: inline-block;
  vertical-align: bottom;
  width: 15px;
  height: 15px;
  background-color: #b9b9b9;
  background-size: 9px;
  background-position: center;
  background-repeat: no-repeat;
  margin-right: 3px;
  border-radius: 50%;
}
.my-checkbox input[type="checkbox"]:checked + label:before {
  background-color: #7db227;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='%23fff' viewBox='0 0 24 24'%3E%3Cpath d='M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z'/%3E%3C/svg%3E");
}
.my-checkbox .form-col {
  flex: 1;
  display: flex;
  flex-direction: column;
}
.my-checkbox .form-col > div {
  flex: 1;
}

.edit-gallery {
  border-bottom: 2px solid #005b96;
  margin-bottom: 20px;
}
.edit-gallery .image {
  display: inline-block;
  margin: 5px;
  position: relative;
}
.edit-gallery .image .inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: -1;
}
.edit-gallery .image .inputfile + label {
  position: relative;
  display: block;
  width: 100px;
  height: 100px;
  background-color: #f1f1f1;
  background-position: center;
  background-size: cover;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  cursor: pointer;
}
.edit-gallery .image .inputfile:disabled + label {
  cursor: default;
}
.edit-gallery .image:not(.added) .inputfile + label:hover {
}
.edit-gallery .image .delete {
  display: none;
  position: absolute;
  right: -9px;
  top: -4px;
  width: 25px;
  line-height: 24px;
  text-align: center;
  background: #a71e1d;
  color: #fff;
  border-radius: 50%;
  font-size: 20px;
  padding-bottom: 1px;
  z-index: 5;
  cursor: pointer;
}
.edit-gallery .image.added .delete {
  display: block;
}
.edit-gallery .image:not(.added) .inputfile + label:before {
  content: "+";
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  margin-top: -24px;
  font-size: 40px;
  line-height: 1;
  text-align: center;
  color: #005b96;
  font-weight: 700;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.edit-gallery .image:not(.added) .inputfile + label:hover:before {
  color: #e67319;
}

.video .form-group {
  flex-direction: column;
  align-items: flex-start;
}
.video .form-group input {
  width: 100%;
}
.video .prev-video {
  width: 100%;
  height: 0;
  padding-top: 60%;
  background: #ccc;
}
.my-select select {
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
  flex: 0 0 auto;
  width: 50%;
}
</style>
