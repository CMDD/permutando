<template>
  <div class="col-md-9 chat" v-if="mensaje.mensaje">
    <div class="from" v-if="mensaje.tipo =='Mensaje'">
      <span>M</span>
      <p>Nombre: {{mensaje.nombre}}</p>
      <p>Télefono: {{mensaje.tel}}</p>
      <p>Email: {{mensaje.email}}</p>
      <p>Mensaje:{{mensaje.mensaje}}</p>
    </div>
    <div class="from" v-else>
      <span>M</span>
      <p>Nombre: {{mensaje.nombre}}</p>
      <p>Télefono: {{mensaje.tel}}</p>
      <p>Email: {{mensaje.email}}</p>
      <p>Mensaje:{{mensaje.mensaje}}</p>
    </div>

    <!-- <div class="to">
      <span>Yo</span>Lorem ipsum dolor sit amet, consectetur
      adipiscing elit. Etiam nisl lectus, lobortis interdum arcu
      vel, mattis elementum ex. Cras posuere, ligula in fermentum
      tincidunt, erat metus finibus massa, ac mollis nulla ex a
      leo. Ut tempus tortor sit amet consectetur vulputate.
    </div>-->
    <!-- <form class="send"><input type="text" class="form-control" /><button type="submit" class="btn">Enviar</button>
    </form>-->
  </div>
</template>

<script>
export default {
  props: ["mensaje"],
  data() {
    return {
      bien: [],
      datos: {
        tipo: "Ofrezco",
        inmueble: this.mensaje
      }
    };
  },
  created() {
    this.getBienes();
  },
  methods: {
    getBienes() {
      axios.post("/api/bienes-tipo", this.datos).then(res => {
        this.bienes = res.data;
        console.log(res.data);
      });
    }
  }
};
</script>