<template>
<div class="row msg">
    <div class="col-md-3 list">
        <div class="user" v-for="mensaje in mensajes" :key="mensaje.id"  @click="getMensaje(mensaje.id)">
            <div class="img"></div><div class="info">
                <span class="name">{{ mensaje.nombre }}</span
                ><span class="type">{{mensaje.tipo}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-9 chat" v-if="mensaje.mensaje">
    <div class="from" v-if="mensaje.tipo =='Mensaje'">
      <span>M</span>
      <div class="row">
          <div class="col-md-6">
                <p>Nombre: {{mensaje.nombre}}</p>
                <p>Télefono: {{mensaje.tel}}</p>
                <p>Email: {{mensaje.email}}</p>
                <p>Mensaje:{{mensaje.mensaje}}</p>

          </div>
          
      </div>
      
    </div>
    <div class="from" v-else>
      <span>M</span>
      <div class="row">
          <div class="col-md-6">
                <p>Nombre: {{mensaje.nombre}}</p>
                <p>Télefono: {{mensaje.tel}}</p>
                <p>Email: {{mensaje.email}}</p>
                <p>Mensaje:{{mensaje.mensaje}}</p>
          </div>
          <div class="col-md-6">
              <h4>Permuto por:</h4>
              <div v-for="bien in bienes" :key="bien.id">
                <p>{{bien.bien}} : ${{bien.valor}}</p>
              </div>  
          </div>
      </div>
    </div>
<!-- 
    <div class="to">
      <span>Yo</span>Lorem ipsum dolor sit amet, consectetur
      adipiscing elit. Etiam nisl lectus, lobortis interdum arcu
      vel, mattis elementum ex. Cras posuere, ligula in fermentum
      tincidunt, erat metus finibus massa, ac mollis nulla ex a
      leo. Ut tempus tortor sit amet consectetur vulputate.
    </div>
     <form class="send"><input type="text" class="form-control" /><button type="submit" class="btn">Enviar</button>
    </form> -->
  </div>
    
      
    </div>
</template>
<script>
    export default {
        props:['userId'],
        data() {
            return {
                mostrar:false,
                mensajes: [],
                mensaje:[],
                bienes:[],
                
            };
        },
        created() {
        console.log(this.user);
            this.getMensajes();
        },
        methods: {
            getBienes(mensaje) {
                let datos = {
                    tipo:'Ofrezco',
                    mensaje: mensaje,
                }
                axios.post("/api/bienes-tipo", datos).then(res => {
                    this.bienes = res.data;                   
                    console.log(res.data);
                });
                },
           
            getMensaje(id){
              axios.get("api/mensaje/" + id).then(res => {
                    this.mensaje = res.data;
                    this.mostrar= true;
                    this.getBienes(this.mensaje);
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
