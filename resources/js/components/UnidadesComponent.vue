<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Unidades</h3>
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
                                <th class="text-left">Descripcion</th>
                                <th class="text-left">Abreviatura</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in unidades" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.descripcion_larga }}</td>
                                <td>{{ item.descripcion_corta }}</td>
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
                    <form @submit.prevent="guardar(unidad)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="descripcion_larga">Descripcion</label>
                                <input class="form-control" type="text" id="descripcion_larga" name="descripcion_larga" v-model="unidad.descripcion_larga" required @input="unidad.descripcion_larga = $event.target.value.toUpperCase()"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descripcion_corta">Abreviatura</label>
                                <input class="form-control" type="text" id="descripcion_corta" name="descripcion_corta" v-model="unidad.descripcion_corta" required @input="unidad.descripcion_corta = $event.target.value.toUpperCase()"/>
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
            unidades: [],
            unidad: { id: 0, descripcion_corta: "", descripcion_larga: ""},
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
      var url = "api/unidades";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.unidades = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/unidades/${this.emailuser}`).then((res) => {
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
        this.unidad= this.unidades[id];
    },
    guardar: function(unidad){
        if (this.editmodo==false){
            if (this.permiso_crear==0){
                this.textomensaje= "No cuenta con los privilegios para realizar esta accion, consulte al administrador";
                this.mensaje="mostrar";
            }else{
                axios.post(`/api/unidades`, this.unidad).then((res) => {
                    this.unidades.push(unidad);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                });
            }
        }else{
            axios.put(`/api/unidades/${this.unidad.id}`, unidad)
                .then(res=>{
                const index = this.unidades.findIndex(item => item.id === unidad.id);
                this.unidad[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
            });
        }
        this.limpiarFormulario(0);
    },
    eliminar: function(unidad, index){
        const confirmacion = confirm(`Eliminar el designacion numero:  ${unidad.id}`);
        if(confirmacion){
            axios.delete(`/api/unidades/${unidad.id}`)
            .then(()=>{
                this.unidades.splice(index, 1);
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
        this.unidad= { id: 0, supervisores_id: null, ingenios_id: null, fecha_inicio:null, fecha_fin:null}
        this.getKeeps();
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>