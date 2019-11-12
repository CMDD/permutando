<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <a class="mobile-menu">
          <span></span>
        </a>
        <span>Mis publicaciones</span>
      </div>
    </div>

    <div class="row inmuebles">
      <div
        class="inmueble col-12 col-lg-6 col-xl-4"
        v-for="inmueble in inmuebles"
        :key="inmueble.id"
      >
        <div class="box">
          <div class="image" v-bind:style="{ backgroundImage: 'url(' + '/' + inmueble.imagen+')' }">
            <span @click="eliminarPublicacion(inmueble.id)" class="delete">&times;</span>
          </div>
          <div class="content">
            <div class="name">
              <h4>{{inmueble.tipo}}</h4>
            </div>
            <div class="group">
              <div class="item price">{{inmueble.tipo_inmueble}}</div>
              <div class="item price">{{inmueble.tipo_publicacion}}</div>
              <!-- <div class="item bath">{{inmueble.banos}} baños</div> -->
              <!-- <div class="item garage">{{inmueble.parqueadero}} parqueaderos</div> -->
            </div>
            <div class="group">
              <div class="item meters">{{inmueble.ciudad}}</div>
              <div class="item price">${{formatPrice(inmueble.valor)}}</div>
              <div>
                <a :href="'/perfil-detalle/' + inmueble.id">Ver</a>
              </div>
            </div>
          </div>
        </div>
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
      inmuebles: []
    };
  },
  created() {
    this.getInmuebles();
  },
  methods: {
    eliminarPublicacion(id) {
      Vue.swal
        .fire({
          title: "Estas seguro?",
          text: "Tu publicación será eliminada!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, Eliminar!",
          cancelButtonText: "Cancelar"
        })
        .then(result => {
          if (result.value) {
            axios.get("/api/delete-inmueble/" + id).then(res => {
              Vue.swal.fire(
                "Eliminada!",
                "Tu publicación ha sido eliminada",
                "success"
              );
              this.getInmuebles();
            });
          }
        });
    },
    getInmuebles() {
      axios.get("api/mis-inmuebles/" + this.userId).then(res => {
        this.inmuebles = res.data;
        console.log(this.inmuebles);
      });
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  }
};
</script>
