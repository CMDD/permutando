require("./bootstrap");

window.Vue = require("vue");

import Router from "vue-router";
import VueSweetalert2 from "vue-sweetalert2";
Vue.use(VueSweetalert2);

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
Vue.component("publicar-inmueble", require("./perfil/publicar/Inmueble.vue"));
Vue.component("formulario-casa", require("./perfil/publicar/Casa.vue"));
Vue.component("perfil-mensajes", require("./perfil/Mensajes.vue"));
Vue.component("perfil-busco", require("./perfil/busco/index.vue"));
//Componentes Detalle
Vue.component("detalle-casa", require("./perfil/detalle/Casa.vue"));
Vue.component("detalle-bodega", require("./perfil/detalle/Bodega.vue"));
Vue.component("detalle-lote", require("./perfil/detalle/Lote.vue"));
Vue.component("detalle-oficina", require("./perfil/detalle/Oficina.vue"));
Vue.component("detalle-edificio", require("./perfil/detalle/Edificio.vue"));
Vue.component("detalle-quinta", require("./perfil/detalle/Quinta.vue"));
Vue.component("detalle-video", require("./perfil/detalle/component/Video.vue"));
Vue.component(
    "detalle-contactar",
    require("./perfil/detalle/component/Contactar.vue")
);
Vue.component(
    "detalle-permuto",
    require("./perfil/detalle/component/Permuto.vue")
);
//Mensajes
Vue.component("mensajes-lista", require("./perfil/mensaje/Lista.vue"));
Vue.component("mensajes-detalle", require("./perfil/mensaje/Detalle.vue"));

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
