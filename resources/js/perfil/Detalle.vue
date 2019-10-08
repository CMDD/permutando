<template>
  <div>
    <form>
      <div class="row justify-content-center">
        <div class="col-md-6 col-xl-5 p-4">
          <div class="gallery mb-3" id="carousel">
            <div>
              <a
                class="image-link"
                :href="'/'+inmueble.imagen"
                v-bind:style="{ backgroundImage: 'url(' + '/' + inmueble.imagen+')' }"
              ></a>
              <!--<img :src="'/'+inmueble.imagen" />-->
            </div>

            <div v-for="image in imagenes" :key="image.id">
              <a
                class="image-link"
                :href="'/'+image.image"
                v-bind:style="{ backgroundImage: 'url(' + '/' + image.image+')' }"
              ></a>
            </div>
          </div>
          <!-- <a class="video-link" href="https://www.youtube.com/watch?v=_9HofM72SLs">VIDEO</a> -->
          <div class="group">
            <h4 class="mr-3">{{inmueble.tipo_inmueble}} - {{inmueble.tipo_publicacion}}</h4>

            <a v-if="form.video" :href="inmueble.video" class="btn video-link">Ver video</a>
          </div>
        </div>

        <div class="col-md-6 col-xl-5 p-4">
          <div class="group mb-5">
            <div v-if="publicar === 0">
              <button
                type="button"
                class="btn inv"
                v-if="inmueble.user_id == user.id"
                @click="publicarInmueble"
              >Publicar</button>
            </div>
            <div v-if="publicar === 1">
              <button
                type="button"
                class="btn inv"
                v-if="inmueble.user_id == user.id"
                @click="despublicarInmueble"
              >Quitar</button>
            </div>
          </div>
          <div class="group mb-5">
            <a href="#" class="btn" data-toggle="modal" data-target="#contactModal">Contactar</a>
            <button type="button" v-if="!editar" class="btn inv">
              <span v-if="actualizando">Actualizando...</span>
              <span v-else @click="actualizar()">Actualizar</span>
            </button>

            <div v-if="editar">
              <button
                class="btn inv"
                v-if="inmueble.user_id == user.id"
                @click="activarEdicion"
              >Editar</button>
            </div>

            <div v-if="editar">
              <button
                class="btn inv btn-eliminar"
                v-if="inmueble.user_id == user.id"
                @click="activarEdicion"
              >Eliminar</button>
            </div>
          </div>

          <div v-if="form.recibo_efectivo">
            <h4>Permuto por</h4>
            <div class="group" v-for="bien in bienes" :key="bien.id">
              <input type="text" :disabled="editar" v-bind:value="bien.bien" />
              <input type="text" :disabled="editar" v-bind:value="bien.valor" />
            </div>

            <div class="group">
              <span>Efectivo</span>
              <input type="text" :disabled="editar" v-bind:value="inmueble.recibo_efectivo" />
            </div>
            <div class="group justify-content-end">
              <a href="#" data-toggle="modal" data-target="#permutoModal" class="btn">Permutar</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-5 p-4">
          <div class="group">
            <span>Valor</span>
            <input type="text" :disabled="editar" v-model="form.valor" />
          </div>

          <div class="group">
            <span>Dirección</span>
            <input type="text" :disabled="editar" v-model="form.direccion" />
          </div>
        </div>
        <div class="col-md-6 col-xl-5 p-4">
          <div class="group">
            <span>Ciudad/Municipio</span>
            <input type="text" :disabled="editar" v-model="form.ciudad" />
          </div>
          <div class="group">
            <span>Barrio</span>
            <input type="text" :disabled="editar" v-model="form.barrio" />
          </div>
        </div>

        <!-- Casa/Apatamento -->
        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="form.tipo_inmueble == 'Casa' || form.tipo_inmueble == 'Apartamento'"
        >
          <div class="group">
            <span>Area m2</span>
            <input type="text" :disabled="editar" v-model="form.area" />
          </div>
          <div class="group">
            <span>Baños</span>
            <input type="text" :disabled="editar" v-model="form.banos" />
          </div>
          <div class="group">
            <span>Habitaciones</span>
            <input type="text" :disabled="editar" v-model="form.habitaciones" />
          </div>

          <div class="group">
            <span>Estrato</span>
            <input type="text" :disabled="editar" v-model="form.estrato" />
          </div>
        </div>

        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="form.tipo_inmueble == 'Casa' || form.tipo_inmueble == 'Apartamento'"
        >
          <div class="group">
            <span>Balcon</span>
            <div class="my-radio">
              <input type="radio" v-model="form.balcon" value="1" id="balcon_1" />
              <label for="balcon_1">Si</label>
              <input type="radio" v-model="form.balcon" value="0" id="balcon_0" />
              <label for="balcon_0" class="no">No</label>
            </div>
          </div>
          <div class="group">
            <span>Patio</span>
            <div class="my-radio">
              <input type="radio" v-model="form.patio" value="1" id="patio_1" />
              <label for="patio_1">Si</label>
              <input type="radio" v-model="form.patio" value="0" id="patio_0" />
              <label for="patio_0" class="no">No</label>
            </div>
          </div>
          <div class="group">
            <span>Terraza</span>
            <div class="my-radio">
              <input type="radio" v-model="form.terraza" value="1" id="terraza_1" />
              <label for="terraza_1">Si</label>
              <input type="radio" v-model="form.terraza" value="0" id="terraza_0" />
              <label for="terraza_0" class="no">No</label>
            </div>
          </div>

          <div class="group">
            <span>Parqueadero</span>
            <div class="my-radio">
              <input type="radio" v-model="form.parqueadero" value="1" id="parqueadero_1" />
              <label for="parqueadero_1">Si</label>
              <input type="radio" v-model="form.parqueadero" value="0" id="parqueadero_0" />
              <label for="parqueadero_0" class="no">No</label>
            </div>
          </div>
          <div class="group">
            <span>Portería</span>
            <div class="my-radio">
              <input type="radio" v-model="form.porteria" value="12h" id="porteria_12" />
              <label for="porteria_12">12H</label>
              <input type="radio" v-model="form.porteria" value="24h" id="porteria_24" checked />
              <label for="porteria_24">24H</label>
              <input type="radio" v-model="form.porteria" value="no" id="porteria_0" checked />
              <label for="porteria_0" class="no">No</label>
            </div>
          </div>
        </div>

        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="form.tipo_inmueble == 'Casa' || form.tipo_inmueble == 'Apartamento'"
        >
          <div class="group">
            <span>Zonas comunes</span>
            <div class="checks">
              <label>
                <input type="checkbox" v-model="inmueble.zonas" />Gimnasio
              </label>
              <label>
                <input type="checkbox" checked />Zonas húmedas
              </label>
              <label>
                <input type="checkbox" />BBQ
              </label>
              <label>
                <input type="checkbox" checked />Parques para niños
              </label>

              <label>
                <input type="checkbox" />Salón comunal
              </label>
            </div>
          </div>
        </div>

        <!-- Fin  Casa/Apatamento -->

        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Bodega'">
          <!-- <div class="group">
            <span>Area Frente</span>
            <input type="text" :disabled="editar" v-model="form.capacidad_luz" />
          </div>-->
          <div class="group">
            <span>Altura</span>
            <input type="text" :disabled="editar" v-model="form.altura" />
          </div>

          <div class="group">
            <span>Capacidad Luz</span>
            <input type="text" :disabled="editar" v-model="form.capacidad_luz" />
          </div>
          <div class="group">
            <span>Años de construción</span>
            <input type="text" :disabled="editar" v-model="form.anos" />
          </div>
        </div>
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Bodega'">
          <div class="group">
            <span>Area Fondo</span>
            <input type="text" :disabled="editar" v-model="form.area_fondo" />
          </div>
          <div class="group">
            <span>Altura Ancho</span>
            <input type="text" :disabled="editar" v-model="form.area_ancho" />
          </div>
          <div class="group">
            <span>Capacidad Carga (PSI)</span>
            <input type="text" :disabled="editar" v-model="form.carga_psi" />
          </div>
          <div class="group">
            <span>Parque Industrial</span>
            <div class="my-radio">
              <input
                type="radio"
                v-model="form.parque_industrial"
                value="1"
                id="parque_industrial_1"
              />
              <label for="parque_industrial_1">Si</label>
              <input
                type="radio"
                v-model="form.parque_industrial"
                value="0"
                id="parque_industrial_0"
              />
              <label for="parque_industrial_0" class="no">No</label>
            </div>
          </div>
        </div>

        <!-- Lote -->
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Lote'">
          <div class="group">
            <span>Area mts2</span>
            <input type="text" :disabled="editar" v-model="form.area" />
          </div>
          <div class="group">
            <span>Vías</span>
            <input type="text" :disabled="editar" v-model="form.vias" />
          </div>
        </div>
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Lote'">
          <div class="group">
            <span>Topografía</span>
            <input type="text" :disabled="editar" v-model="form.topografia" />
          </div>
        </div>
        <!-- Fin Lote -->
        <!-- Oficina -->
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Oficina'">
          <div class="group">
            <span>Area mts2</span>
            <input type="text" :disabled="editar" v-model="form.area" />
          </div>
          <div class="group">
            <span>Espacio</span>
            <input type="text" :disabled="editar" v-model="form.espacio" />
          </div>
        </div>
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Oficina'">
          <div class="group">
            <span>Portería</span>
            <div class="my-radio">
              <input type="radio" v-model="form.porteria" value="12h" id="porteria_12" />
              <label for="porteria_12">12H</label>
              <input type="radio" v-model="form.porteria" value="24h" id="porteria_24" checked />
              <label for="porteria_24">24H</label>
              <input type="radio" v-model="form.porteria" value="no" id="porteria_0" checked />
              <label for="porteria_0" class="no">No</label>
            </div>
          </div>
          <div class="group">
            <span>Parqueadero</span>
            <div class="my-radio">
              <input type="radio" v-model="form.parqueadero" value="1" id="parque_industrial_1" />
              <label for="parque_industrial_1">Si</label>
              <input type="radio" v-model="form.parqueadero" value="0" id="parque_industrial_0" />
              <label for="parque_industrial_0" class="no">No</label>
            </div>
          </div>
        </div>
        <!-- Oficina -->

        <!-- Edificio -->
        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Edificio'">
          <div class="group">
            <span>Area Lote</span>
            <input type="text" :disabled="editar" v-model="form.area_lote" />
          </div>
          <div class="group">
            <span>Area Contruida</span>
            <input type="text" :disabled="editar" v-model="form.area_construida" />
          </div>
          <div class="group">
            <span>Numero de Pisos</span>
            <input type="text" :disabled="editar" v-model="form.pisos" />
          </div>
        </div>

        <div class="col-md-6 col-xl-5 p-4" v-if="inmueble.tipo_inmueble == 'Edificio'">
          <!-- <div class="group">
            <span>Portería</span>
            <div class="my-radio">
              <input type="radio" v-model="form.porteria" value="12h" id="porteria_12" />
              <label for="porteria_12">12H</label>
              <input type="radio" v-model="form.porteria" value="24h" id="porteria_24" checked />
              <label for="porteria_24">24H</label>
              <input type="radio" v-model="form.porteria" value="no" id="porteria_0" checked />
              <label for="porteria_0" class="no">No</label>
            </div>
          </div>-->
          <div class="group">
            <span>Parqueadero</span>
            <div class="my-radio">
              <input type="radio" v-model="form.parqueadero" value="1" id="parqueadero_1" />
              <label for="parqueadero_1">Si</label>
              <input type="radio" v-model="form.parqueadero" value="0" id="parqueadero_0" />
              <label for="parqueadero_0" class="no">No</label>
            </div>
          </div>
          <div class="group">
            <span>Ascensor</span>
            <div class="my-radio">
              <input type="radio" v-model="form.ascensor" value="1" id="ascensor_1" />
              <label for="ascensor_1">Si</label>
              <input type="radio" v-model="form.ascensor" value="0" id="ascensor_0" />
              <label for="ascensor_0" class="no">No</label>
            </div>
          </div>
        </div>
        <!-- Fin  Edificio -->

        <!-- Casa Lote - Quinta - Finca - Hacienda  -->
        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="inmueble.tipo_inmueble == 'Casa Lote' || inmueble.tipo_inmueble == 'Quinta'"
        >
          <div class="group">
            <span>Area Lote</span>
            <input type="text" :disabled="editar" v-model="form.area_lote" />
          </div>
        </div>

        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="inmueble.tipo_inmueble == 'Casa Lote' || inmueble.tipo_inmueble == 'Quinta'"
        >
          <div class="group">
            <span>Area Contruida</span>
            <input type="text" :disabled="editar" v-model="form.area_construida" />
          </div>
        </div>
        <!-- Fin  Edificio -->

        <div class="col-md-6 col-xl-5 p-4">
          <div class="group">
            <span class="mb-3">Características</span>
            <textarea rows="6" :disabled="editar" v-model="form.caracteristicas"></textarea>
          </div>
        </div>

        <div
          class="col-md-6 col-xl-5 p-4"
          v-if="form.tipo_inmueble == 'Casa Lote' || form.tipo_inmueble == 'Quinta'"
        >
          <div class="group">
            <span>Tipo de Construccion</span>
            <div class="checks">
              <label>
                <input type="checkbox" checked />Parqueadero cubierto
              </label>
              <label>
                <input type="checkbox" />Parqueadero descubierto
              </label>
              <label>
                <input type="checkbox" checked />Pozo séptico
              </label>
              <label>
                <input type="checkbox" />Alcantarillado
              </label>
              <label>
                <input type="checkbox" />Zonas deportivas
              </label>
              <label>
                <input type="checkbox" v-model="inmueble.zonas" />Casa
              </label>
              <label>
                <input type="checkbox" checked />Bodega
              </label>
              <label>
                <input type="checkbox" />Piscina
              </label>
              <label>
                <input type="checkbox" />Kiosko
              </label>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-5 p-4"></div>
      </div>
    </form>
    <div id="contactModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Contactar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body row">
            <div class="col-md-6 form">
              <form @submit.prevent="contactar">
                <input
                  type="text"
                  class="form-control"
                  v-model="contacto.nombre"
                  placeholder="Nombre"
                  required
                />
                <input
                  type="text"
                  class="form-control"
                  v-model="contacto.tel"
                  placeholder="Teléfono/Celular"
                  required
                />
                <input
                  type="email"
                  class="form-control"
                  v-model="contacto.email"
                  placeholder="Email"
                />
                <input type="hidden" class="form-control" v-model="contacto.to" />
                <input type="hidden" class="form-control" v-model="contacto.inmueble" />
                <textarea
                  required
                  class="form-control"
                  v-model="contacto.mensaje"
                  placeholder="Mensaje"
                ></textarea>
                <button type="submit" class="btn btn-enviar">
                  <span v-if="!enviando">Enviar</span>
                  <span v-else>Enviando...</span>
                </button>
              </form>
            </div>
            <div class="col-md-6 box-contact text-center">
              <img v-if="!contact" src="/img/perfil-logo.png" alt />
              <p v-else class="text-contac">"Se ha enviado correctamente"</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="permutoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Permuto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body row box">
            <div class="form-group col-md-12">
              <div class="form-field w100">
                <div class="my-text">
                  <span>Valor del inmueble</span>$
                  <input type="text" v-model="form.valor" />
                </div>
              </div>
            </div>
            <div class="form-group generator">
              <h5>¿Qué bienes ofrecerías?</h5>
              <div class="group-generator">
                <div class="form-field w50">
                  <span>Bien #1</span>
                  <div class="my-text">
                    <input type="text" id="bien1" />
                  </div>
                </div>
                <div class="form-field w65">
                  <span>Valor del bien</span>
                  <div class="my-text">
                    <input type="text" id="valor_bien1" />
                  </div>
                </div>
              </div>

              <div class="form-field w50">
                <a href="#" @click="addBien" class="btn add">Agregar más bienes</a>
              </div>
              <div class="form-field w50">
                <div class="my-text text-right">
                  <span>Valor total</span>
                  <input type="text" v-model="valorTotal" />
                </div>
              </div>
              <div class="group-efectivo">
                <div class="form-field w50">
                  <a href="#" class="btn">Efectivo</a>
                </div>
                <div class="form-field w50">
                  <div class="my-text text-right" v-if="active">
                    <span>$</span>
                    <input type="text" v-model="form.recibo_efectivo" />
                  </div>
                </div>
              </div>
            </div>
            <div class="f1-buttons col-md-12 text-right">
              <button
                type="submit"
                v-if="!enviando"
                @click="permutando"
                class="btn btn-submit"
              >Enviar</button>
              <button type="button" v-else class="btn btn-submit">Enviado</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import toastr from "toastr";
