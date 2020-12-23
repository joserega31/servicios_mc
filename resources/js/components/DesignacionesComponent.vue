<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Designaciones</h3>
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
                                <th class="text-left">Supervisor</th>
                                <th class="text-left">Ingenio</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in designaciones" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.supervisor }}</td>
                                <td>{{ item.ingenio }}</td>
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
                    <form @submit.prevent="guardar(designacione)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="supervisores_id">Supervisores</label>
                                <select class="form-control" id="supervisores_id" required  v-model="designacione.supervisores_id">
                                    <option v-for="(item, index) in Supervisores" :key="index" :value="item.id">{{ item.nombres + " " + item.apellidos}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ingenios_id">Ingenios</label>
                                <select class="form-control" id="ingenios_id" required  v-model="designacione.ingenios_id">
                                    <option v-for="(item, index) in Ingenios" :key="index" :value="item.id">{{ item.nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio"  required v-model="designacione.fecha_inicio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha_fin">Fecha Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" required  v-model="designacione.fecha_fin">
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
            designaciones: [],
            designacione: { id: 0, supervisores_id: null, ingenios_id: null, fecha_inicio:null, fecha_fin:null, supervisor:"", ingenio:""},
            Supervisores: [],
            Ingenios: [],
            editmodo:false,
            mensaje:"hidden",
            textomensaje:""
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarSupervisores();
        this.cargarIngenios();
    },
  methods: {
    getKeeps: function () {
      var url = "api/designaciones";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.designaciones = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarSupervisores: function () {
      var url = "api/supervisores";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Supervisores = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarIngenios: function () {
      var url = "api/ingenios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Ingenios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    editar:function(id){
        this.editmodo= true;
        this.designacione= this.designaciones[id];
    },
    guardar: function(designacione){
        if (this.editmodo==false){
            axios.post(`/api/designaciones/`, this.designacione).then((res) => {
                this.designaciones.push(designacione);
                this.textomensaje= "Se ha creado Exitosamente";
                this.mensaje="mostrar";
                this.getKeeps();
            });
        }else{
            axios.put(`/api/designaciones/${this.designacione.id}`, designacione)
                .then(res=>{
                const index = this.designaciones.findIndex(item => item.id === designacione.id);
                this.designacione[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.getKeeps();
            });
        }
        this.limpiarFormulario();
    },
    eliminar: function(designacione, index){
        const confirmacion = confirm(`Eliminar el designacion numero:  ${designacione.id}`);
        if(confirmacion){
            axios.delete(`/api/designaciones/${designacione.id}`)
            .then(()=>{
                this.designaciones.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    limpiarFormulario: function(){
        this.textomensaje= "";
        this.mensaje="hidden";
        this.editmodo= false;
        this.designacione= { id: 0, supervisores_id: null, ingenios_id: null, fecha_inicio:null, fecha_fin:null}
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>