<template>
  <div>
    <a href="#" class="btn" data-toggle="modal" data-target="#contactModal">Contactar</a>
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
                <!-- <input type="hidden" class="form-control" v-model="contacto.to" />
                <input type="hidden" class="form-control" v-model="contacto.inmueble" />-->
                <textarea
                  required
                  class="form-control"
                  v-model="contacto.mensaje"
                  placeholder="Mensaje"
                ></textarea>
                <button
                  v-if="!enviando"
                  type="button"
                  class="btn"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">Descartar</span>
                </button>
                <button type="submit" class="btn btn-enviar">
                  <span v-if="!enviando">Contactar</span>
                  <span v-else>Contactando...</span>
                </button>
              </form>
            </div>

            <div class="col-md-6 box-contact text-center">
              <img src="/img/perfil-logo.png" alt />
              <p v-if="mostrar" class="text-contac">"Se ha enviado correctamente"</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["inmueble"],
  data() {
    return {
      mostrar: false,
      enviando: false,
      contacto: {
        to: this.inmueble.user_id,
        tipo_publicacion: this.inmueble.tipo_publicacion,
        inmueble: this.inmueble.id
      }
    };
  },
  methods: {
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
        this.mostrar = true;
      });

      console.log(this.contacto);
    }
  }
};
</script>

<style>
input {
  margin-top: 10px;
}
textarea {
  margin-top: 10px;
}
</style>
