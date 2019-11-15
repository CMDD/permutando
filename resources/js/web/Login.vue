<template>
  <div>
    <div class="row links">
      <div class="col-md-6 orange">
        <img src="/img/icon-busco.png" />
        <h2>¿Buscas una propuesta?</h2>
        <p>
          Selecciona los inmuebles que te interesan y comieza una
          negociación.
        </p>
        <a href="#" data-toggle="modal" @click="showModal('/perfil-buscar')" class="btn">Busco</a>
      </div>
      <div class="col-md-6 white">
        <img src="/img/icon-vendo.png" />
        <h2>¿Tienes una propuesta?</h2>
        <p>Sube tus inmuebles y comieza una negociación.</p>
        <a href="#" @click="showModal('/perfil-publicar')" class="btn">Tengo</a>
      </div>
    </div>

    <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div id="accordionLogin" class="modal-body accordion">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="card">
              <div
                id="headRegister"
                class="card-header"
                data-toggle="collapse"
                data-target="#register"
                aria-expanded="true"
                aria-controls="register"
              >Regístrate para ver y publicar ofertas</div>
              <div
                id="register"
                class="collapse show"
                aria-labelledby="headRegister"
                data-parent="#accordionLogin"
              >
                <div class="card-body">
                  <form @submit.prevent="registro">
                    <a href="#" class="btn fb">Iniciar sesión con Facebook</a>
                    <a href="/auth/google" class="btn gl">Iniciar sesión con Google</a>
                    <input
                      type="text"
                      required
                      v-model="form.name"
                      class="form-control mb-2"
                      placeholder="Nombre"
                    />
                    <!--<input type="text" name="tel" class="form-control mb-3" placeholder="Tel/Cel">-->
                    <input
                      type="email"
                      required
                      v-model="form.email"
                      class="form-control mb-2"
                      placeholder="Correo electrónico"
                    />
                    <input
                      type="password"
                      required
                      v-model="form.password"
                      class="form-control mb-2"
                      placeholder="Contraseña"
                    />
                    <div class="tipo">
                      <span>¿Eres inmobiliario?</span>
                      <div class="radio-custom">
                        <label>
                          <input type="radio" v-model="form.inmobiliario" value="Si" />
                          <span class="checkmark">Si</span>
                        </label>
                        <label>
                          <input type="radio" v-model="form.inmobiliario" value="No" />
                          <span class="checkmark">No</span>
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn">Regístrate</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div
                id="headLogin"
                class="card-header"
                data-toggle="collapse"
                data-target="#login"
                aria-expanded="true"
                aria-controls="login"
              >
                ¿Tienes una cuenta?
                <span>Entrar</span>
              </div>
              <div
                id="login"
                class="collapse"
                aria-labelledby="headLogin"
                data-parent="#accordionLogin"
              >
                <div class="card-body">
                  <form @submit.prevent="login">
                    <a href="#" class="btn fb">Iniciar sesión con Facebook</a>
                    <a href="/auth/google" class="btn gl">Iniciar sesión con Google</a>
                    <input
                      type="email"
                      required
                      v-model="form.email"
                      class="form-control mb-2"
                      placeholder="Correo electrónico"
                    />
                    <input
                      type="password"
                      required
                      v-model="form.password"
                      class="form-control mb-2"
                      placeholder="Contraseña"
                    />
                    <button type="submit" class="btn">Iniciar sesión</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      to: "/perfil-buscar",
      form: {
        web: "no"
      }
    };
  },
  methods: {
    showModal(value) {
      if (this.user != 0) {
        window.location.href = value;
      } else {
        $("#loginModal").modal("show");
        this.to = value;
      }
    },
    registro() {
      axios.post("registro", this.form).then(res => {
        if (res.data == 200) {
          window.location.href = this.to;
        } else {
          Vue.swal.fire("", "Verifica tus datos");
        }
      });
    },
    login() {
      axios.post("autenticar", this.form).then(res => {
        if (res.data == 200) {
          window.location.href = this.to;
        } else {
          Vue.swal.fire("", "Verifica tus datos", "info");
        }
      });
    }
  }
};
</script>
