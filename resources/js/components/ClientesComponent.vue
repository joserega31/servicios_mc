<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Clientes</h3>
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
                                <th>RUC</th>
                                <th class="text-left">Raz&oacute;n Social</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in clientes" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.ruc }}</td>
                                <td>{{ item.razon_social }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" title="Editar" @click="editarCliente(index)"  v-if="permiso_editar==1">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminarCliente(item, index)" v-if="permiso_eliminar==1">
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
                        <!--div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"></p>
                        </div-->
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
                    <form @submit.prevent="guardarCliente(cliente)">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <input type="hidden" class="form-control" id="id" required  v-model="cliente.id">
                                <label for="ruc">Ruc</label>
                                <input type="text" class="form-control" id="ruc" required  v-model="cliente.ruc"  @input="cliente.ruc = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="razon_social">Raz&oacute;n Social</label>
                                <input type="text" class="form-control" id="razon_social" required  v-model="cliente.razon_social" @input="cliente.razon_social = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tarifario_id">Tarifario</label>
                                <select class="form-control" id="tarifario_id" required  v-model="cliente.tarifario_id">
                                    <option v-for="(item, index) in Tarifarios" :key="index" :value="item.id">{{ item.nombre}}</option>
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
            clientes: [],
            cliente: { id: 0, ruc: "", razon_social: "" },
            editmodo:false,
            Tarifarios: [],
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
        this.cargaTarifarios();
    },
  methods: {
    getKeeps: function () {
      var url = "api/clientes";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.clientes = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/clientes/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.permiso_crear = res.data[0].crear;
          this.permiso_editar = res.data[0].editar;
          this.permiso_eliminar = res.data[0].eliminar;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargaTarifarios: function () {
      var url = "api/tarifarios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Tarifarios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    editarCliente:function(id){
        this.editmodo= true;
        this.cliente= this.clientes[id];
    },
    guardarCliente: function(cliente){
        if (this.editmodo==false){
            if (this.permiso_crear==0){
                this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                this.mensaje="mostrar";
            }else{
                axios.post(`/api/clientes`, this.cliente).then((res) => {
                    this.clientes.push(cliente);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                    this.limpiarFormulario(0);
                });
            }
        }else{
            axios.put(`/api/clientes/${this.cliente.id}`, cliente)
                .then(res=>{
                const index = this.clientes.findIndex(item => item.id === cliente.id);
                this.cliente[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.limpiarFormulario(0);
            });
        }
    },
    eliminarCliente: function(cliente, index){
        const confirmacion = confirm(`Eliminar el cliente ${cliente.razon_social}`);
        if(confirmacion){
            axios.delete(`/api/clientes/${cliente.id}`)
            .then(()=>{
                this.clientes.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },    
    exportar: function () {
      var url = "api/exportarlstcli";
      window.open(url);
    },
    limpiarFormulario: function(org){
        if (org>0){
            this.textomensaje= "";
            this.mensaje="hidden";
        }
        this.editmodo= false;
        this.cliente= { id: 0, ruc: "", razon_social: "" };
        this.cargarPermisosUser();
        this.getKeeps();
        this.cargaTarifarios();
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
