<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Tarifarios</h3>
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
                                <th class="text-left">Vigente </th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in tarifarios" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.nombre }}</td>
                                <td>{{ item.vigented }}</td>
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
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"></p>
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
                    <form @submit.prevent="guardar(tarifario)">
                        <div class="form-row">
                            <input type="hidden" class="form-control" id="id" required  v-model="tarifario.id">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                               <input type="text" class="form-control" id="nombre" required v-model="tarifario.nombre" @input="tarifario.nombre = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombre">&nbsp;&nbsp;</label>
                                <div class="form-check">
                                    <input type="checkbox" class="checkbox" id="vigente" v-model="tarifario.vigente">
                                    <label class="form-check-label" for="vigente">Vigente</label>
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
            tarifarios: [],
            tarifario: { id: 0, nombre: null, vigente: null},
            LineasProductos: [],
            Clientes:[],
            buscliente:"",
            ocultar:"hidden",
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
      var url = "api/tarifarios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.tarifarios = res.data;
          this.buscliente= res.data.razon_social;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarLineasProd: function () {
      var url = "api/LineasProd";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.LineasProductos = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/tarifarios/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.permiso_crear = res.data[0].crear;
          this.permiso_editar = res.data[0].editar;
          this.permiso_eliminar = res.data[0].eliminar;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarClientes: function () {
      axios.get(`api/clientes/${this.tarifario.cliente}`, '0').then((res) => {
        if (res.data[0].id){
          this.Clientes = res.data;
          this.ocultar= "mostrar";
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarIdClientes: function (id, cliente) {
        this.tarifario.clientes_id= id;
        this.tarifario.cliente= cliente;
        this.ocultar= "hidden";
    },
    limpiarBusqueda: function () {
        this.ocultar= "hidden";
    },
    editar:function(id){
        this.editmodo= true;
        this.tarifario= this.tarifarios[id];
    },
    guardar: function(tarifario){
        console.log(tarifario);
        if (this.editmodo==false){
            if (this.permiso_crear==0){
                this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                this.mensaje="mostrar";
            }else{
                axios.post(`/api/tarifarios`, this.tarifario).then((res) => {
                    this.tarifarios.push(tarifario);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                });
            }
        }else{
            axios.put(`/api/tarifarios/${this.tarifario.id}`, tarifario)
                .then(res=>{
                const index = this.tarifarios.findIndex(item => item.id === tarifario.id);
                this.tarifario[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
            });
        }
        this.limpiarFormulario(0);
    },
    eliminar: function(tarifario, index){
        const confirmacion = confirm(`Eliminar el tarifario ${tarifario.nombre}`);
        if(confirmacion){
            axios.delete(`/api/tarifarios/${tarifario.id}`)
            .then(()=>{
                this.tarifarios.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    limpiarFormulario: function(org){
        if (org>0){
            this.textomensaje= "";
            this.mensaje="hidden";
        }
        this.editmodo= false;
        this.buscliente="";
        this.ocultar="hidden";
        this.tarifario= { id: 0, lineas_producto_id: null, clientes_id: null, precio:0, unidad:1};
        this.cargarPermisosUser();
        this.getKeeps();
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>