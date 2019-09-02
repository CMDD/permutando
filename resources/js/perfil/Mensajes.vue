<template>
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 content">
    <div class="row title">
      <div class="col">
        <span>Mis Mensajes</span>
      </div>
    </div>
    <div class="row subtitle">
      <!-- <div class="col">
                <span>Permuta entre: Terry y yo</span>
      </div>-->
    </div>

    <mensajes-lista :userId="userId"></mensajes-lista>
  </div>
</template>

<script>
if (document.getElementById("userId")) {
  var userId = document.getElementById("userId").value;
} else {
}
export default {
  data() {
    return {
      userId: userId,
      inmuebles: []
    };
  },
  created() {
    this.getInmuebles();
  },
  methods: {
    getInmuebles() {
      axios.get("api/mis-inmuebles/" + this.userId).then(res => {
        this.inmuebles = res.data;
      });
    }
  }
};
</script>

<style>
.map {
  display: none;
}
html,
body,
#app,
.container-fluid,
.container-fluid > div {
  height: 100%;
}
.msg {
  height: calc(100vh - 6rem);
}
.msg .list {
  background: #edeeed;
  overflow-y: auto;
  height: 100%;
  padding: 0;
  box-shadow: 1px 0px 10px 0px rgba(0, 0, 0, 0.3);
  z-index: 1;
}
.msg .list .user {
  display: block;
  padding: 15px 10%;
  cursor: pointer;
}
.msg .list .user.active,
.msg .list .user:hover {
  background: #dae2e7;
}
.msg .user .img {
  display: inline-block;
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #005c96;
}
.msg .user .info {
  display: inline-block;
  vertical-align: middle;
  width: calc(100% - 50px);
  padding-left: 20px;
}
.msg .info span {
  display: block;
  color: #005c96;
  letter-spacing: 1px;
}
.msg .info span.type {
  font-weight: 700;
  font-size: 0.8rem;
}

.msg .chat {
  background: #fff;
  overflow-y: auto;
  height: 100%;
  position: relative;
}
.msg .chat .from,
.msg .chat .to {
  display: block;
  position: relative;
  margin: 30px;
  padding: 30px;
  border-radius: 10px;
}
.msg .chat .from span,
.msg .chat .to span {
  position: absolute;
  width: 48px;
  line-height: 40px;
  background: #e67319;
  color: #fff;
  text-align: center;
  top: -20px;
  left: -20px;
  border-radius: 50%;
  border: 4px solid #fff;
  font-weight: 700;
}
.msg .chat .from span {
  background: #005c96;
}
.msg .chat .from {
  background: #b0cbe1;
  color: #386386;
}
.msg .chat .to {
  background: #fbd8af;
  color: #8e663a;
}
.msg .chat .send {
  margin: 30px 30px 60px 30px;
}
.msg .send input {
  display: inline-block;
  vertical-align: middle;
  border-color: #e67319;
  border-radius: 5px 0 0 5px;
  width: calc(100% - 100px);
}
.msg .send input:focus {
  box-shadow: none;
}
.msg .send .btn {
  display: inline-block;
  vertical-align: middle;
  width: 100px;
  background: #e67319;
  color: #fff;
  border-radius: 0 5px 5px 0;
}
.msg .send .btn:hover {
  color: rgba(255, 255, 255, 0.6);
}
</style>
