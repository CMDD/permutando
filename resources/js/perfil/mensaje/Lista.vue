<template>
<div class="row msg">
    <div class="col-md-3 list">
        <div class="user" v-for="mensaje in mensajes" :key="mensaje.id"  @click="getMensaje(mensaje.id)">
            <div class="img"></div><div class="info">
                <span class="name">{{ mensaje.nombre }}</span
                ><span class="type">Mensaje</span>
            </div>
        </div>
    </div>
      <mensajes-detalle :mensaje="mensaje"></mensajes-detalle>
    </div>
</template>
<script>
    export default {
        props:['userId'],
        data() {
            return {
                mensajes: [],
                mensaje:[],
            };
        },
        created() {
        console.log(this.user);
            this.getMensajes();
        },
        methods: {
            getMensaje(id){
              axios.get("api/mensaje/" + id).then(res => {
                    this.mensaje = res.data;
                });
              
            },
            getMensajes() {
                axios.get("api/mensajes/" + this.userId).then(res => {
                    this.mensajes = res.data;
                });
            }
        }
    };
</script>
