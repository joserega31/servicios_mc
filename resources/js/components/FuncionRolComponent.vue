<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Funciones del Rol</h3>
        <div class="alert alert-success w-100" FunRol="alert" :class="mensaje">
            {{textomensaje}}
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" FunRol="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th class="text-left">Rol</th>
                                <th class="text-left">Menu</th>
                                <th class="text-left">Opcion</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in FunRoles" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.rol }}</td>
                                <td>{{ item.nommenu }}</td>
                                <td>{{ item.nomsubmenu }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" title="Editar" @click="editar(index, item)">
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
                            <p id="dataTable_info" class="dataTables_info" FunRol="status" aria-live="polite"></p>
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

        <br><br>

        <div class="card shadow">
            <div class="card-body">
                    <form @submit.prevent="guardar(FunRol)">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Rol</label>
                                <select class="form-control" id="rol_id" required  v-model="FunRol.rol_id">
                                    <option v-for="(item, index) in roles" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <input type="hidden" class="form-control" id="id" required  v-model="FunRol.id">
                                <label for="nombre">Menu</label>
                                <select class="form-control" id="menu_id" required  v-model="FunRol.menu_id" @change='cargarSubmenu(FunRol.menu_id)'>
                                    <option v-for="(item, index) in menu" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Opcion</label>
                                <select class="form-control" id="sub_menu_id" required  v-model="FunRol.sub_menu_id" @change='cargarSubmenu(item.id)'>
                                    <option v-for="(item, index) in subnemu" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Acciones</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" type="checkbox" id="crear" value="1" v-model="FunRol.crear">
                                    <label class="form-check-label" for="crear">Crear</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" type="checkbox" id="editar" value="1" v-model="FunRol.editar">
                                    <label class="form-check-label" for="editar">Editar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input checkbox" type="checkbox" id="eliminar" value="1" v-model="FunRol.eliminar">
                                    <label class="form-check-label" for="eliminar">Eliminar</label>
                                </div>
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
            FunRoles: [],
            FunRol: { id: 0, nombre: "", menu_id:0, sub_menu_id:0, rol_id:0, crear:0, editar:0, eliminar:0, rol:"", nommenu:"", nomsubmenu:""},
            menu:[],
            subnemu:[],
            roles:[],
            editmodo:false,
            mensaje:"hidden",
            textomensaje:""
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarRoles();
        this.cargarMenu();
    },
  methods: {
    getKeeps: function () {
      var url = "api/funcionroles";
      axios.get(url).then((res) => {
        if (res.data){
          this.FunRoles = res.data;
          console.log(this.FunRoles);
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarMenu: function () {
      var url = "api/menu";
      axios.get(url).then((res) => {
        if (res.data){
          this.menu = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarSubmenu: function (id) {
      axios.get(`api/submenu/${id}`).then((res) => {
        if (res.data){
          this.subnemu = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarRoles: function () {
        var url = "api/roles";
         axios.get(url).then((res) => {
            if (res.data){
                this.roles = res.data;
            }else{
                console.log("No se encontro registros");
            }
      });
    },
    editar:function(id, FunRol){
        this.editmodo= true;
        this.cargarSubmenu(FunRol.menu_id);
        this.FunRol= this.FunRoles[id];
    },
    guardar: function(FunRol){
        if (this.editmodo==false){
            axios.post(`/api/funcionroles/`, this.FunRol).then((res) => {
                this.FunRoles.push(FunRol);
                this.textomensaje= "Se ha creado Exitosamente";
                this.mensaje="mostrar";
            });
        }else{
            axios.put(`/api/funcionroles/${this.FunRol.id}`, FunRol)
                .then(res=>{
                const index = this.FunRoles.findIndex(item => item.id === FunRol.id);
                this.FunRol[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
            });
        }
        this.getKeeps();
        this.limpiarFormulario();
    },
    eliminar: function(FunRol, index){
        const confirmacion = confirm(`Eliminar la funcion:  ${FunRol.nommenu} > ${FunRol.nomsubmenu}`);
        if(confirmacion){
            axios.delete(`/api/funcionroles/${FunRol.id}`)
            .then(()=>{
                this.FunRoles.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    limpiarFormulario: function(){
        this.textomensaje= "";
        this.mensaje="hidden";
        this.editmodo= false;
        this.FunRol= { id: 0, nombre: "", menu_id:0, sub_menu_id:0, rol_id:0, crear:0, editar:0, eliminar:0};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>