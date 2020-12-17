<template>
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Tarifarios</h3>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th class="text-left">Cliente</th>
                                <th class="text-left">Linea de Producto </th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in tarifarios" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.cliente }}</td>
                                <td>{{ item.linea_prod }}</td>
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
                    <form @submit.prevent="guardar(tarifario)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" id="id" required  v-model="tarifario.id">
                                <label for="cliente">Cliente</label>
                                <div class="input-group">
                                    <input class="bg-light form-control small"  id="cliente" type="text" v-model="tarifario.cliente" @change="limpiarBusqueda()" autocomplete="off">
                                    <ul id="lstbuscarcliente" class="autocomplete" :class="ocultar">
                                        <li v-for="(item, index) in Clientes" :key="index" :value="item.id" @click="cargarIdClientes(item.id, item.razon_social)">{{ item.razon_social }}</li>
                                    </ul>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary py-0" type="button" @click="cargarClientes()">
                                            <i class="fas fa-search" ></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="clientes_id" required  v-model="tarifario.clientes_id">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lineas_producto_id">Linea de Producto</label>
                                <select class="form-control" id="lineas_producto_id" required  v-model="tarifario.lineas_producto_id">
                                    <option v-for="(item, index) in LineasProductos" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                               <input type="number" class="form-control" id="precio" step="0.1" min="1" value="0.00" required v-model="tarifario.precio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="unidad">Unidad</label>
                                <input type="number" class="form-control" id="unidad" min="1" required  v-model="tarifario.unidad">
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
            tarifarios: [],
            tarifario: { id: 0, lineas_producto_id: null, clientes_id: null, precio:0, unidad:1, cliente:""},
            LineasProductos: [],
            Clientes:[],
            buscliente:"",
            ocultar:"hidden",
            editmodo:false
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarLineasProd();
    },
  methods: {
    getKeeps: function () {
      var url = "api/tarifarios";
      axios.get(url).then((res) => {
          console.log(res.data);
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
            axios.post(`/api/tarifarios/`, this.tarifario).then((res) => {
                this.tarifarios.push(tarifario);
                alert('Se ha creado Exitosamente');
            });
        }else{
            axios.put(`/api/tarifarios/${this.tarifario.id}`, tarifario)
                .then(res=>{
                const index = this.tarifarios.findIndex(item => item.id === tarifario.id);
                this.tarifario[index] = res.data;
                alert('Se ha actualizado Exitosamente');
            });
        }
        this.limpiarFormulario();
    },
    eliminar: function(tarifario, index){
        const confirmacion = confirm(`Eliminar el tarifario ${tarifario.nombre}`);
        if(confirmacion){
            axios.delete(`/api/tarifarios/${tarifario.id}`)
            .then(()=>{
                this.tarifarios.splice(index, 1);
                alert('Se ha eliminado Exitosamente');
            });
        }
    },
    limpiarFormulario: function(){
        this.editmodo= false;
        this.buscliente="";
        this.ocultar="hidden";
        this.tarifario= { id: 0, lineas_producto_id: null, clientes_id: null, precio:0, unidad:1};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>