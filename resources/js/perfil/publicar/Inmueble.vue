<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <a class="mobile-menu">
          <span></span>
        </a>
        <span>Publicar Inmueble</span>
      </div>
    </div>
    <div class="box">
      <form role="form" @submit.prevent="storeInmueble" class="f1" enctype="multipart/form-data">
        <div class="f1-steps">
          <div class="f1-progress">
            <div
              class="f1-progress-line"
              data-now-value="16.66"
              data-number-of-steps="3"
              style="width: 16.66%;"
            ></div>
          </div>
          <div class="f1-step active">
            <div class="f1-step-icon">1</div>
          </div>

          <div class="f1-step">
            <div class="f1-step-icon">2</div>
          </div>

          <div class="f1-step">
            <div class="f1-step-icon">3</div>
          </div>
        </div>

        <fieldset>
          <h4>Publicar Inmueble</h4>
          <div class="form-group">
            <div class="form-field w50">
              <div class="my-select">
                <span>Tipo de publicación:</span>
                <select
                  v-model="form.tipoPublicacion"
                  required
                  @change="mostrarAlerta(form.tipoPublicacion)"
                >
                  <option value>Seleccione..</option>
                  <option value="Venta">Venta</option>
                  <option value="Arriendo">Arriendo</option>
                  <option value="Permuto">Permuta</option>
                </select>
              </div>
            </div>

            <div class="form-field w50">
              <div class="my-select">
                <span>Tipo de Inmueble:</span>
                <select required v-model="form.tipoInmueble">
                  <option value>Seleccione..</option>
                  <option value="Casa">Casa</option>
                  <option value="Apartamento">Apartamento</option>
                  <option value="Bodega">Bodega</option>
                  <option value="Lote">Lote</option>
                  <option value="Oficina">Oficina</option>
                  <option value="Edificio">Edificio</option>
                  <option value="Casa Lote">Casa Lote</option>
                  <option value="Quinta">Quinta</option>
                  <option value="Finca">Finca</option>
                  <option value="Hacienda">Hacienda</option>
                </select>
              </div>
            </div>

            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' 
              || form.tipoInmueble == 'Lote' || form.tipoInmueble == 'Oficina' "
            >
              <div class="my-text">
                <span>
                  Área mts
                  <sup>2</sup>
                  :
                </span>
                <input v-model="form.area" type="text" :required="form.tipoInmueble == 'Casa'" />
              </div>
            </div>

            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Edificio' || form.tipoInmueble == 'Casa Lote' 
            || form.tipoInmueble == 'Quinta' || form.tipoInmueble == 'Finca' || form.tipoInmueble == 'Hacienda'  "
            >
              <div class="my-text">
                <span>
                  Área Lote mts
                  <sup>2</sup>
                  :
                </span>
                <input v-model="form.area_lote" type="text" />
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Edificio' || form.tipoInmueble == 'Casa Lote' 
            || form.tipoInmueble == 'Quinta' || form.tipoInmueble == 'Finca' || form.tipoInmueble == 'Hacienda'"
            >
              <div class="my-text">
                <span>
                  Área Construida mts
                  <sup>2</sup>
                  :
                </span>
                <input v-model="form.area_construida" type="text" />
              </div>
            </div>
            <div
              class="form-field w100"
              v-if="form.tipoInmueble == 'Casa Lote' 
            || form.tipoInmueble == 'Quinta' || form.tipoInmueble == 'Finca' || form.tipoInmueble == 'Hacienda'"
            >
              <div class="my-checkbox">
                <span>Tipo de Construcción:</span>
                <div class="form-col">
                  <div>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Casa"
                      id="zonas_1"
                    />
                    <label for="zonas_1">Casa</label>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Bodega"
                      id="zonas_2"
                    />
                    <label for="zonas_2">Bodega</label>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Piscina"
                      id="zonas_3"
                    />
                    <label for="zonas_3">Piscina</label>
                  </div>
                  <div>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Kiosco"
                      id="zonas_4"
                    />
                    <label for="zonas_4">Kiosco</label>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Parqueadero cubierto"
                      id="zonas_5"
                    />
                    <label for="zonas_5">Parqueadero cubierto</label>
                  </div>
                  <div>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Parqueadero descubierto"
                      id="zonas_9"
                    />
                    <label for="zonas_9">Parqueadero descubierto</label>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Pozo séptico"
                      id="zonas_6"
                    />
                    <label for="zonas_6">Pozo séptico</label>
                  </div>
                  <div>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Alcantarillado"
                      id="zonas_7"
                    />
                    <label for="zonas_7">Alcantarillado</label>
                    <input
                      type="checkbox"
                      v-model="form.tipo_construccion"
                      value="Zonas deportivas"
                      id="zonas_8"
                    />
                    <label for="zonas_8">Zonas deportivas</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-field w62" v-if="form.tipoInmueble == 'Oficina' ">
              <div class="my-select">
                <span>Espacio:</span>
                <select v-model="form.espacio">
                  <option value>Seleccione..</option>
                  <option value="Abierto">Abierto</option>
                  <option value="Cerrado">Cerrado</option>
                </select>
              </div>
            </div>

            <div class="form-field w50" v-if="form.tipoInmueble == 'Edificio' ">
              <div class="my-text">
                <span>Numero de pisos:</span>
                <input v-model="form.pisos" type="number" />
              </div>
            </div>

            <div class="form-field" v-if="form.tipoInmueble == 'Edificio' ">
              <div class="my-radio">
                <span>Ascensor:</span>
                <input type="radio" v-model="form.ascensor" value="1" id="balcon_1" />
                <label for="balcon_1">Si</label>
                <input type="radio" v-model="form.ascensor" value="0" id="balcon_0" checked />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>

            <div class="form-field w62" v-if="form.tipoInmueble == 'Lote' ">
              <div class="my-text">
                <span>Topografía:</span>
                <input v-model="form.topografia" type="text" />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Lote' ">
              <div class="my-select">
                <span>Vías:</span>
                <select v-model="form.vias">
                  <option value>Seleccione...</option>
                  <option value="Pavimentada">Pavimentada</option>
                  <option value="Destapada">Destapada</option>
                </select>
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text mini">
                <span>
                  Área mts
                  <sup>2</sup>
                  :
                </span>
                <input type="text" v-model="form.area_ancho" placeholder="Ancho" />
                <small>x</small>
                <input type="text" v-model="form.area_fondo" placeholder="Fondo" />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text mini">
                <span>
                  Altura mts
                  <sup>2</sup>
                  :
                </span>
                <input v-model="form.altura" type="text" placeholder />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text">
                <span>Capacidad carga (PSI):</span>
                <input v-model="form.carga_psi" type="text" />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text">
                <span>Capacidad Luz (KWA):</span>
                <input v-model="form.capacidad_luz" type="text" />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-radio">
                <span>Parque Industrial:</span>
                <input type="radio" v-model="form.parque_industrial" value="1" id="balcon_1" />
                <label for="balcon_1">Si</label>
                <input
                  type="radio"
                  v-model="form.parque_industrial"
                  value="0"
                  id="balcon_0"
                  checked
                />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>

            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Apartamento' || form.tipoInmueble == 'Casa' "
            >
              <div class="my-select">
                <span>Habitaciones:</span>
                <select v-model="form.habitaciones">
                  <option>--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa'|| form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-select">
                <span>Baños:</span>
                <select v-model="form.banos">
                  <option>--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-radio">
                <span>Balcón:</span>
                <input type="radio" v-model="form.balcon" value="1" id="balcon_1" />
                <label for="balcon_1">Si</label>
                <input type="radio" v-model="form.balcon" value="0" id="balcon_0" checked />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-radio">
                <span>Terraza:</span>
                <input type="radio" v-model="form.terraza" value="1" id="terraza_1" />
                <label for="terraza_1">Si</label>
                <input type="radio" v-model="form.terraza" value="0" id="terraza_0" checked />
                <label for="terraza_0" class="no">No</label>
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-radio">
                <span>Patio:</span>
                <input type="radio" v-model="form.patio" value="1" id="patio_1" />
                <label for="patio_1">Si</label>
                <input type="radio" v-model="form.patio" value="0" id="patio_0" checked />
                <label for="patio_0" class="no">No</label>
              </div>
            </div>

            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' || form.tipoInmueble == 'Oficina' "
            >
              <div class="my-radio">
                <span>Portería:</span>
                <input type="radio" v-model="form.porteria" value="12h" id="porteria_12" />
                <label for="porteria_12">12H</label>
                <input type="radio" v-model="form.porteria" value="24h" id="porteria_24" checked />
                <label for="porteria_24">24H</label>
                <input type="radio" v-model="form.porteria" value="no" id="porteria_0" checked />
                <label for="porteria_0" class="no">No</label>
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento'
              || form.tipoInmueble == 'Oficina' || form.tipoInmueble == 'Edificio' "
            >
              <div class="my-radio">
                <span>Parqueadero:</span>
                <input type="radio" v-model="form.parqueadero" value="1" id="parqueadero_1" />
                <label for="parqueadero_1">Si</label>
                <input type="radio" v-model="form.parqueadero" value="0" id="parqueadero_0" checked />
                <label for="parqueadero_0" class="no">No</label>
              </div>
            </div>

            <div
              class="form-field w100"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-checkbox">
                <span>Zonas Comunes:</span>
                <div class="form-col">
                  <div>
                    <input type="checkbox" v-model="form.zonas" value="Gimnasio" id="zonas_1" />
                    <label for="zonas_1">Gimnasio</label>
                    <input type="checkbox" v-model="form.zonas" value="BBQ" id="zonas_2" />
                    <label for="zonas_2">BBQ</label>
                    <input type="checkbox" v-model="form.zonas" value="Salón comunal" id="zonas_3" />
                    <label for="zonas_3">Salón comunal</label>
                  </div>
                  <div>
                    <input type="checkbox" v-model="form.zonas" value="Zona húmeda" id="zonas_4" />
                    <label for="zonas_4">Zona húmeda</label>
                    <input
                      type="checkbox"
                      v-model="form.zonas"
                      value="Parques para niños"
                      id="zonas_5"
                    />
                    <label for="zonas_5">Parques para niños</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-select">
                <span>Departamento:</span>
                <select v-model="form.departamento" @change="getCiudades()" required>
                  <option value>Seleccione...</option>
                  <option
                    v-bind:value="departamento.id"
                    v-for="departamento in departamentos"
                    :key="departamento.id"
                  >{{departamento.nombre}}</option>
                </select>
              </div>
            </div>

            <div class="form-field w50">
              <div class="my-select">
                <span>Ciudad / Municipio:</span>
                <select v-model="form.ciudad" required>
                  <option value>Seleccione...</option>
                  <option
                    v-bind:value="ciudad.id"
                    v-for="ciudad in ciudades"
                    :key="ciudad.id"
                  >{{ciudad.nombre}}</option>
                </select>
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Valor Administración:</span>
                <!-- <input v-model="form.administracion" type="text" required /> -->
                <VueNumeric currency="$" separator="." v-model="form.administracion"></VueNumeric>
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Años de Construcción:</span>
                <input v-model="form.anos" type="text" required />
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Barrio:</span>
                <input v-model="form.barrio" type="text" required />
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Dirección:</span>
                <input v-model="form.direccion" type="text" required />
              </div>
            </div>
            <div
              class="form-field w50"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-select">
                <span>Estrato:</span>
                <select v-model="form.estrato">
                  <option>--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="Campestre">Campestre</option>
                </select>
              </div>
            </div>
            <textarea v-model="form.caracteristicas" placeholder="Otras características"></textarea>
            <div class="form-field w50 value">
              <span>Valor: $</span>
              <!-- <input required type="text" v-model="form.valor" /> -->
              <VueNumeric currency="$" separator="." v-model="form.valor"></VueNumeric>
            </div>
          </div>
          <div class="f1-buttons single">
            <button type="button" class="btn btn-next">Siguiente</button>
          </div>
        </fieldset>

        <fieldset>
          <h4>Más información</h4>
          <div class="form-group">
            <div class="form-field w50">
              <span>Imagen Principal</span>
              <div class="image">
                <div class="containerPreview" v-if="preview != null">
                  <img class="preview" :src="preview" alt />
                </div>

                <input required type="file" id="file" ref="file" @change="img" class="inputfile" />
                <label for="file">Subir</label>
              </div>
            </div>
            <div class="form-field w50 containerAviso">
              <p class="aviso">¡Podrás subir otras fotos más adelante!</p>
            </div>

            <!-- <div class="form-field w50">
              <span>Imágenes...</span>
              <small>(Máximo 6 imágenes)</small>
              <div class="image">
                <input
                  type="file"
                  id="file2"
                  class="inputfile"
                  ref="file2"
                  multiple
                  @change="filesChange"
                />
                <label for="file2">Subir imagen</label>
              </div>
            </div>-->
            <div class="form-field w100">
              <div class="my-text">
                <span>Url Video:</span>
                <input v-model="form.video" type="text" />
              </div>
            </div>
          </div>
          <div class="f1-buttons">
            <button type="button" class="btn btn-prev">Anterior</button>
            <button type="button" class="btn btn-next">Siguiente</button>
          </div>
        </fieldset>

        <fieldset>
          <h4 v-if="form.tipoPublicacion === 'Permuto'">Permuto</h4>
          <h4 v-if="form.tipoPublicacion != 'Permuto'">Finalizar</h4>
          <div class="popup-permuto" v-if="form.tipoPublicacion === 'Permuto'">
            Ten en cuenta que si elijes ésta opción, solo podrás añadir dinero en efectivo, una vez hayas completado en el formulario más del 50% del valor de tu propiedad en bienes.
            <span
              class="closed"
            >&times;</span>
          </div>
          <div class="form-group" v-if="form.tipoPublicacion === 'Permuto'">
            <div class="form-field w100">
              <div class="my-text">
                <span>Valor del inmueble:</span>$
                <!-- <input type="text" v-model="form.valor" /> -->
                <VueNumeric currency="$" separator="." v-model="form.valor"></VueNumeric>
              </div>
            </div>
          </div>
          <div class="form-group generator" v-if="form.tipoPublicacion === 'Permuto'">
            <h5>¿Por qué bienes lo permutarías?</h5>
            <div class="group-generator" v-for="(input, index) in inputs" :key="input.index">
              <div class="form-field">
                <span>Bien #{{index +1}}:</span>
                <a href="#" @click="eliminarInput(index)">Eliminar</a>
                <div class="my-text">
                  <input type="text" v-model="input.bien" />
                </div>
              </div>
              <div class="form-field">
                <span>Valor del bien:</span>
                <div class="my-text">
                  <VueNumeric currency="$" separator="." v-model="input.valor"></VueNumeric>
                </div>
              </div>
            </div>

            <div class="form-field w50">
              <button type="button" @click="addBien()" class="btn add">Agregar más bienes</button>
            </div>
            <div class="form-field w50">
              <div class="my-text text-md-right align-items-center">
                <span>Valor total:</span>
                <VueNumeric currency="$" separator="." v-model="valorTotal"></VueNumeric>
              </div>
            </div>
            <div class="group-efectivo">
              <div class="form-field w50">
                <a href="#" class="btn" @click="addEfectivo()">Recibo en Efectivo</a>
              </div>
              <div class="form-field w50">
                <div class="my-text text-right" v-if="active">
                  <span>Recibo en efectivo:</span>
                  <VueNumeric currency="$" separator="." v-model="form.recibo_efectivo"></VueNumeric>
                </div>
              </div>
            </div>
          </div>
          <div class="f1-buttons">
            <button type="button" class="btn btn-prev">Anterior</button>
            <button type="submit" v-if="enviando" class="btn btn-submit">Finalizar</button>
            <button type="button" v-else class="btn btn-submit">Enviando...</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</template>
