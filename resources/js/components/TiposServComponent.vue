<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Tipos de Servicios</h3>
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
                            <tr v-for="(item, index) in TipoServicios" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" title="Editar" @click="editar(index)">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminar(item, index)">
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
                    <form @submit.prevent="guardar(TipoServicio)">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" class="form-control" id="id" required  v-model="TipoServicio.id">
                                <label for="nombre">Nombres</label>
                                <input type="text" class="form-control" id="nombre" required  v-model="TipoServicio.nombre">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="buttom" class="btn btn-default" @click="limpiarFormulario()">Limpiar</button>
                    </form>
            </div>
        </div>
        <br><br>
    </div>   
</template>

<script>
export default {
    data() {
        return {
            TipoServicios: [],
            TipoServicio: { id: 0, nombre: ""},
            editmodo:false,
            mensaje:"hidden",
            textomensaje:""
        };
    },
    created: function () {
        this.getKeeps();
    },
  methods: {
    getKeeps: function () {
      var url = "api/tiposserv";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.TipoServicios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    editar:function(id){
        this.editmodo= true;
        this.TipoServicio= this.TipoServicios[id];
    },
    guardar: function(TipoServicio){
        if (this.editmodo==false){
            axios.post(`/api/tiposserv/`, this.TipoServicio).then((res) => {
                this.TipoServicios.push(TipoServicio);
                this.textomensaje= "Se ha creado Exitosamente";
                this.mensaje="mostrar";
            });
        }else{
            axios.put(`/api/tiposserv/${this.TipoServicio.id}`, TipoServicio)
                .then(res=>{
                const index = this.TipoServicios.findIndex(item => item.id === TipoServicio.id);
                this.TipoServicio[index] = res.data;
                this.editmodo=false;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
            });
        }
        this.limpiarFormulario();
    },
    eliminar: function(TipoServicio, index){
        const confirmacion = confirm(`Eliminar el estado de pago: ${TipoServicio.nombre}`);
        if(confirmacion){
            axios.delete(`/api/tiposserv/${TipoServicio.id}`)
            .then(()=>{
                this.TipoServicios.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    limpiarFormulario: function(){
        this.textomensaje= "";
        this.mensaje="hidden";
        this.editmodo= false;
        this.TipoServicio= { id: 0, nombre: ""};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>