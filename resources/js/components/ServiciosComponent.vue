<template>
<div class="container-fluid">
    <h3 class="text-dark mb-4">Servicios</h3>
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
                            <th class="text-left">Cliente</th>
                            <th>Fecha&nbsp;</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in Servicios" :key="index">
                            <td>{{ item.id }}</td>
                            <td>{{ item.cliente }}</td>
                            <td class="text-left d-xl-flex flex-row justify-content-xl-start align-items-xl-end">{{ item.fecha_servicio }}</td>
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
                <form @submit.prevent="guardar(Servicio)">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cliente">Cliente</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="fecha_servicio" v-model="Servicio.fecha_servicio" >
                            </div> 
                        </div>
                        <div class="form-group col-md-4">
                                <label for="cliente">Cliente</label>
                                <div class="input-group">
                                    <input class="bg-light form-control small"  id="cliente" type="text" v-model="Servicio.cliente" @change="limpiarBusqueda()" autocomplete="off">
                                    <ul id="lstbuscarcliente" class="autocomplete" :class="ocultar">
                                        <li v-for="(item, index) in Clientes" :key="index" :value="item.id" @click="cargarIdClientes(item.id, item.razon_social)">{{ item.razon_social }}</li>
                                    </ul>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary py-0" type="button" @click="cargarClientes()">
                                            <i class="fas fa-search" ></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="clientes_id" required  v-model="Servicio.cliente_id">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empresa_transporte">Empresa de Transporte</label>
                            <input type="text" class="form-control" id="empresa_transporte" required  v-model="Servicio.empresa_transporte">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="conductor">Conductor</label>
                            <input type="text" class="form-control" id="conductor" required  v-model="Servicio.conductor">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="placa_unidad">Placa Unidad</label>
                            <input type="text" class="form-control" id="placa_unidad" required  v-model="Servicio.placa_unidad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="placa_carretera">Placa Carretera</label>
                            <input type="text" class="form-control" id="placa_carretera" required  v-model="Servicio.placa_carretera">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="guia">Gu&iacute;a Transport&iacute;sta</label>
                            <input type="text" class="form-control" id="guia" required  v-model="Servicio.guia_transportista">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="almacen">Almacen</label>
                            <input type="text" class="form-control" id="almacen" required v-model="Servicio.almacen">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" step="1" min="1" value="1" required v-model="Servicio.cantidad">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="unidad">Unidad</label>
                            <input type="text" class="form-control" id="unidad" required v-model="Servicio.unidad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ingenio_id">Ingenios</label>
                            <select class="form-control" id="ingenio_id" required  v-model="Servicio.ingenio_id">
                                <option v-for="(item, index) in Ingenios" :key="index" :value="item.id">{{ item.nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lineas_productos_id">Linea de Producto</label>
                            <select class="form-control" id="lineas_producto_id" required  v-model="Servicio.lineas_productos_id">
                                <option v-for="(item, index) in LineasProductos" :key="index" :value="item.id">{{ item.nombre}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipo_servicio_id">Tipo de Servicio</label>
                            <select class="form-control" id="tipo_servicio_id" required  v-model="Servicio.tipo_servicio_id">
                                <option v-for="(item, index) in TiposServicios" :key="index" :value="item.id">{{ item.nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estados_pago_id">Estado de Pago</label>
                            <select class="form-control" id="estados_pago_id" required  v-model="Servicio.estados_pago_id">
                                <option v-for="(item, index) in EstadosPago" :key="index" :value="item.id">{{ item.nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modos_pagos_id">Modo de Pago</label>
                            <select class="form-control" id="modos_pagos_id" required  v-model="Servicio.modos_pagos_id">
                                <option v-for="(item, index) in ModosPago" :key="index" :value="item.id">{{ item.nombre}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="costo_uni_est">Costo Unitario Estiba</label>
                            <input type="number" class="form-control" id="costo_uni_est" step="0.1" min="1" value="0.00" required v-model="Servicio.costo_unitario_estiba">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costo_opeext_est">Costo Operativo Extra Estiba</label>
                            <input type="number" class="form-control" id="costo_opeext_est" step="0.1" min="1" value="0.00" required v-model="Servicio.costo_operativo_extra_estiba">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costo_extr_est">Costo Extra Estiba</label>
                            <input type="number" class="form-control" id="costo_extr_est" step="0.1" min="1" value="0.00" required v-model="Servicio.costo_extra_estiba">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="precio_extr_est">Precio Extra Estiba</label>
                            <input type="number" class="form-control" id="precio_extr_est" step="0.1" min="1" value="0.00" required v-model="Servicio.precio_extra_estiba">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio_servicio">Precio Servicio</label>
                            <input type="number" class="form-control" id="precio_servicio" step="0.1" min="1" value="0.00" required v-model="Servicio.precio_servicio">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio_tot_serv">Precio Total Servicio</label>
                            <input type="number" class="form-control" id="precio_tot_serv" step="0.1" min="1" value="0.00" required v-model="Servicio.precio_total_servicio">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="costo_tot_serv">Costo Total Servicio</label>
                            <input type="number" class="form-control" id="costo_tot_serv" step="0.1" min="1" value="0.00" required v-model="Servicio.costo_total_servicio">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="utilidad">Utilidad</label>
                            <input type="number" class="form-control" id="utilidad" step="0.1" min="1" value="0.00" required v-model="Servicio.utilidad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="igv">IGV</label>
                            <input type="number" class="form-control" id="igv" step="0.1" min="1" value="0.00" required v-model="Servicio.igv">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-default">Limpiar</button>
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
            Servicios: [],
            Servicio: {id:0,ingenio_id:null,empresa_transporte:"",conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"",almacen:"",cantidad:1,unidad:"",costo_unitario_estiba:0,costo_operativo_extra_estiba:0,costo_flat_estiba:0,costo_total_servicio:0,costo_extra_estiba:0,precio_extra_estiba:0,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,fecha_servicio:null,fecha_pago:null,fecha_liquidacion:null,facturado:0,num_factura:"",lineas_productos_id:null,estados_pago_id:null,cliente_id:null,tipo_servicio_id:null,modos_pagos_id:null, cliente:""},
            LineasProductos: [],
            TiposServicios:[],
            EstadosPago:[],
            ModosPago:[],
            Clientes:[],
            Ingenios:[],
            buscliente:"",
            ocultar:"hidden",
            textomensaje: "",
            mensaje: "hidden",
            editmodo:false
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarLineasProd();
        this.cargarTiposServicios();
        this.cargarEstadosPago();
        this.cargarModosPago();
        this.cargaringenios();
        
        var fecha = new Date(); 
        var mes = fecha.getMonth()+1; 
        var dia = fecha.getDate(); 
        var ano = fecha.getFullYear(); 
        if(dia<10){
            dia='0'+dia; 
        }
        if(mes<10){
            mes='0'+mes;
        }
        this.Servicio.fecha_servicio= ano+"-"+mes+"-"+dia;
    },
  methods: {
    getKeeps: function () {
      var url = "api/servicios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Servicios = res.data;
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
    cargarTiposServicios: function () {
      var url = "api/tiposserv";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.TiposServicios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarEstadosPago: function () {
      var url = "api/estpagos";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.EstadosPago = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarModosPago: function () {
      var url = "api/metpagos";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.ModosPago = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargaringenios: function () {
      var url = "api/ingenios";
      axios.get(url).then((res) => {
        if (res.data[0].id){
          this.Ingenios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarClientes: function () {
      axios.get(`api/clientes/${this.Servicio.cliente}`, '0').then((res) => {
        if (res.data[0].id){
          this.Clientes = res.data;
          this.ocultar= "mostrar";
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarIdClientes: function (id, cliente) {
        this.Servicio.cliente_id= id;
        this.Servicio.cliente= cliente;
        this.ocultar= "hidden";
    },
    limpiarBusqueda: function () {
        this.ocultar= "hidden";
    },
    editar:function(id){
        this.editmodo= true;
        this.Servicio= this.Servicios[id];
    },
    guardar: function(Servicio){
        console.log(Servicio);
        if (this.editmodo==false){
            axios.post(`/api/servicios/`, this.Servicio).then((res) => {
                this.Servicios.push(Servicio);
                this.textomensaje= "Se ha creado Exitosamente";
                this.mensaje="mostrar";
                this.getKeeps();
            });
        }else{
            axios.put(`/api/servicios/${this.Servicio.id}`, Servicio)
                .then(res=>{
                const index = this.Servicios.findIndex(item => item.id === Servicio.id);
                this.Servicio[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.getKeeps();
            });
        }
        this.limpiarFormulario();
    },
    eliminar: function(Servicio, index){
        const confirmacion = confirm(`Eliminar el Servicio numero:  ${Servicio.id}`);
        if(confirmacion){
            axios.delete(`/api/servicios/${Servicio.id}`)
            .then(()=>{
                this.Servicios.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    limpiarFormulario: function(){
        this.editmodo= false;
        this.buscliente="";
        this.ocultar="hidden";
        this.textomensaje= "";
        this.mensaje="hidden";
        this.Servicio= {id:0,ingenio_id:null,empresa_transporte:"",conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"",almacen:"",cantidad:1,unidad:"",costo_unitario_estiba:0,costo_operativo_extra_estiba:0,costo_flat_estiba:0,costo_total_servicio:0,costo_extra_estiba:0,precio_extra_estiba:0,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,fecha_servicio:null,fecha_pago:null,fecha_liquidacion:null,facturado:0,num_factura:"",lineas_productos_id:null,estados_pago_id:null,cliente_id:null,tipo_servicio_id:null,modos_pagos_id:null, cliente:""};
    }

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>