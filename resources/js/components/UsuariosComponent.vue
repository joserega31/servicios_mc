<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Usuarios</h3>
        <div class="alert alert-success w-100" role="alert" :class="mensaje">
            {{textomensaje}}
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nombre Apellido</th>
                                <th>Correo</th>
                                <th class="text-left">Rol</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in usuarios" :key="index">
                                <td>{{ item.name }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.rol }}</td>
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
                    <form @submit.prevent="guardar(usuario)">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" class="form-control" id="id" required  v-model="usuario.id">
                                <label for="dni">Nombre y Apellido</label>
                                <input type="text" class="form-control" id="dni" required  v-model="usuario.name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Correo</label>
                                <input type="email" class="form-control" id="nombre" required  v-model="usuario.email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidos">Rol</label>
                                <select class="form-control" id="rol_id" required  v-model="usuario.rol_id">
                                    <option v-for="(item, index) in roles" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="numcuenta">Clave</label>
                                <input type="password" class="form-control" id="numcuenta" required v-model="usuario.password">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cci">Repetir Clave</label>
                                <input type="password" class="form-control" id="cci" required v-model="usuario.reppassword">
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
            usuarios: [],
            usuario: { id: 0, name: "", email: "", rol_id: 0, rol:"", password:"", reppassword:""},
            roles: [],
            editmodo:false,
            mensaje:"hidden",
            textomensaje:""
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarRoles();
    },
  methods: {
    getKeeps: function () {
      var url = "api/usuarios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.usuarios = res.data;
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
    editar:function(id){
        this.editmodo= true;
        this.usuario= this.usuarios[id];
        this.usuario.password="";
        this.usuario.reppassword="";
    },
    guardar: function(usuario){
        if(usuario.password!==usuario.reppassword){
            this.textomensaje= "Las Claves no coindicen";
            this.mensaje="mostrar";
        }else{
            if (this.editmodo==false){
                axios.post(`/api/usuarios/`, this.usuario).then((res) => {
                    console.log(res.data);
                    this.usuarios.push(usuario);
                    this.textomensaje= "Se ha creado Exitosamente";
                    this.mensaje="mostrar";
                });
            }else{
                axios.put(`/api/usuarios/${this.usuario.id}`, usuario)
                    .then(res=>{
                    const index = this.usuarios.findIndex(item => item.id === usuario.id);
                    this.usuario[index] = res.data;
                    this.textomensaje= "Se ha actualizado Exitosamente";
                    this.mensaje="mostrar";
                });
            }
            this.limpiarFormulario();
        }
    },
    eliminar: function(usuario, index){
        const confirmacion = confirm(`Eliminar el usuario ${usuario.nombres + " " + usuario.apellidos}`);
        if(confirmacion){
            axios.delete(`/api/usuarios/${usuario.id}`)
            .then(()=>{
                this.usuarios.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    exportar: function () {
      var url = "api/exportarlstuser";
      window.open(url);
    },
    limpiarFormulario: function(){
        this.textomensaje= "";
        this.mensaje="hidden";
        this.editmodo= false;
        this.usuario= { id: 0, name: "", email: "", rol_id: 0, rol:"", password:"", reppassword:""};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
