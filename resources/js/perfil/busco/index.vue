<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <a class="mobile-menu">
          <span></span>
        </a>
        <span>Buscar</span>
      </div>
    </div>
    <div class="row accion-buscar">
      <!-- <div class="col-2">
        <div class="modo">
          <label>
            <input type="radio" name="modo" checked /> Mapa
          </label>
          <label>
            <input type="radio" name="modo" /> Lista
          </label>
        </div>
      </div>-->
      <div class="col-10">
        <form @submit.prevent="getInmueble()">
          <select v-model="busco.tipo" @change="getTipo()">
            <option value>Que buscas?</option>
            <option value="Apartamento">Apartamento</option>
            <option value="Casa">Casa</option>
            <option value="Bodega">Bodega</option>
            <option value="Lote">Lote</option>
            <option value="Oficina">Oficina</option>
            <option value="Edificio">Edificio</option>
            <option value="Casa Lote">Casa Lote</option>
            <option value="Quinta">Quinta</option>
            <option value="Finca">Finca</option>
            <option value="Hacienda">Hacienda</option>
          </select>

          <select required v-model="busco.en" @change="getEn()">
            <option value>En...?</option>
            <option value="Arriendo">Arriendo</option>
            <option value="Venta">Venta</option>
            <option value="Permuto">Permuta</option>
          </select>

          <select required v-model="busco.departamento" @change="getCiudades()">
            <option value>Departamento</option>
            <option v-bind:value="dep.id" v-for="dep in departamentos" :key="dep.id">{{dep.nombre}}</option>
          </select>
          <select required v-model="busco.ciudad">
            <option value>Ciudad</option>
            <option
              v-bind:value="ciudad.id"
              v-for="ciudad in ciudades"
              :key="ciudad.id"
            >{{ciudad.nombre}}</option>
          </select>
          <button type="submit" class="btn">Buscar</button>
          <!-- <input type="text" placeholder="Barrio" />
          <input type="text" placeholder="Precio" />-->
        </form>
      </div>
    </div>
  </div>
</template>
<script>
if (document.getElementById("userId")) {
  var userId = document.getElementById("userId").value;
} else {
}

export default {
  data() {
    return {
      userId: userId,
      zoom: 7,
      inmuebles: [],
      departamentos: [],
      ciudades: [],
      resultadoIndex: [],
      busco: {
        tipo: "",
        en: "",
        departamento: "",
        ciudad: ""
      }
    };
  },
  created() {
    this.getDepartamentos();
    this.getInmuebleAll();
  },
  methods: {
    getInmuebleAll() {
      axios.get("api/buscarAll").then(res => {
        this.resultadoIndex = res.data;
        console.log(res.data);

        this.cargarMap(this.resultadoIndex, 6);
      });
    },
    getTipo() {
      axios.get("/api/buscar-tipo/" + this.busco.tipo).then(res => {
        this.resultadoIndex = res.data;
        console.log(res.data);

        this.cargarMap(this.resultadoIndex, 7);
      });
    },
    getDepartamento() {
      axios.post("/api/buscar-departamento", this.busco).then(res => {
        this.resultadoIndex = res.data;
        this.cargarMap(this.resultadoIndex, 10);
      });
    },
    getEn() {
      axios.post("/api/buscar-en", this.busco).then(res => {
        this.resultadoIndex = res.data;
        this.cargarMap(this.resultadoIndex, 8);
      });
    },
    getDepartamentos() {
      axios.get("/api/departamentos").then(res => {
        this.departamentos = res.data;
      });
    },
    getCiudades() {
      axios.get("/api/ciudades/" + this.busco.departamento).then(res => {
        this.ciudades = res.data;
      });
      this.getDepartamento();
    },
    getInmueble() {
      axios.post("/api/busco-index", this.busco).then(res => {
        this.resultadoIndex = res.data;
        this.cargarMap(this.resultadoIndex, 11);
      });
    },
    cargarMap(direcciones, zoom) {
      var map;
      var geocoder;
      geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();
      map = new google.maps.Map(document.getElementById("mymap"), {
        center: { lat: 4.5318681, lng: -74.297333 },
        zoom: zoom
      });
      for (let index = 0; index < direcciones.length; index++) {
        geocoder.geocode(
          {
            address:
              "Colombia" +
              direcciones[index].ciudad +
              direcciones[index].barrio +
              direcciones[index].direccion
          },

          function(results, status) {
            if (status == "OK") {
              //Orientar cerca el marcador
              // console.log(direcciones[index].direccion);
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
              });
              google.maps.event.addListener(marker, "click", function() {
                let val = (direcciones[index].valor / 1)
                  .toFixed(0)
                  .replace(".", ",")
                  .toString()
                  .replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                var contentString =
                  '<div id="content">' +
                  "<p class='title-map'>" +
                  direcciones[index].tipo_inmueble +
                  "</p>" +
                  "<p class='title-map'>" +
                  direcciones[index].tipo_publicacion +
                  "</p>" +
                  "<p class='valor-map'>Precio $" +
                  val +
                  "</p>" +
                  '<a href="/perfil-detalle/' +
                  direcciones[index].id +
                  '" >Detalle</a>' +
                  "</div>";
                // infowindow.setContent(direcciones[index].tipo +' $' + direcciones[index].valor   );
                infowindow.setContent(contentString);
                infowindow.open(map, this);
              });
            } else {
              alert("Error al mostrar Inmuebles: " + status);
            }
          }
        );
      }
    },
    //Buscador
    infoInmueble(id) {
      axios.get("api/info-inmueble/" + id).then(res => {
        this.info = res.data;
        console.log(this.info);
      });
    }
  }
};
</script>

<style>
.modo {
  background: #fff;
  display: inline-block;
  vertical-align: middle;
  border-radius: 10px;
  padding: 5px 10px 5px;
  line-height: 1.5;
}
.modo label {
  margin: 0 5px;
}
.mapa {
  height: calc(100vh - 3rem);
}
.title-map {
  color: rgb(102, 100, 100);
  font-size: 15px;
  font-weight: bold;
  margin: 0% 0% 4% 0%;
}
.valor-map {
  color: rgb(102, 100, 100);
  font-size: 12px;
}
</style>

