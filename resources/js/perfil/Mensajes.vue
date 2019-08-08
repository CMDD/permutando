<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <span>Mis Mensajes</span>
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
    }
  }
};
</script>
