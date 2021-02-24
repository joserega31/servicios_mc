<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Roles</h3>
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
                                <th class="text-left">Nombre</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in Roles" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" title="Editar" @click="editar(index)"  v-if="permiso_editar==1">
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
                    <form @submit.prevent="guardar(Rol)">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="hidden" class="form-control" id="id" required  v-model="Rol.id">
                                <label for="nombre">Nombres</label>
                                <input type="text" class="form-control" id="nombre" required  v-model="Rol.nombre" @input="Rol.nombre = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Permisos Especiales</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" type="checkbox" id="crear_utilidad_os" value="1" v-model="Rol.crear_utilidad_os">
                                    <label class="form-check-label" for="crear_utilidad_os">Ingresar Utilidad Orden de Servicio</label>
                                </div>
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
            Roles: [],
            Rol: { id: 0, nombre: "", crear_utilidad_os:0}, 
            editmodo:false,
            mensaje:"hidden",
            textomensaje:"",
            emailuser: this.user.email,
            permiso_crear:0,
            permiso_editar:0,
            permiso_eliminar:0
        };
    },
    created: function () {
        this.cargarPermisosUser();
        this.getKeeps();
    },
  methods: {
    getKeeps: function () {
      var url = "api/roles";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Roles = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/roles/${this.emailuser}`).then((res) => {
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
        this.Rol= this.Roles[id];
    },
    guardar: function(Rol){
        if (this.editmodo==false){
            if (this.permiso_crear==0){
                this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                this.mensaje="mostrar";
            }else{
                axios.post(`/api/roles`, this.Rol).then((res) => {
                    this.Roles.push(Rol);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                    this.limpiarFormulario(0);
                });
            }
        }else{
            axios.put(`/api/roles/${this.Rol.id}`, Rol)
                .then(res=>{
                const index = this.Roles.findIndex(item => item.id === Rol.id);
                this.Rol[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.limpiarFormulario(0);
            });
        }
        
    },
    eliminar: function(Rol, index){
        const confirmacion = confirm(`Eliminar el Rol ${Rol.nombre}`);
        if(confirmacion){
            axios.delete(`/api/roles/${Rol.id}`)
            .then(()=>{
                this.Roles.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    exportar: function (org) {
      var url = "api/exportarlstroles";
      window.open(url);
    },
    limpiarFormulario: function(org){
        if (org>0){
            this.textomensaje= "";
            this.mensaje="hidden";
        }
        this.editmodo= false;
        this.Rol= { id: 0, nombre: ""};
        this.cargarPermisosUser();
        this.getKeeps();
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>