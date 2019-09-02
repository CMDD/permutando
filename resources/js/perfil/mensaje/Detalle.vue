<template>
  <div class="col-md-9 chat"  v-if="mensaje.mensaje">
    <div class="from" >
      <span>T</span>{{mensaje.mensaje}}
    </div>
    <!-- <div class="to">
      <span>Yo</span>Lorem ipsum dolor sit amet, consectetur
      adipiscing elit. Etiam nisl lectus, lobortis interdum arcu
      vel, mattis elementum ex. Cras posuere, ligula in fermentum
      tincidunt, erat metus finibus massa, ac mollis nulla ex a
      leo. Ut tempus tortor sit amet consectetur vulputate.
    </div> -->
    <form class="send"><input type="text" class="form-control" /><button type="submit" class="btn">Enviar</button>
    </form>
  </div>
</template>

<script>
export default {
    props: ["mensaje"],
  data() {
    return {
    };
  },
  created() {
  },
};
</script>