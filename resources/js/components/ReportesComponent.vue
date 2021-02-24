<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Reportes</h3>
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
        this.cargarSubmenu(3);
    },
  methods: {
    cargarSubmenu: function (id) {
      axios.get(`api/submenuxusuario/${id}/${this.emailuser}`).then((res) => {
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

<!--template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Reportes</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3">
                <div class="card shadow"  @click="exportar(0)">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="#">
                            <i class="far fa-address-card"></i><br>
                            <span>Lista de Clientes</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3">
                <div class="card shadow"  @click="exportar(1)">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="#">
                            <i class="fas fa-clipboard-list"></i><br>
                            <span>Lista de Supervisores</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3">
                <div class="card shadow"  @click="exportar(2)">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i><br>
                            <span>Lista de Usuarios</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3">
                <div class="card shadow"  @click="exportar(3)">
                    <div class="card-body acc_directo">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i><br>
                            <span>Lista de Roles</span>
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
  methods: {
    exportar: function (org) {
      var url = "";
      if (org==0){
        url = "api/exportarlstcli";
      }else if(org==1){
        url = "api/exportarlstsup";
      }else if(org==2){
        url = "api/exportarlstuser";
      }else if(org==3){
        url = "api/exportarlstroles";
      }
      
      window.open(url);
    },
  }


};
</script-->