<template>
  <div>
    <form @submit.prevent="updateInmueble">
      <div class="row">
        <div class="col-md-5 p-3">
          <div class="caja p-4">
            <div class="form-group">
              <label>Valor</label>
              <!-- <input type="text" v-model="form.valor" :disabled="!editar" /> -->
              <VueNumeric currency="$" separator="." v-model="form.valor" :disabled="!editar"></VueNumeric>
            </div>

            <div class="form-group">
              <label>Área Lote</label>
              <input type="text" v-model="form.area_lote" :disabled="!editar" />
            </div>
            <div class="form-group">
              <label>Área Construida</label>
              <input type="text" v-model="form.area_construida" :disabled="!editar" />
            </div>

            <div class="form-group" v-if="!editar">
              <label>Departamento</label>
              <input type="text" v-model="form.departamento" disabled />
            </div>
            <!-- <div class="my-select form-group" v-if="editar">
              <label>Departamento</label>
              <select @change="getCiudades()" v-model="form.departamento">
                <option value>{{form.departamento}}</option>
                <option
                  v-for="departamento in departamentos"
                  :key="departamento.id"
                  v-bind:value="departamento"
                >{{departamento.nombre}}</option>
              </select>
            </div>-->

            <div class="my-select form-group" v-if="editar">
              <label>Departamento</label>
              <select v-model="form.departamento" @change="getCiudades()">
                <option>Seleccione...</option>
                <option
                  v-bind:value="departamento.id"
                  v-for="departamento in departamentos"
                  :key="departamento.id"
                >{{departamento.nombre}}</option>
              </select>
            </div>

            <div class="my-select form-group" v-if="editar">
              <label>Ciudad / Municipio</label>
              <select v-model="form.ciudad">
                <option>Seleccione...</option>
                <option
                  v-bind:value="ciudad.id"
                  v-for="ciudad in ciudades"
                  :key="ciudad.id"
                >{{ciudad.nombre}}</option>
              </select>
            </div>

            <div class="form-group" v-if="!editar">
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

            <div class="form-group">
              <label>Valor Adminsitración</label>
              <VueNumeric
                currency="$"
                separator="."
                v-model="form.administracion"
                :disabled="!editar"
              ></VueNumeric>
            </div>
          </div>
        </div>

        <div class="col-md-7 p-3">
          <div class="caja p-4" v-if="!editar">
            <div class="edit-gallery">
              <label>Imagenes del inmueble</label>
              <div class="gallery mb-3" id="carousel">
                <div>
                  <a
                    class="image-link"
                    :href="'/'+form.imagen"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                  ></a>
                </div>
                <div v-if="form.im2">
                  <a
                    class="image-link"
                    :href="'/'+form.im2"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.im2+')' }"
                  ></a>
                </div>
                <div v-if="form.im3">
                  <a
                    class="image-link"
                    :href="'/'+form.im3"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.im3+')' }"
                  ></a>
                </div>
                <div v-if="form.im4">
                  <a
                    class="image-link"
                    :href="'/'+form.im4"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.im4+')' }"
                  ></a>
                </div>
                <div v-if="form.im5">
                  <a
                    class="image-link"
                    :href="'/'+form.im5"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.im5+')' }"
                  ></a>
                </div>
                <div v-if="form.im6">
                  <a
                    class="image-link"
                    :href="'/'+form.im6"
                    v-bind:style="{ backgroundImage: 'url(' + '/' + form.im6+')' }"
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="caja p-4">
            <div class="edit-gallery" v-if="editar">
              <label>Imágenes</label>
              <div class="image added">
                <span v-if="editar" class="delete">&times;</span>
                <input type="file" id="file_1" ref="im1" class="inputfile" @change="im1" />
                <label
                  for="file_1"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.imagen+')' }"
                ></label>
              </div>
              <div :class="'image' + (form.im2 !== null ? ' added':'' )">
                <span v-if="editar" @click="eliminar('im2',form.id)" class="delete">&times;</span>
                <input type="file" id="file_2" ref="im2" class="inputfile" @change="im2" />
                <label
                  v-if="form.im2"
                  for="file_2"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.im2+')' }"
                ></label>
                <label v-else for="file_2"></label>
              </div>

              <div :class="'image' + (form.im3 !== null ? ' added':'' )">
                <span v-if="editar" class="delete" @click="eliminar('im3',form.id)">&times;</span>
                <input type="file" id="file_3" ref="im3" class="inputfile" @change="im3" />
                <label
                  v-if="form.im3"
                  for="file_3"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.im3+')' }"
                ></label>
                <label v-else for="file_3"></label>
              </div>
              <div :class="'image' + (form.im4 !== null ? ' added':'' )">
                <span v-if="editar" class="delete" @click="eliminar('im4',form.id)">&times;</span>
                <input type="file" id="file_4" ref="im4" class="inputfile" @change="im4" />
                <label
                  v-if="form.im4"
                  for="file_4"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.im4+')' }"
                ></label>
                <label v-else for="file_4"></label>
              </div>
              <div :class="'image' + (form.im5 !== null ? ' added':'' )">
                <span v-if="editar" class="delete" @click="eliminar('im5',form.id)">&times;</span>
                <input type="file" id="file_5" ref="im5" class="inputfile" @change="im5" />
                <label
                  v-if="form.im5"
                  for="file_5"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.im5+')' }"
                ></label>
                <label v-else for="file_5"></label>
              </div>
              <div :class="'image' + (form.im6 !== null ? ' added':'' )">
                <span v-if="editar" class="delete" @click="eliminar('im6',form.id)">&times;</span>
                <input type="file" id="file_6" ref="im6" class="inputfile" @change="im6" />
                <label
                  v-if="form.im6"
                  for="file_6"
                  v-bind:style="{ backgroundImage: 'url(' + '/' + form.im6+')' }"
                ></label>
                <label v-else for="file_6"></label>
              </div>
            </div>
            <div class="row video align-items-end">
              <div class="col-12">
                <div class="form-group" v-if="editar">
                  <label>Link del video</label>
                  <input type="text" v-model="form.video" />
                </div>
              </div>
              <div class="col-6">
                <a
                  v-if="form.video"
                  class="video-link btn"
                  :href="form.video"
                >Ver video del inmueble</a>
                <!-- <detalle-video></detalle-video> -->
                <p v-else>No tiene video disponible</p>
              </div>
            </div>
          </div>
          <div class="caja p-4 mt-4" v-if="form.construccion">
            <div class="row my-checkbox" v-if="!editar">
              <div class="col-md-3">
                <label>Tipo de construcción</label>
              </div>
              <div class="col-md-3" v-for="zona in form.construccion" :key="zona.id">
                <input type="checkbox" checked />
                <label :for="zona.nombre">{{zona.nombre}}</label>
              </div>
            </div>
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
            <div class="row">
              <div class="col-12 mb-3">
                <label>Permutado por:</label>
              </div>
            </div>
            <div class="row" v-for="bien in bienes" :key="bien.id">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" v-model="bien.bien" />
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Valor</label>
                  <!-- <input type="text" v-model="bien.valor" /> -->
                  <VueNumeric currency="$" separator="." v-model="bien.valor" :disabled="!editar"></VueNumeric>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <hr />
                <div class="form-group">
                  <label>Recibo en efectivo</label>
                  <!-- <input type="text" v-model="form.recibo_efectivo" /> -->
                  <VueNumeric
                    currency="$"
                    separator="."
                    v-model="form.recibo_efectivo"
                    :disabled="!editar"
                  ></VueNumeric>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 text-right py-3 botones-azules">
          <div v-if="user.id === datos.user_id">
            <a href="#" @click="publicar()" v-if="!publico " class="btn">Publicar Inmueble</a>
            <a href="#" @click="ocultar()" v-if="publico" class="btn">Ocultar Inmueble</a>
            <a href="#" @click="edit()" v-if="!editar" class="btn">Editar</a>
            <button type="submit" v-else class="btn">Actualizar</button>
          </div>
          <detalle-permuto :inmueble="form" :user="user" v-if="user.id != datos.user_id"></detalle-permuto>
          <detalle-contactar :inmueble="form" v-if="user.id != datos.user_id"></detalle-contactar>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import VueNumeric from "vue-numeric";
