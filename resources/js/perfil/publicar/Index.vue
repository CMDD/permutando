<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <span>Publicar Inmueble</span>
      </div>
    </div>
    <div class="box">
      <form role="form" @submit.prevent="storeInmueble" class="f1">
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
                <span>Tipo de publicación</span>
                <select v-model="form.tipoPublicacion">
                  <option value>Seleccione..</option>
                  <option value="Venta">Venta</option>
                  <option value="Arriendo">Arriendo</option>
                  <option value="Permuto">Permuto</option>
                </select>
              </div>
            </div>

            <div class="form-field w50">
              <div class="my-select">
                <span>Tipo de Inmueble</span>
                <select v-model="form.tipoInmueble">
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
                  Area mts
                  <sup>2</sup>
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
                  Area Lote
                  <!-- <sup>2</sup> -->
                </span>
                <input v-model="form.area" type="text" />
              </div>
            </div>
            <div
              class="form-field"
              v-if="form.tipoInmueble == 'Edificio' || form.tipoInmueble == 'Casa Lote' 
            || form.tipoInmueble == 'Quinta' || form.tipoInmueble == 'Finca' || form.tipoInmueble == 'Hacienda'"
            >
              <div class="my-text">
                <span>
                  Area Construida
                  <!-- <sup>2</sup> -->
                </span>
                <input v-model="form.area" type="text" />
              </div>
            </div>
            <div
              class="form-field w2"
              v-if="form.tipoInmueble == 'Edificio' || form.tipoInmueble == 'Casa Lote' 
            || form.tipoInmueble == 'Quinta' || form.tipoInmueble == 'Finca' || form.tipoInmueble == 'Hacienda'"
            >
              <div class="my-checkbox">
                <span>Tipo de Construcción</span>
                <div class="form-col">
                  <input type="checkbox" v-model="form.tipo_construccion" value="Casa" id="zonas_1" />
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
                <div class="form-col">
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
                <div class="form-col">
                  <input
                    type="checkbox"
                    v-model="form.tipo_construccion"
                    value="Pozo séptico"
                    id="zonas_6"
                  />
                  <label for="zonas_6">Pozo séptico</label>
                  <input
                    type="checkbox"
                    v-model="form.tipo_construccion"
                    value="Alcantarillado"
                    id="zonas_7"
                  />
                  <label for="zonas_7">Alcantarillado</label>
                </div>
              </div>
            </div>

            <div class="form-field w50" v-if="form.tipoInmueble == 'Oficina' ">
              <div class="my-select">
                <span>Espacio</span>
                <select v-model="form.espacio">
                  <option>Seleccione..</option>
                  <option value="Abierto">Abierto</option>
                  <option value="Cerrado">Cerrado</option>
                </select>
              </div>
            </div>

            <div class="form-field w50" v-if="form.tipoInmueble == 'Edificio' ">
              <div class="my-text">
                <span>Numero de pisos</span>
                <input v-model="form.pisos" type="number" />
              </div>
            </div>

            <div class="form-field" v-if="form.tipoInmueble == 'Edificio' ">
              <div class="my-radio">
                <span>Ascensor</span>
                <input type="radio" v-model="form.ascensor" value="1" id="balcon_1" />
                <label for="balcon_1">Si</label>
                <input type="radio" v-model="form.ascensor" value="0" id="balcon_0" checked />
                <label for="balcon_0" class="no">No</label>
              </div>
            </div>

            <div class="form-field w50" v-if="form.tipoInmueble == 'Lote' ">
              <div class="my-select">
                <span>Topografía</span>
                <select v-model="form.topografia">
                  <option>Seleccione..</option>
                  <option value>....</option>
                </select>
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Lote' ">
              <div class="my-select">
                <span>Vías</span>
                <select v-model="form.vias">
                  <option>Seleccione..</option>
                  <option value>....</option>
                </select>
              </div>
            </div>

            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text">
                <span>Capacidad carga (PSI)</span>
                <input v-model="form.capacidad_carga_psi" type="text" />
              </div>
            </div>
            <div class="form-field w50" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-text">
                <span>Capacidad Luz C</span>
                <input v-model="form.capacidad_luz" type="text" />
              </div>
            </div>
            <div class="form-field" v-if="form.tipoInmueble == 'Bodega' ">
              <div class="my-radio">
                <span>Parque Industrial</span>
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
                <span>Habitaciones</span>
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
                <span>Baños</span>
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
                <span>Balcón</span>
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
                <span>Terraza</span>
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
                <span>Patio</span>
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
                <span>Portería</span>
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
                <span>Parqueadero</span>
                <input type="radio" v-model="form.parqueadero" value="1" id="parqueadero_1" />
                <label for="parqueadero_1">Si</label>
                <input type="radio" v-model="form.parqueadero" value="0" id="parqueadero_0" checked />
                <label for="parqueadero_0" class="no">No</label>
              </div>
            </div>

            <div
              class="form-field w2"
              v-if="form.tipoInmueble == 'Casa' || form.tipoInmueble == 'Apartamento' "
            >
              <div class="my-checkbox">
                <span>Zonas Comunes</span>
                <div class="form-col">
                  <input type="checkbox" v-model="form.zonas" value="Gimnasio" id="zonas_1" />
                  <label for="zonas_1">Gimnasio</label>
                  <input type="checkbox" v-model="form.zonas" value="BBQ" id="zonas_2" />
                  <label for="zonas_2">BBQ</label>
                  <input type="checkbox" v-model="form.zonas" value="Salón comunal" id="zonas_3" />
                  <label for="zonas_3">Salón comunal</label>
                </div>
                <div class="form-col">
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
            <div class="form-field w50">
              <div class="my-select">
                <span>Departamento</span>
                <select v-model="form.departamento" @change="getCiudades()">
                  <option value>Selecione...</option>
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
                <span>Ciudad / Municipio</span>
                <select v-model="form.ciudad">
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
                <span>Barrio</span>
                <input v-model="form.barrio" type="text" />
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Dirección</span>
                <input v-model="form.direccion" type="text" />
              </div>
            </div>
            <div class="form-field" v-if="form.tipoInmueble == 'Casa' ">
              <div class="my-select">
                <span>Estrato</span>
                <select v-model="form.estrato">
                  <option>--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">5</option>
                  <option value="Campestre">Campestre</option>
                </select>
              </div>
            </div>
            <textarea v-model="form.caracteristica" placeholder="Otras características"></textarea>
            <div class="form-field value">
              <span>Valor: $</span>
              <input type="text" v-model="form.valor" />
            </div>
          </div>
          <div class="f1-buttons">
            <button type="button" class="btn btn-next">Siguiente</button>
          </div>
        </fieldset>

        <fieldset>
          <h4>Más información</h4>
          <div class="form-group">
            <div class="form-field w50">
              <span>Imagen Principal</span>
              <div class="image">
                <input type="file" id="file" ref="file" @change="img" class="inputfile" />
                <label for="file">Subir</label>
              </div>
            </div>
            <div class="form-field w50">
              <span>Imágenes</span><small>(Máximo 6 imágenes)</small>
              <div class="image">
                <input type="file" id="file2" ref="file2" class="inputfile" />
                <label for="file">Subir imagen</label>
              </div>
            </div>
            <div class="form-field w50">
              <div class="my-text">
                <span>Url Video</span>
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
          <h4>Permuto</h4>
          <div class="form-group" v-if="form.tipoPublicacion === 'Permuto'">
            <div class="form-field w100">
                <div class="my-text">
                    <span>Valor del inmueble</span>
                    <input type="text" />
                </div>
            </div>
          </div>
            <div class="form-group generator" v-if="form.tipoPublicacion === 'Permuto'">
                <h5>¿Qué bienes ofrecerías?</h5>
                <div class="group-generator">
                    <div class="form-field w65">
                        <span>Bien #1</span>
                        <div class="my-text">
                            <input type="text" />
                        </div>
                    </div>
                    <div class="form-field w35">
                        <span>Valor del bien</span>
                        <div class="my-text">
                            <input type="text" />
                        </div>
                    </div>
                </div>
                <div class="form-field w50">
                    <a href="#" class="btn add">Agregar más bienes</a>
                </div>
                <div class="form-field w50">
                    <div class="my-text text-right">
                        <span>Valor total</span>
                        <input type="text" />
                    </div>
                </div>
                <div class="group-efectivo">
                    <div class="form-field w50">
                        <a href="#" class="btn">Efectivo</a>
                    </div>
                    <div class="form-field w50">
                        <div class="my-text text-right">
                            <span>Valor</span>
                            <input type="text" />
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
  data() {
    return {
      userId: userId,
      enviando: true,
      departamentos: [],
      ciudades: [],
      form: {
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
        capacidad_carga_psi: "",
        habitaciones: "",
        // Lote
        topografia: "",
        vias: "",
        // Oficina
        espacio: "",
        // Edificio
        ascensor: "",
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
        estrato: "",
        departamento: "",
        ciudad: "",
        barrio: "",
        direccion: "",
        video: ""
      }
    };
  },
  created() {
    this.getDepartamentos();
  },
  methods: {
    img(event) {
      this.form.imagePrincipal = this.$refs.file.files[0];
    },
    storeInmueble() {
      this.enviando = false;
      let fd = new FormData();
      for (var i = 0; i < this.form.zonas.length; i++) {
        fd.append("zonas[]", this.form.zonas[i]);
      }
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
      // for (var i = 0; i < this.modo.length; i++) {
      //      fd.append('modos[]',this.modo[i]);
      // }
      fd.append("area", this.form.area);

      fd.append("habitaciones", this.form.habitaciones);
      fd.append("banos", this.form.banos);
      fd.append("balcon", this.form.balcon);
      fd.append("image", this.form.imagePrincipal);
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
        console.log(res.data);
      });
    }
  }
};

$(document).on('click', '.generator .add', function(){

    var num = $('.group-generator').length + 1;

    var ids = $(this).parent().attr('data-option'),
        box_html = $('<div class="group-generator"><div class="form-field w65"><span>Bien #'+ num +'</span><div class="my-text"><input type="text" name="bien-'+ num +'" /></div></div><div class="form-field w35"><span>Valor del bien</span><div class="my-text"><input type="text" /></div></div></div>');

    box_html.hide();
    $(this).parent().before(box_html);
    box_html.fadeIn('fast');

    return false;

});

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
</style>
