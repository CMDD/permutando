require("./bootstrap");

window.Vue = require("vue");

import Router from "vue-router";

Vue.use(Router);

Vue.component("lista-usuarios", require("./admin/Usuarios.vue"));
Vue.component("lista-inmuebles", require("./admin/Inmueble.vue"));
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue")
);

//Web
Vue.component("form-inmueble", require("./web/Form.vue"));
Vue.component("web-index", require("./web/Index.vue"));
Vue.component("tengo", require("./web/Tengo.vue"));
Vue.component("busco", require("./web/Busco.vue"));
Vue.component("maps", require("./web/Maps.vue"));
//Perfil
Vue.component("publicaciones", require("./perfil/Publicaciones.vue"));
Vue.component("inmueble-detalle", require("./perfil/Detalle.vue"));
Vue.component("publicar-inmueble", require("./perfil/publicar/Index.vue"));
Vue.component("formulario-casa", require("./perfil/publicar/Casa.vue"));

let router = new Router({
    routes: [
        {
            path: "/publicaciones",
            name: "/publicaciones",
            component: require("./perfil/Publicaciones").default
        }
    ]
    // linkExactActiveClass: "active"
    // mode: 'history',
});

const app = new Vue({
    el: "#app",
    router
});