toastr.options = {
  closeButton: true,
  timeOut: "10000"
  // "progressBar": true,
};
export default {
  props: ["inmueble", "user"],
  data() {
    return {
      indicador: 1,
      valorTotal: "",
      active: false,
      actualizando: false,
      enviando: false,
      contact: false,
      editar: true,
      publicar: this.inmueble.publicar,
      bienes: [],
      imagenes: [],
      form: this.inmueble,
      permutar: {
        bienes: [],
        valor_bien: [],
        user: this.user,
        to: this.inmueble.user_id,
        inmueble: this.inmueble.id,
        tipo: this.inmueble.tipo_publicacion
      },
      contacto: {
        to: this.inmueble.user_id,
        inmueble: this.inmueble.id,
        tipo: this.inmueble.tipo_publicacion
      }
    };
  },
  created() {
    this.getBienes();
    this.getImagenes();
  },
  methods: {
    publicarInmueble() {
      let dato = {
        id: this.inmueble.id,
        estado: 1
      };
      axios.post("/api/inmueble-estado", dato).then(res => {
        console.log(res.data);
        toastr.success("Inmueble publicado correctamente");
        this.publicar = 1;
      });
    },
    despublicarInmueble() {
      let dato = {
        id: this.inmueble.id,
        estado: 0
      };
      axios.post("/api/inmueble-estado", dato).then(res => {
        console.log(res.data);
        toastr.success("Inmueble desactivo");
        this.publicar = 0;
      });
    },

    addBien() {
      let bien = document.getElementById(`bien` + this.indicador).value;

      let valor_bien = document.getElementById(`valor_bien` + this.indicador)
        .value;

      this.permutar.bienes.push(bien);

      this.permutar.valor_bien.push(valor_bien.replace(/[.]/g, ""));

      bien = "";
      valor_bien = "";

      this.indicador = this.indicador + 1;

      var result = this.permutar.valor_bien.map(function(x) {
        return parseInt(x, 10);
      });
      const reducer = (accumulator, currentValue) => accumulator + currentValue;
      this.valorTotal = result.reduce(reducer);

      var fvalor = this.form.valor.replace(/[.]/g, "");
      var val = parseInt(fvalor) / 2;
      console.log(val);
      if (this.valorTotal > val) {
        this.active = true;
      } else {
        this.active = false;
      }
    },
    contactar() {
      this.enviando = true;
      axios.post("/contacto", this.contacto).then(res => {
        console.log(res.data);
        this.enviando = false;
        this.contacto.nombre = "";
        this.contacto.email = "";
        this.contacto.tel = "";
        this.contacto.mensaje = "";
        this.contact = true;
      });

      console.log(this.contacto);
    },
    permutando() {
      this.enviando = true;
      axios.post("/api/permutando", this.permutar).then(res => {
        console.log(res.data);
        toastr.success("Envido correctamente");
      });
    },
    actualizar() {
      this.actualizando = true;
      this.form.departamento = this.inmueble.departamento_id;
      this.form.ciudad = this.inmueble.ciudad_id;
      this.form.userId = this.inmueble.user_id;
      axios.post("/api/editar-inmueble", this.form).then(res => {
        console.log(res.data);
        this.actualizando = false;
        this.editar = true;
      });
    },
    activarEdicion() {
      this.editar = false;
    },
    getBienes() {
      axios.get("/api/bienes/" + this.inmueble.id).then(res => {
        this.bienes = res.data;
      });
    },
    getImagenes() {
      axios.get("/api/imagenes/" + 2).then(res => {
        this.imagenes = res.data;
        setTimeout(function() {
          $(".image-link").magnificPopup({
            type: "image",
            gallery: {
              enabled: true
            }
          });
          $(".video-link").magnificPopup({ type: "iframe" });
          $(".row")
            .find(".gallery")
            .slick({
              infinite: true,
              speed: 300,
              slidesToShow: 1,
              adaptiveHeight: true,
              accessibility: false
            });
        }, 0);
      });
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  }
};
</script>

<style>
.gallery a.image-link {
  height: 350px;
  display: block;
  background-size: cover;
  background-position: center;
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

.form input {
  margin-top: 3%;
}
.form textarea {
  margin-top: 3%;
}
.btn-enviar {
  margin-top: 2%;
  width: 100%;
}
.btn-eliminar {
  background-color: #a71e1e !important;
}
.box-contact {
  margin: auto;
}
.text-contac {
  font-size: 27px;
  color: #7db227;
}
.my-text {
  display: flex;
  align-items: center;
}
.my-text span,
.my-checkbox span {
  flex: 1;
  margin-right: 15px;
}
.my-text input {
  flex: 1;
  margin: 0;
  padding: 5px;
  border: 1px solid transparent;
  background: #f1f1f1;
  max-width: 150px;
  height: 32px;
}
.form-group .form-field.w100 {
  width: 96%;
}

.form-group .form-field {
  vertical-align: bottom;
  text-rendering: auto;
  width: 29.333%;
  margin: 20px 2%;
  border-bottom: 2px solid #005b95;
  padding-bottom: 5px;
  color: #005b95;
}
.form-group .form-field,
.form-group h5 {
  display: inline-block;
  zoom: 1;
  *display: inline;
  letter-spacing: normal;
  word-spacing: normal;
}
.form-group {
  letter-spacing: -0.31em;
  *letter-spacing: normal;
  *word-spacing: -0.43em;
  text-rendering: optimizespeed;
}

.form-group .form-field.w50 {
  width: 46%;
}
.form-group.generator .form-field {
  border-bottom: 0;
  margin-top: 0;
}
.form-group .form-field.w100 .my-text input,
.form-group .form-field.w35 .my-text input,
.form-group .form-field.w65 .my-text input {
  max-width: none;
}
</style>

styl
