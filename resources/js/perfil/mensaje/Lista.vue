<template>
<div class="row msg">
    <div class="col-md-3 list">
        <div class="user" v-for="mensaje in mensajes" :key="mensaje.id"  @click="getMensaje(mensaje.id)">
            <div class="img"></div><div class="info">
                <span class="name">{{ mensaje.from }}</span
                ><span class="type">Permuta</span>
            </div>
        </div>
    </div>
      <mensajes-detalle :mensaje="mensaje"></mensajes-detalle>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                mensajes: [],
                mensaje:[],
            };
        },
        created() {
            this.getMensajes();
        },
        methods: {
            getMensaje(id){
              axios.get("api/mensaje/" + id).then(res => {
                    this.mensaje = res.data;
                });
              
            },
            getMensajes() {
                axios.get("api/mensajes/" + 1).then(res => {
                    this.mensajes = res.data;
                });
            }
        }
    };
</script>
