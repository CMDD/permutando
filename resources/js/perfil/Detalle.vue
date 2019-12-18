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
    <detalle-casa
      v-if="form.tipo_inmueble === 'Casa' || form.tipo_inmueble ==='Apartamento' "
      :datos="form"
      :user="user"
    ></detalle-casa>
    <detalle-bodega v-if="form.tipo_inmueble === 'Bodega' " :datos="form" :user="user"></detalle-bodega>
    <detalle-lote v-if="form.tipo_inmueble === 'Lote' " :datos="form" :user="user"></detalle-lote>
    <detalle-oficina v-if="form.tipo_inmueble === 'Oficina' " :datos="form" :user="user"></detalle-oficina>
    <detalle-edificio v-if="form.tipo_inmueble === 'Edificio' " :datos="form" :user="user"></detalle-edificio>
    <detalle-quinta
      v-if="form.tipo_inmueble === 'Quinta' || form.tipo_inmueble === 'Casa Lote' || form.tipo_inmueble === 'Finca' || form.tipo_inmueble === 'Hacienda' "
      :datos="form"
      :user="user"
    ></detalle-quinta>
    <!-- <form action>
      <div class="row">
        <div class="col-md-5 p-3">
          <div class="caja p-4">
            <div class="form-group">
              <label>Valor</label>
              <input type="text" v-model="form.valor" />
            </div>
            <div class="form-group">
              <label>Dirección</label>
              <input type="text" v-model="form.direccion" />
            </div>
            <div class="form-group">
              <label>Área m2</label>
              <input type="text" v-model="form.area" />
            </div>
            <div class="form-group">
              <label>Baños</label>
              <input type="text" />
            </div>
            <div class="form-group">
              <label>Habitaciones</label>
              <input type="text" />
            </div>
            <div class="form-group">
              <label>Estrato</label>
              <input type="text" />
            </div>
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" />
            </div>
            <div class="form-group">
              <label>Barrio</label>
              <input type="text" />
            </div>
            <div class="form-group">
              <label>Balcón</label>
              <div class="my-radio">
                <input type="radio" id="balcon_1" name="balcon" />
                <label for="balcon_1">Si</label>
                <input type="radio" id="balcon_0" name="balcon" />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>
            <div class="form-group">
              <label>Terraza</label>
              <div class="my-radio">
                <input type="radio" id="terraza_1" name="terraza" />
                <label for="terraza_1">Si</label>
                <input type="radio" id="terraza_0" name="terraza" />
                <label for="terraza_0" class="no">No</label>
              </div>
            </div>
            <div class="form-group">
              <label>Parqueadero</label>
              <div class="my-radio">
                <input type="radio" id="parqueadero_1" name="parqueadero" />
                <label for="parqueadero_1">Si</label>
                <input type="radio" id="parqueadero_0" name="parqueadero" />
                <label for="parqueadero_0" class="no">No</label>
              </div>
            </div>
            <div class="form-group">
              <label>Portería</label>
              <div class="my-radio">
                <input type="radio" id="porteria_1" name="porteria" />
                <label for="porteria_1">Si</label>
                <input type="radio" id="porteria_0" name="porteria" />
                <label for="porteria_0" class="no">No</label>
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
                <input type="file" id="file_1" class="inputfile" disabled />
                <label
                  for="file_1"
                  style="background-image: url(http://permutando.test/img/pc.png);"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_2" class="inputfile" disabled />
                <label
                  for="file_2"
                  style="background-image: url(http://permutando.test/img/pc.png);"
                ></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_3" class="inputfile" disabled />
                <label
                  for="file_3"
                  style="background-image: url(http://permutando.test/img/pc.png);"
                ></label>
              </div>
              <div class="image">
                <span class="delete">&times;</span>
                <input type="file" id="file_4" class="inputfile" />
                <label for="file_4"></label>
              </div>
              <div class="image added">
                <span class="delete">&times;</span>
                <input type="file" id="file_5" class="inputfile" disabled />
                <label
                  for="file_5"
                  style="background-image: url(http://permutando.test/img/pc.png);"
                ></label>
              </div>
              <div class="image">
                <span class="delete">&times;</span>
                <input type="file" id="file_6" class="inputfile" />
                <label for="file_6"></label>
              </div>
            </div>
            <div class="row video align-items-end">
              <div class="col-6">
                <div class="form-group">
                  <label>Link del video</label>
                  <input type="text" />
                </div>
              </div>
              <div class="col-6">
                <div class="prev-video"></div>
              </div>
            </div>
          </div>
          <div class="caja p-4 mt-4">
            <div class="row my-checkbox">
              <div class="col-md-3">
                <label>Zonas Comunes</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" value="Gimnasio" id="zonas_1" />
                <label for="zonas_1">Gimnasio</label>
                <input type="checkbox" value="BBQ" id="zonas_2" />
                <label for="zonas_2">BBQ</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" value="Salón comunal" id="zonas_3" />
                <label for="zonas_3">Salón comunal</label>
                <input type="checkbox" value="Zona húmeda" id="zonas_4" />
                <label for="zonas_4">Zona húmeda</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" value="Parques para niños" id="zonas_5" />
                <label for="zonas_5">Parques para niños</label>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mt-4">
                <label>Características</label>
                <textarea rows="4"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="caja p-4">
            <div class="row">
              <div class="col-12">
                <label>Permutado por:</label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Valor</label>
                  <input type="text" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Efectivo</label>
                  <input type="text" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>-->
  </div>
</template>

<script>
export default {
  props: ["inmueble", "user"],
  data() {
    return {
      form: this.inmueble
    };
  },
  created() {},
  methods: {
    getBienes() {
      axios.get("/api/bienes/" + this.inmueble.id).then(res => {
        this.bienes = res.data;
      });
    }
  }
};

// $(document).ready(function() {
//   $(".inputfile").change(function() {
//     var input = this;
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//         $(input)
//           .next()
//           .css("background-image", "url(" + e.target.result + ")");
//         $(input)
//           .parent()
//           .addClass("added");
//         $(input).prop("disabled", true);
//       };
//       reader.readAsDataURL(input.files[0]);
//     } else {
//       $(input)
//         .parent()
//         .removeClass("added");
//       $(input).prop("disabled", false);
//     }
//   });

//   $(document).on("click", ".edit-gallery .image.added .delete", function() {
//     var input = $(this).next();
//     input.val("").prop("disabled", false);
//     $(this)
//       .parent()
//       .removeClass("added");
//     input.next().css("background-image", "");
//     console.log(input);
//   });
// });
//
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
/* .edit-gallery .image:not(.added) .inputfile + label:before {
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
} */

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
</style>