<script>
import VueNumeric from "vue-numeric";
import toastr from "toastr";
toastr.options = {
  closeButton: true,
  timeOut: "10000"
  // "progressBar": true,
};
if (document.getElementById("userId")) {
  var userId = document.getElementById("userId").value;
} else {
}
export default {
  components: {
    VueNumeric
  },
  data() {
    return {
      preview: null,
      active: false,
      valorTotal: "",
      userId: userId,
      enviando: true,
      departamentos: [],
      ciudades: [],
      inputs: [
        {
          valor: "",
          bien: ""
        }
      ],
      form: {
        area_ancho: "",
        area_fondo: "",
        altura: "",
        anos: "",
        valor_bien: [],
        recibo_efectivo: "",
        tipoPublicacion: "",
        tipoInmueble: "",
        //   Casa - Apartamento
        balcon: "",
        terraza: "",
        patio: "",
        porteria: "",
        parqueadero: "",
        caracteristica: "",
        area: "",
        banos: "",
        //Bodega
        parque_industrial: "",
        capacidad_luz: "",
        carga_psi: "",
        habitaciones: "",
        // Lote
        topografia: "",
        vias: "",
        // Oficina
        espacio: "",
        // Edificio
        ascensor: "",
        area_construida: "",
        area_lote: "",
        pisos: "",
        // Quinta - Casa Lote - Finca - Hacienda
        tipo_construccion: [],

        valor: "",
        mas_informacion: "",
        zonas: [],
        transporte: [],
        viveres: [],
        bienestar: [],
        entretenimiento: [],
        educativo: [],
        gastronomia: [],
        mascotas: [],
        imagePrincipal: "",
        imagenes: [],
        estrato: "",
        departamento: "",
        ciudad: "",
        barrio: "",
        direccion: "",
        video: "",
        caracteristicas: ""
      }
    };
  },
  created() {
    console.log("100.000.000.65".replace(/[.]/g, ""));

    this.getDepartamentos();
  },
  methods: {
    mostrarAlerta(value) {
      if (value == "Permuto") {
        Vue.swal.fire(
          "",
          "Ten en cuenta que si eliges esta opción, sólo podrás añadir dinero en efectivo  una vez hayas completado más del 50% del valor de tu propiedad en bienes",
          "info"
        );
      }
    },
    addEfectivo() {
      this.validarValor();
      let result2 = parseInt(this.form.valor) / 2;
      if (this.valorTotal > result2) {
        this.active = true;
      } else {
        this.active = false;
        Vue.swal.fire(
          "Ten en cuenta que si eliges esta opción, sólo podrás añadir dinero en efectivo  una vez hayas completado más del 50% del valor de tu propiedad en bienes"
        );
      }
    },
    addBien() {
      this.validarValor();
      this.inputs.push({
        bien: "",
        valor: ""
      });

      var val = parseInt(this.form.valor) / 2;

      if (this.valorTotal > val) {
        this.active = true;
      } else {
        this.active = false;
      }
    },
    eliminarInput(index) {
      this.inputs.splice(index, 1);
      this.validarValor();
    },
    img(event) {
      console.log(event);
      $(".image #file").each(function() {
        var label = $(this).next("label");
        var fileName = "";
        if (event.target.value) {
          fileName = event.target.value.split("\\").pop();
          label.html(fileName);
        }
      });

      this.form.imagePrincipal = this.$refs.file.files[0];
      this.preview = URL.createObjectURL(this.$refs.file.files[0]);
    },
    filesChange(e) {
      this.form.imagenes = e.target.files;
      console.log(e);
      $(".image #file2").each(function() {
        var label = $(this).next("label");
        var fileName = "";
        if (e.target.value) {
          let num = e.srcElement.files.length;
          if (num > 1) {
            label.html(num + " adjuntos");
          } else {
            label.html(num + " adjunto");
          }
        }
      });
    },
    storeInmueble() {
      this.enviando = false;
      let fd = new FormData();
      for (var i = 0; i < this.form.zonas.length; i++) {
        fd.append("zonas[]", this.form.zonas[i]);
      }
      for (var i = 0; i < this.inputs.length; i++) {
        fd.append("bienes[]", this.inputs[i].bien);
        fd.append("valor_bien[]", this.inputs[i].valor);
      }
      // for (var i = 0; i < this.form.valor_bien.length; i++) {
      //   fd.append("valor_bien[]", this.form.valor_bien[i]);
      // }
      for (var i = 0; i < this.form.transporte.length; i++) {
        fd.append("transporte[]", this.form.transporte[i]);
      }
      for (var i = 0; i < this.form.viveres.length; i++) {
        fd.append("viveres[]", this.form.viveres[i]);
      }
      for (var i = 0; i < this.form.bienestar.length; i++) {
        fd.append("bienestar[]", this.form.bienestar[i]);
      }
      for (var i = 0; i < this.form.entretenimiento.length; i++) {
        fd.append("entretenimiento[]", this.form.entretenimiento[i]);
      }
      for (var i = 0; i < this.form.educativo.length; i++) {
        fd.append("educativo[]", this.form.educativo[i]);
      }
      for (var i = 0; i < this.form.gastronomia.length; i++) {
        fd.append("gastronomia[]", this.form.gastronomia[i]);
      }
      for (var i = 0; i < this.form.mascotas.length; i++) {
        fd.append("mascotas[]", this.form.mascotas[i]);
      }
      for (var i = 0; i < this.form.tipo_construccion.length; i++) {
        fd.append("tipo_construccion[]", this.form.tipo_construccion[i]);
      }
      for (var i = 0; i < this.form.imagenes.length; i++) {
        fd.append("imagenes[]", this.form.imagenes[i]);
      }
      // for (var i = 0; i < this.modo.length; i++) {
      //      fd.append('modos[]',this.modo[i]);
      // }
      fd.append("area", this.form.area);

      fd.append("habitaciones", this.form.habitaciones);
      fd.append("banos", this.form.banos);
      fd.append("balcon", this.form.balcon);
      fd.append("patio", this.form.patio);
      fd.append("image", this.form.imagePrincipal);
      fd.append("imagenes", this.form.imagenes);
      fd.append("terraza", this.form.terraza);
      fd.append("porteria", this.form.porteria);
      fd.append("parqueadero", this.form.parqueadero);
      fd.append("caracteristica", this.form.caracteristica);
      fd.append("valor", this.form.valor);
      fd.append("mas_informacion", this.form.mas_informacion);
      fd.append("userId", this.userId);

      fd.append("departamento", this.form.departamento);
      fd.append("ciudad", this.form.ciudad);
      fd.append("barrio", this.form.barrio);
      fd.append("direccion", this.form.direccion);
      fd.append("estrato", this.form.estrato);
      fd.append("video", this.form.video);
      fd.append("tipo_publicacion", this.form.tipoPublicacion);
      fd.append("tipo_inmueble", this.form.tipoInmueble);
      fd.append("recibo_efectivo", this.form.recibo_efectivo);
      fd.append("caracteristicas", this.form.caracteristicas);

      // Bodega
      fd.append("carga_psi", this.form.carga_psi);
      fd.append("capacidad_luz", this.form.capacidad_luz);
      fd.append("parque_industrial", this.form.parque_industrial);
      fd.append("area_fondo", this.form.area_fondo);
      fd.append("altura", this.form.altura);
      fd.append("area_ancho", this.form.area_ancho);
      fd.append("anos", this.form.anos);
      fd.append("administracion", this.form.administracion);

      // Lote
      fd.append("topografia", this.form.topografia);
      fd.append("vias", this.form.vias);
      //Oficina
      fd.append("espacio", this.form.espacio);
      //Edificio
      fd.append("area_construida", this.form.area_construida);
      fd.append("ascensor", this.form.ascensor);
      fd.append("area_lote", this.form.area_lote);
      fd.append("pisos", this.form.pisos);
      fd.append("edit", false);

      axios
        .post("api/store-inmueble", fd, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(res => {
          console.log(res.data);
          this.enviando = true;

          // this.form = {
          //   area:'',
          //   habitaciones:'',
          //   banos:'',
          //   balcon:'',
          //   image:'',
          //   terraza:'',
          //   porteria:'',
          //   parqueadero:'',
          //   caracteristica:'',
          //   mas_informacion:'',
          //   zonas:'',
          //   transporte:'',
          //   viveres:'',
          //   bienestar:'',
          //   entretenimiento:'',
          //   educativo:'',
          //   gastronomia:'',
          //   mascotas:'',
          // }
          toastr.success("Inmueble subido correctamente");

          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = `/perfil-detalle/${res.data}`;
        });
    },
    getDepartamentos() {
      axios.get("/api/departamentos").then(res => {
        this.departamentos = res.data;
      });
    },
    getCiudades() {
      axios.get("/api/ciudades/" + this.form.departamento).then(res => {
        this.ciudades = res.data;
      });
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    validarValor() {
      if (this.inputs.length > 0) {
        var result = this.inputs.map(function(x) {
          return parseInt(x.valor, 10);
        });
        const reducer = (accumulator, currentValue) =>
          accumulator + currentValue;

        this.valorTotal = result.reduce(reducer);
      } else {
        this.valorTotal = 0;
      }
    }
  }
};
</script>

<style>
.content .box {
  background: #fff;
  max-width: 900px;
  box-shadow: 3px 3px 3px #cccccc;
  border-radius: 20px;
  padding: 20px;
  padding: 20px;
  margin: 50px auto;
}
.mini small {
  flex: 0 0 auto;
  margin: 0 5px;
}
.form-group .my-text.mini input[type="text"] {
  max-width: 90px;
  text-align: center;
}
.aviso {
  color: #e67319;
  font-size: 22px;
}
.containerPreview {
  margin-bottom: 10%;
}
.preview {
  height: auto;
  width: 100%;
}
.containerAviso {
}
</style>