import toastr from "toastr";
export default {
  components: {
    VueNumeric
  },
  props: ["datos", "user"],
  data() {
    return {
      publico: this.datos.publicar,
      url: "",
      editar: false,
      enviando: false,
      bienes: [],
      departamentos: [],
      ciudades: [],
      form: this.datos,
      contacto: {}
    };
  },
  created() {
    this.getDepartamentos();
    this.getBienes();
  },
  methods: {
    permutando() {
      this.enviando = true;
      axios.post("/api/permutando", this.permutar).then(res => {
        console.log(res.data);
      });
    },
    edit() {
      this.editar = true;
      Vue.swal.fire({
        icon: "success",
        title: "Ya puedes editar tu inmueble",
        showConfirmButton: false,
        timer: 1500
      });
    },
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
      axios.get("/api/ciudades/" + this.form.departamento).then(res => {
        this.ciudades = res.data;
      });
    },
    publicar() {
      axios.get("/api/publicar-inmueble/" + this.form.id).then(res => {
        Vue.swal.fire({
          icon: "success",
          title: "Tu inmueble ha sido publicado correctamente",
          showConfirmButton: false,
          timer: 1500
        });
        this.publico = true;
      });
    },
    ocultar() {
      axios.get("/api/ocultar-inmueble/" + this.form.id).then(res => {
        Vue.swal.fire({
          icon: "success",
          title: "Tu inmueble ha sido pausado",
          showConfirmButton: false,
          timer: 1500
        });
        this.publico = false;
      });
    },
    updateInmueble() {
      let fd = new FormData();

      for (var i = 0; i < this.bienes.length; i++) {
        fd.append("bienes[]", this.bienes[i].bien);
        fd.append("valor_bien[]", this.bienes[i].valor);
        fd.append("bien_id[]", this.bienes[i].id);
      }
      // for (var i = 0; i < this.form.valor_bien.length; i++) {
      //   fd.append("valor_bien[]", this.form.valor_bien[i]);
      // }

      // General
      fd.append("tipo_inmueble", this.form.tipo_inmueble);
      fd.append("tipo_publicacion", this.form.tipo_publicacion);
      fd.append("caracteristicas", this.form.caracteristicas);
      fd.append("id", this.form.id);
      fd.append("valor", this.form.valor);
      fd.append("departamento", this.form.departamento);
      fd.append("ciudad", this.form.ciudad);
      fd.append("barrio", this.form.barrio);
      fd.append("direccion", this.form.direccion);
      fd.append("video", this.form.video);
      fd.append("recibo_efectivo", this.form.recibo_efectivo);
      fd.append("im1", this.form.im1);
      fd.append("im2", this.form.im2);
      fd.append("im3", this.form.im3);
      fd.append("im4", this.form.im4);
      fd.append("im5", this.form.im5);
      fd.append("im6", this.form.im6);

      // Bodega
      fd.append("area_lote", this.form.area_lote);
      fd.append("area_construida", this.form.area_construida);
      fd.append("anos", this.form.anos);
      fd.append("administracion", this.form.administracion);
      fd.append("edit", true);

      axios
        .post("/api/editar-inmueble", fd, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(res => {
          console.log(res.data);

          toastr.success("Inmueble actualizado correctamente");
        });
    },
    eliminar(value, id) {
      axios.get("/api/delete-img/" + value + "/" + id).then(res => {
        toastr.success(res.data);
      });
    },
    im1(event) {
      console.log(event);
      this.form.im1 = this.$refs.im1.files[0];
    },
    im2(event) {
      console.log(event);
      this.form.im2 = this.$refs.im2.files[0];
    },
    im3(event) {
      console.log(event);
      this.form.im3 = this.$refs.im3.files[0];
    },
    im4(event) {
      console.log(event);
      this.form.im4 = this.$refs.im4.files[0];

      const file = this.$refs.im4.files[0];
      this.url = URL.createObjectURL(file);
    },
    im5(event) {
      console.log(event);
      this.form.im5 = this.$refs.im5.files[0];
    },
    im6(event) {
      console.log(event);
      this.form.im6 = this.$refs.im6.files[0];
    }
  }
};
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
.gallery a.image-link {
  height: 350px;
  display: block;
  background-size: cover;
  background-position: center;
}
.botones-azules > div {
  display: inline-block;
}
.botones-azules .btn {
  background: #005b96;
  border: 0;
  border-radius: 7px;
  margin: 5px;
}
.botones-azules .btn:hover {
  background: #f19100;
}
</style>
