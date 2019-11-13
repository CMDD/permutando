<template>
  <div>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#permutoModal">Permutar</a>

    <div id="permutoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group main-group">
              <img src="/img/perfil-logo.png" />
              <label class="icono">Valor de inmueble</label>
              <VueNumeric currency="$" separator="." v-model="inmueble.valor" disabled></VueNumeric>
              <!-- <input type="text" disabled v-model="inmueble.valor" /> -->
            </div>
            <h5 class="text-center mt-4">¿Qué bienes ofrecerías?</h5>
            <hr />
            <div class="row campos text-left" v-for="(input, index) in inputs" :key="input.id">
              <div class="col-md-8">
                <label>
                  Bien #{{index + 1}}
                  <a href="#" @click="eliminar(index)">Eliminar</a>
                </label>
                <input type="text" v-model="input.bien" />
              </div>
              <div class="col-md-4 text-left">
                <label>Valor del bien</label>
                <!-- <input type="text" v-model="input.valor" /> -->
                <VueNumeric currency="$" separator="." v-model="input.valor_bien"></VueNumeric>
              </div>
            </div>

            <div class="row total mt-4">
              <div class="col-md-6">
                <a href="#" @click="add()" class="btn">Agregar inmuebles</a>
                <a href="#" class="btn" @click="addEfectivo()">Efectivo</a>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Valor total:</label>
                  <!-- <input type="text" /> -->
                  <VueNumeric currency="$" separator="." v-model="valorTotal" disabled></VueNumeric>
                </div>
                <div class="form-group" v-if="!efectivo">
                  <label>Efectivo:</label>
                  <VueNumeric currency="$" separator="." v-model="permutar.efectivo"></VueNumeric>
                </div>
              </div>
            </div>
            <div class="f1-buttons col-md-12 text-right">
              <button @click="permutando" type="button" class="btn">Ofertar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import VueNumeric from "vue-numeric";

export default {
  components: {
    VueNumeric
  },
  props: ["inmueble", "user"],
  data() {
    return {
      efectivo: true,
      valorTotal: "",
      inputs: [],
      enviando: false,
      permutar: {
        bienes: [],
        valor_bien: [],
        user: this.user,
        to: this.inmueble.user_id,
        inmueble: this.inmueble.id,
        tipo: this.inmueble.tipo_publicacion
      }
    };
  },
  methods: {
    permutando() {
      this.inputs.forEach(element => {
        this.permutar.bienes.push(element.bien);
        this.permutar.valor_bien.push(element.valor_bien);
        console.log(element);
      });
      this.enviando = true;
      axios.post("/api/permutando", this.permutar).then(res => {
        console.log(res.data);
        Vue.swal.fire("Enviado correctamente", "Tu oferta ha sido enviada");
        $("#permutoModal").modal("hide");
        // toastr.success("Enviado correctamente");
      });
    },
    add() {
      this.validarValor();
      this.inputs.push({
        bien: "",
        valor_bien: ""
      });
    },
    eliminar(index) {
      console.log(index);
      this.inputs.splice(index, 1);
      this.validarValor();
    },
    addEfectivo() {
      this.validarValor();

      let result2 = parseInt(this.inmueble.valor) / 2 + 1;
      console.log(result2);

      if (this.valorTotal >= result2) {
        this.efectivo = false;
      } else {
        this.efectivo = true;
        Vue.swal.fire(
          "Ten en cuenta que si elijes ésta opción, solo podrás añadir dinero en efectivo, una vez hayas completado en el formulario más del 50% del valor de tu propiedad en bienes"
        );
      }
    },

    validarValor() {
      if (this.inputs.length > 0) {
        var result = this.inputs.map(function(x) {
          return parseInt(x.valor_bien, 10);
        });

        const reducer = (accumulator, currentValue) =>
          accumulator + currentValue;

        this.valorTotal = result.reduce(reducer);
      } else {
        this.permutar.valorTotal = 0;
      }
    }
  }
};
</script>

<style>
.modal-content {
  border-radius: 15px;
  color: #005b95;
}
.modal .main-group {
  align-items: center;
}
.modal .main-group img {
  max-width: 100px;
  margin-right: 20px;
}
.modal .main-group input {
  width: 50%;
  text-align: center;
  background-color: rgba(0, 90, 149, 0.2);
  font-weight: 600;
  font-size: 18px;
  border-radius: 50px;
}
.modal .main-group label {
  font-size: 20px;
  font-weight: bold;
  margin: 0;
}
.modal .campos label {
  margin: 0;
}
.modal .campos > div {
  margin-top: 10px;
}
.modal .total .btn {
  display: block;
  max-width: 200px;
  margin-bottom: 10px;
}
.modal .btn {
  border-radius: 4px;
}
.swal2-popup {
  font-size: 0.6rem !important;
}
.campos a {
  color: red;
  margin-left: 10px;
  font-size: 0.8rem;
}
</style>
