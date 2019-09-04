<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
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
          <div class="image" v-bind:style="{ backgroundImage: 'url(' + '/' + inmueble.imagen+')' }"></div>
          <div class="content">
            <div class="name">
              <h4>{{inmueble.tipo}}</h4>
            </div>
            <div class="group">
              <div class="item price">Casa</div>
              <div class="item price">Permuto</div>
              <!-- <div class="item bath">{{inmueble.banos}} baños</div> -->
              <!-- <div class="item garage">{{inmueble.parqueadero}} parqueaderos</div> -->
            </div>
            <div class="group">
              <div class="item meters">Bogotá</div>
              <div class="item price">${{formatPrice(30000000)}}</div>
              <div>
                <a :href="'/perfil-detalle/' + inmueble.id">Ver</a>
                <a :href="'/perfil-detalle/' + inmueble.id">Editar</a>
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
