<template>
  <div>
    <a href="#" class="btn" data-toggle="modal" data-target="#permutoModal">Editar datos de permuta</a>

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
            <h5 class="text-center mt-4">Editar Bienes</h5>
            <hr />
            <div class="row campos text-left" v-for="(bien, index) in bienes" :key="bien.id">
              <div class="col-md-8">
                <label>
                  Bien #{{index + 1}}
                  <a href="#" @click="eliminar(index)">Eliminar</a>
                </label>
                <input type="text" v-model="bien.bien" />
              </div>
              <div class="col-md-4 text-left">
                <label>Valor del bien</label>
                <!-- <input type="text" v-model="input.valor" /> -->
                <VueNumeric currency="$" separator="." v-model="bien.valor"></VueNumeric>
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
                  <VueNumeric currency="$" separator="." v-model="inmueble.recibo_efectivo"></VueNumeric>
                </div>
              </div>
            </div>
            <div class="f1-buttons col-md-12 text-right">
              <button @click="updatePermuta" type="button" class="btn">Actualizar</button>
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
  props: ["bienes2", "datos"],
  data() {
    return {
      inmueble: this.datos,
      efectivo: true,
      suma: "",
      valorTotal: "",
      inputs: [],
      enviando: false,
      bienes: this.bienes2
    };
  },
  created() {
    this.validarValor();
  },
  methods: {
    updatePermuta() {
      // this.bienes = {
      //   recibo_efectivo: this.inmueble.recibo_efectivo
      // };
      this.validarValor();
      axios.post("/api/update-permuta", this.bienes).then(res => {
        Vue.swal("", "Actualizado correctamente", "success");
        console.log(res.data);

        // jQuery("#permutoModal").modal("hide");
        // $("body").removeClass("modal-open");
        // $(".modal-backdrop").remove();
        // toastr.success("Enviado correctamente");
      });

      axios.post("/api/editar-recibo-efectivo", this.inmueble).then(res => {
        console.log(res.data);
      });

      // this.inputs.forEach(element => {
      //   this.permutar.bienes.push(element.bien);
      //   this.permutar.valor_bien.push(element.valor_bien);
      //   console.log(element);
      // });
      // this.enviando = true;
      // axios.post("/api/permutando", this.permutar).then(res => {
      //   Vue.swal.fire("Enviado correctamente", "Tu oferta ha sido enviada");
      //   jQuery("#permutoModal").modal("hide");
      //   $("body").removeClass("modal-open");
      //   $(".modal-backdrop").remove();
      //   // toastr.success("Enviado correctamente");
      // });
    },
    add() {
      this.validarValor();
      this.bienes.push({
        bien: "",
        valor: "",
        id: null
      });
    },
    eliminar(index) {
      console.log(index);
      this.bienes.splice(index, 1);
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
      if (this.bienes.length > 0) {
        var result = this.bienes.map(function(x) {
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
.botones-azules > div {
  display: inline-block;
}
.botones-azules .btn {
  background: #005b96;
  border: 0;
  border-radius: 7px;
  margin: 5px;
}
.botones-azules .btn:hover {
  background: #f19100;
}
</style>
