<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Almacenes</h3>
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
                                <th class="text-left">Ingenio</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in almacenes" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.nombre_almacen }}</td>
                                <td>{{ item.ingenio }}</td>
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
                    <form @submit.prevent="guardar(almacen)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre_almacen">Nombre</label>
                                <input class="form-control" type="text" id="nombre_almacen" name="nombre_almacen" v-model="almacen.nombre_almacen" required @input="almacen.nombre_almacen = $event.target.value.toUpperCase()"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ingenios_id">Ingenios</label>
                                <select class="form-control" id="ingenios_id" required  v-model="almacen.ingenios_id">
                                    <option v-for="(item, index) in Ingenios" :key="index" :value="item.id">{{ item.nombre }}</option>
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
            almacenes: [],
            almacen: { id: 0, ingenios_id: null, nombre_almacen: null, ingenio:""},
            Ingenios: [],
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
        this.cargarIngenios();
    },
  methods: {
    getKeeps: function () {
      var url = "api/almacenes";
      axios.get(url).then((res) => {
        if (res.data){
          this.almacenes = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/almacenes/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.permiso_crear = res.data[0].crear;
          this.permiso_editar = res.data[0].editar;
          this.permiso_eliminar = res.data[0].eliminar;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarIngenios: function () {
      var url = "api/ingenios";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.Ingenios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    editar:function(id){
        this.editmodo= true;
        this.almacen= this.almacenes[id];
    },
    guardar: function(almacen){
        if (this.editmodo==false){
            if (this.permiso_crear==0){
                this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                this.mensaje="mostrar";
            }else{
                axios.post(`/api/almacenes`, almacen).then((res) => {
                    this.almacenes.push(almacen);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                });
            }
        }else{
            axios.put(`/api/almacenes/${this.almacen.id}`, almacen)
                .then(res=>{
                const index = this.almacenes.findIndex(item => item.id === almacen.id);
                this.almacen[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
            });
        }
        this.limpiarFormulario(0);
    },
    eliminar: function(almacen, index){
        const confirmacion = confirm(`Eliminar el almacen numero:  ${almacen.id}`);
        if(confirmacion){
            axios.delete(`/api/almacenes/${almacen.id}`)
            .then(()=>{
                this.almacenes.splice(index, 1);
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
        this.almacen= { id: 0, supervisores_id: null, ingenios_id: null, fecha_inicio:null, fecha_fin:null}
        this.getKeeps();
        this.cargarIngenios();
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>