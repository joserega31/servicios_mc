<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-dark mb-4">Reportes</h3>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="fecha_desde">Fecha Desde</label>
                                <input type="date" class="form-control" id="fecha_desde" required v-model="filtro.fecha_desde">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="fecha_hasta">Fecha Hasta</label>
                                <input type="date" class="form-control" id="fecha_hasta" required v-model="filtro.fecha_hasta">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ingenio_id">Ingenios</label>
                                <select class="form-control" id="ingenio_id" required  v-model="filtro.ingenio_id" @change="llenardesingenio($event)">
                                    <option v-for="(item, index) in Ingenios" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 mb-3" v-for="(item, index) in subnemu" :key="index">
                <div class="card shadow">
                    <div class="card-body acc_directo">
                        <a class="nav-link" :href="'#'" @click="cargarReporte(item.url, item.parametros)">
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
            filtro:{fecha_desde: null, fecha_hasta:null, ingenio_id:null},
            mensaje:"hidden",
            textomensaje:"",
            emailuser: this.user.email,
            Ingenios:[],
            crear_utilidad_os:"",
            des_ing:""
        };
    },
    created: function () {
        this.cargarSubmenu(3);
        this.cargaringenios();
        this.cargarPermisosUser();
        
        var fecha = new Date(); 
        var mes = fecha.getMonth()+1; 
        var dia = fecha.getDate(); 
        var ano = fecha.getFullYear(); 
        if(dia<10){
            dia='0'+dia; 
        }
        if(mes<10){
            mes='0'+mes;
        }
        this.filtro.fecha_desde= ano+"-"+mes+"-"+dia;
        this.filtro.fecha_hasta= ano+"-"+mes+"-"+dia;

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
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/servicio/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.crear_utilidad_os = res.data[0].crear_utilidad_os;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargaringenios: function () {
      var url = "api/ingenios";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.Ingenios = res.data;
        }else{
          console.log("No se encontro registros de Ingenios");
        }
      });
    },
    llenardesingenio: function(event){
        this.des_ing= event.target.options[event.target.options.selectedIndex].text;
    },
    cargarReporte: function(url, p){
        if (p==1){
            window.open('api/'+ url + '/' + this.filtro.fecha_desde + '/' + this.filtro.fecha_hasta + '/' + this.filtro.ingenio_id + '/' + this.des_ing + '/' + this.crear_utilidad_os, '_blank');
        }else{
            window.open('api/'+ url, '_blank');
        }
        
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