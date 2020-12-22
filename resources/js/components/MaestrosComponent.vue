<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Maestros</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3" v-for="(item, index) in subnemu" :key="index">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" :href="'/' + item.url">
                            <i :class=item.icono></i><br>
                            <span> {{ item.nombre }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
    </div>   
</template>

<script>
export default {
    props : ['user'],
    data() {
        return {
            subnemu:[],
            mensaje:"hidden",
            textomensaje:"",
            emailuser: this.user.email,
        };
    },
    created: function () {
        this.cargarSubmenu(2);
    },
  methods: {
    cargarSubmenu: function (id) {
      axios.get(`api/submenuxusuario/${id}/${this.emailuser}`).then((res) => {
          console.log(res.data);
        if (res.data){
          this.subnemu = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    }
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>