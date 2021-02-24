<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Supervisores</h3>
        <div class="alert alert-success w-100" role="alert" :class="mensaje">
            {{textomensaje}}
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>DNI</th>
                                <th class="text-left">Nombre Apellido</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in supervisores" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.dni }}</td>
                                <td>{{ item.nombres + " " + item.apellidos }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" title="Editar" @click="editar(index)" v-if="permiso_editar==1">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminar(item, index)" v-if="permiso_eliminar==1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-success" title="Exportar" @click="exportar()">
                                <i class="far fa-file-excel"></i> Exportar
                            </button>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
            </div>
        </div>
        <br>
        <br>
        
        <div class="card shadow">
            <div class="card-body">
                    <form @submit.prevent="guardar(supervisor)">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" class="form-control" id="id" required  v-model="supervisor.id">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" required  v-model="supervisor.dni" @input="supervisor.dni = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombres</label>
                                <input type="text" class="form-control" id="nombre" required  v-model="supervisor.nombres"  @input="supervisor.nombres = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" required  v-model="supervisor.apellidos" @input="supervisor.apellidos = $event.target.value.toUpperCase()">
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="numcuenta">N&uacute;mero de Cuenta</label>
                                <input type="text" class="form-control" id="numcuenta" required  v-model="supervisor.numcuenta" @input="supervisor.numcuenta = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cci">CCI</label>
                                <input type="text" class="form-control" id="cci" required  v-model="supervisor.cci" @input="supervisor.cci = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="banco">Banco</label>
                                <input type="text" class="form-control" id="banco" required  v-model="supervisor.banco" @input="supervisor.banco = $event.target.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="supervisores_id">Usuario</label>
                                <select class="form-control" id="usuario_id" required  v-model="supervisor.usuario_id">
                                    <option v-for="(item, index) in usuarios" :key="index" :value="item.id">{{ item.name}}</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="buttom" class="btn btn-default" @click="limpiarFormulario(1)">Limpiar</button>
                    </form>
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
            supervisores: [],
            supervisor: { id: 0, dni: "", nombres: "", apellidos: "", numcuenta: "", cci: "", banco: "", usuario_id:null},
            editmodo:false,
            mensaje:"hidden",
            textomensaje:"",
            usuarios: [],
            usuario: { id: 0, name: "", email: "", rol_id: 0, rol:"", password:"", reppassword:""},
            emailuser: this.user.email,
            permiso_crear:0,
            permiso_editar:0,
            permiso_eliminar:0
        };
    },
    created: function () {
        this.cargarPermisosUser();
        this.getKeeps();
        this.cargarUsuarios();
    },
  methods: {
    getKeeps: function () {
      var url = "api/supervisores";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.supervisores = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarUsuarios: function () {
      var url = "api/usuarios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.usuarios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/supervisores/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.permiso_crear = res.data[0].crear;
          this.permiso_editar = res.data[0].editar;
          this.permiso_eliminar = res.data[0].eliminar;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    editar:function(id){
        this.editmodo= true;
        this.supervisor= this.supervisores[id];
    },
    guardar: function(supervisor){
        if (supervisor.dni.length>8){
            alert('DNI invalido');
        }else{
            if (this.editmodo==false){
                if (this.permiso_crear==0){
                    this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                    this.mensaje="mostrar";
                }else{
                    axios.post(`/api/supervisores`, this.supervisor).then((res) => {
                        console.log(res.data);
                        this.supervisores.push(supervisor);
                        this.textomensaje= "Se ha creado Exitosamente";
                        this.mensaje="mostrar";
                    });
                }
            }else{
                axios.put(`/api/supervisores/${this.supervisor.id}`, supervisor)
                    .then(res=>{
                    const index = this.supervisores.findIndex(item => item.id === supervisor.id);
                    this.supervisor[index] = res.data;
                    this.textomensaje= "Se ha actualizado Exitosamente";
                    this.mensaje="mostrar";
                });
            }
            this.limpiarFormulario(0);
        }
    },
    eliminar: function(supervisor, index){
        const confirmacion = confirm(`Eliminar el supervisor ${supervisor.nombres + " " + supervisor.apellidos}`);
        if(confirmacion){
            axios.delete(`/api/supervisores/${supervisor.id}`)
            .then(()=>{
                this.supervisores.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    exportar: function (org) {
      var url = "api/exportarlstsup";
      window.open(url);
    },
    limpiarFormulario: function(org){
        if (org>0){
            this.textomensaje= "";
            this.mensaje="hidden";
        }
        this.editmodo= false;
        this.supervisor= { id: 0, dni: "", nombres: "", apellidos: "", numcuenta: "", cci: "", banco: ""};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
