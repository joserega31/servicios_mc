<template>
<div class="container-fluid">
    <!--h3 class="text-dark mb-4">Servicios</h3-->
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
                        <tr v-for="(item, index) in Ordenes" :key="index">
                            <td>{{ item.id }}</td>
                            <td>{{ item.cliente }}</td>
                            <td class="text-left d-xl-flex flex-row justify-content-xl-start align-items-xl-end">{{ item.fecha }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" title="Editar" @click="editar(index)"  v-if="permiso_editar==1">
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
            <h5 class="card-title">Orden</h5>
            <form @submit.prevent="guardar(orden)">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fecha_orden">Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="fecha_orden" v-model="orden.fecha">
                        </div> 
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="cliente">Cliente / Empresa de Transporte</label>
                        <div class="input-group">
                            <input class="bg-light form-control small"  id="cliente" v-model="orden.cliente" type="text"  @change="limpiarBusqueda()" autocomplete="off">
                            <ul id="lstbuscarcliente" class="autocomplete" :class="ocultar">
                                <li v-for="(item, index) in Clientesb" :key="index" :value="item.id" @click="cargarIdClientes(item.id, item.razon_social)">{{ item.razon_social }}</li>
                            </ul>
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button" @click="cargarClientes()">
                                    <i class="fas fa-search" ></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="clientes_id" required  v-model="orden.cliente_id">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="agrcliente">&nbsp;&nbsp;</label><br>
                        <button class="btn btn-info form-control" type="button" title="Agregar Cliente Nuevo" style="width: 50px;"  data-toggle="modal" data-target=".modal-cliente">
                            <i class="fas fa-plus" ></i>
                        </button>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nombre">&nbsp;&nbsp;</label>
                        <div class="form-check">
                            <input type="checkbox" class="checkbox" id="vigente" v-model="orden.igv">
                            <label class="form-check-label" for="vigente">IGV</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="ingenio_id">Ingenios</label>
                        <select class="form-control" id="ingenio_id" required  v-model="orden.ingenio_id" @change="cargarAlmacenes(orden.ingenio_id)">
                            <option v-for="(item, index) in Ingenios" :key="index" :value="item.id">{{ item.nombre}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="almacen">Almacen</label>
                        <select class="form-control" id="almacen" required  v-model="orden.almacen_id">
                            <option v-for="(item, index) in Almacenes" :key="index" :value="item.id">{{ item.nombre_almacen}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estados_pago_id">Estado de Pago</label>
                        <select class="form-control" id="estados_pago_id" required  v-model="orden.estados_pago_id">
                            <option v-for="(item, index) in EstadosPago" :key="index" :value="item.id">{{ item.nombre}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="modos_pagos_id">Modo de Pago</label>
                        <select class="form-control" id="modos_pagos_id" required  v-model="orden.modos_pagos_id">
                            <option v-for="(item, index) in ModosPago" :key="index" :value="item.id">{{ item.nombre}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <h5 class="card-title">Servicios</h5>
                    </div>  
                    <div class="form-group col-md-2 text-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal-servicio" @click="agregarNuevoServicio()" v-if="editmodo==false">Agregar Servicio</button>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-left">Tipo Servicio</th>
                                        <th>Gu&iacute;a Transport&iacute;sta</th>
                                        <th>Conductor</th>
                                        <th>Placa Unidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in Servicios" :key="index">
                                        <td>{{ item.tipo_servicio }}</td>
                                        <td>{{ item.guia_transportista }}</td>
                                        <td>{{ item.conductor }}</td>
                                        <td>{{ item.placa_unidad }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" title="Ver" @click="verServicio(index)" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="far fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminarServicio(index)">
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
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" v-if="editmodo==false">Guardar</button>
                <button type="buttom" class="btn btn-default" @click="limpiarFormulario(1)">Limpiar</button>
            </form>
        </div>
    </div>
    <br><br>

    <div class="modal fade bd-example-modal-lg modal-servicio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding:15px">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Nuevo Servicio</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success w-100" role="alert" :class="mensajemodal">
                        {{textomensajemodal}}
                    </div>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="conductor">Conductor</label>
                                <input type="text" class="form-control" id="conductor" required  v-model="Servicio.conductor" @input="Servicio.conductor = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="placa_unidad">Placa Unidad</label>
                                <input type="text" class="form-control" id="placa_unidad" required  v-model="Servicio.placa_unidad" @input="Servicio.placa_unidad = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="placa_carretera">Placa Carretera</label>
                                <input type="text" class="form-control" id="placa_carretera" required  v-model="Servicio.placa_carretera" @input="Servicio.placa_carretera = $event.target.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="guia">Gu&iacute;a Transport&iacute;sta</label>
                                <input type="text" class="form-control" id="guia" required  v-model="Servicio.guia_transportista"  @input="Servicio.guia_transportista = $event.target.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" step="1" min="1" value="1" required v-model="Servicio.cantidad" @change="calcularsubtotal()">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="unidad">Unidad</label>
                                <select class="form-control" id="unidad_id" required  v-model="Servicio.unidad_id">
                                    <option v-for="(item, index) in Unidades" :key="index" :value="item.id">{{ item.descripcion_larga}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="lineas_productos_id">Linea de Producto</label>
                                <select class="form-control" id="lineas_producto_id" required  v-model="Servicio.lineas_productos_id">
                                    <option v-for="(item, index) in LineasProductos" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipo_servicio_id">Tipo de Servicio</label>
                                <select class="form-control" id="tipo_servicio_id" required  v-model="Servicio.tipo_servicio_id" @change="cargarTextTipoServicio($event)">
                                    <option v-for="(item, index) in TiposServicios" :key="index" :value="item.id">{{ item.nombre}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="precio_servicio">Precio Servicio</label>
                                <input type="number" class="form-control" id="precio_servicio" step="0.1" min="1" value="0.00" required v-model="Servicio.precio_servicio" @change="calcularsubtotal()">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="igv">IGV</label>
                                <input type="number" class="form-control" id="igv" step="0.1" min="1" value="0.00" required v-model="Servicio.igv" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Subtotal">Subtotal</label>
                                <input type="number" class="form-control" id="Subtotal" value="0.00" v-model="Servicio.Subtotal" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="precio_total_servicio">Precio Total Servicio</label>
                                <input type="number" class="form-control" id="precio_total_servicio" value="0.00" v-model="Servicio.precio_total_servicio" readonly>
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="observaciones">Observaciones</label>
                                <textarea class="form-control" v-model="Servicio.observaciones" @input="Servicio.observaciones = $event.target.value.toUpperCase()"></textarea>
                            </div>
                            <div class="form-group col-md-4"  v-if="crear_utilidad_os==1 && editmodo==true">
                                <label for="costo_total">Costo Total</label>
                                <input type="number" class="form-control" id="costo_total" step="0.1" min="1" value="0.00" required v-model="Servicio.costo_total"  @change="calcularGanancia()">
                            </div>
                            <div class="form-group col-md-4"  v-if="crear_utilidad_os==1 && editmodo==true">
                                <label for="utilidad">Ganancia</label>
                                <input type="number" class="form-control" id="utilidad" step="0.1" min="1" value="0.00" required v-model="Servicio.utilidad" readonly>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" v-if="crear_utilidad_os==1 && editmodo==true" @click="editarservicio(Servicio)">Guardar</button>
                        <button type="button" class="btn btn-primary" v-if="crear_utilidad_os==0 || editmodo==false" @click="cargarServicio(Servicio)" :disabled="botonmodal">Agregar</button>
                        <button type="reset" class="btn btn-default"  @click="limpiarFormulario(1)" :disabled="botonmodal">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg modal-cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding:15px">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Nuevo Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success w-100" role="alert" :class="mensajecli">
                        {{textomensajecli}}
                    </div>
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
                        <button type="buttom" class="btn btn-default" @click="limpiarFrmCliente()">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>   
</template>

<script>
export default {
    props : ['user'],
    data() {
        return {
            Ordenes:[],
            orden: {id:0, fecha:null, cliente_id:0, igv:0, estatus:0, cliente:"", ingenio_id:0, estados_pago_id:0, modos_pagos_id:0, almacen_id:null},
            Servicios: [],
            Servicio: {id:0,conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"", cantidad:1,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,lineas_productos_id:null,tipo_servicio_id:null, ordenes_servicios_id:0, unidad_id:null, observaciones:"", Subtotal:0, tipo_servicio:"", costo_total:0},
            cliente: { id: 0, ruc: "", razon_social: "" },
            Clientesb: { id: 0, ruc: "", razon_social: "" },
            LineasProductos: [],
            TiposServicios:[],
            EstadosPago:[],
            ModosPago:[],
            Clientes:[],
            Ingenios:[],
            Almacenes:[],
            Unidades:[],
            Tarifarios: [],
            buscliente:"",
            ocultar:"hidden",
            textomensaje: "",
            mensaje: "hidden",
            textomensajemodal: "",
            mensajemodal: "hidden",
            mensajeuti: "hidden", 
            textomensajeuti: "",
            botonmodal:false,
            editmodo:false,
            textomensajecli:"",
            mensajecli: "hidden",
            permiso_crear:0,
            permiso_editar:0,
            permiso_eliminar:0,
            emailuser: this.user.email,
            crear_utilidad_os:0
        };
    },
    created: function () {
        this.getKeeps();
        this.cargarLineasProd();
        this.cargarTiposServicios();
        this.cargarEstadosPago();
        this.cargaringenios();
        this.cargaUnidades();
        this.cargarModosPago();
        this.cargaTarifarios();
        this.cargarPermisosUser();

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
      var url = "api/ordenes";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.Ordenes = res.data;
          this
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarPermisosUser: function () {
      axios.get(`api/cargarPermisosUser/servicio/${this.emailuser}`).then((res) => {
        if (res.data[0]){
          this.permiso_crear = res.data[0].crear;
          this.permiso_editar = res.data[0].editar;
          this.permiso_eliminar = res.data[0].eliminar;
          this.crear_utilidad_os = res.data[0].crear_utilidad_os;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarAlmacenes: function (id) {
      axios.get(`api/almacenesxingenio/${id}`).then((res) => {
        if (res.data){
          this.Almacenes = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarServiciosOrden:function(id){
      axios.get(`api/cargarServiciosOrden/${id}`).then((res) => {
        if (res.data){
          this.Servicios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarLineasProd: function () {
      var url = "api/LineasProd";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.LineasProductos = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarTiposServicios: function () {
      var url = "api/tiposserv";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.TiposServicios = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarEstadosPago: function () {
      var url = "api/estpagos";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.EstadosPago = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargarModosPago: function () {
      var url = "api/metpagos";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.ModosPago = res.data;
        }else{
          console.log("No se encontro registros");
        }
      });
    },
    cargaringenios: function () {
      var url = "api/ingenios";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.Ingenios = res.data;
        }else{
          console.log("No se encontro registros de Ingenios");
        }
      });
    },
    cargaUnidades: function () {
      var url = "api/unidades";
      axios.get(url).then((res) => {
        if (res.data[0]){
          this.Unidades = res.data;
        }else{
          console.log("No se encontro registros de Unidades");
        }
      });
    },
    cargarTextTipoServicio: function(event){
        this.Servicio.tipo_servicio = event.target.options[event.target.options.selectedIndex].text;
    },
    cargarClientes: function () {
      axios.get(`api/clientes/${this.orden.cliente}`, '0').then((res) => {
        if (res.data[0]){
          this.Clientesb = res.data;
          this.ocultar= "mostrar";
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
    calcularsubtotal: function (){
        if (this.orden.igv==1){
            this.Servicio.Subtotal= Number(this.Servicio.precio_servicio * this.Servicio.cantidad).toFixed(2); 
            this.Servicio.igv= Number((this.Servicio.Subtotal * 18)/100).toFixed(2);
            this.Servicio.precio_total_servicio= Number(parseFloat(this.Servicio.Subtotal) + parseFloat(this.Servicio.igv)).toFixed(2);
        }else{
            this.Servicio.Subtotal= Number(this.Servicio.precio_servicio * this.Servicio.cantidad).toFixed(2); 
            this.Servicio.igv= Number(0).toFixed(2);
            this.Servicio.precio_total_servicio= Number(parseFloat(this.Servicio.Subtotal) + parseFloat(this.Servicio.igv)).toFixed(2);
        }
    },
    calcularGanancia: function (){
        this.Servicio.utilidad= Number(parseFloat(this.Servicio.Subtotal) - parseFloat(this.Servicio.costo_total)).toFixed(2);
    },
    cargarIdClientes: function (id, cliente) {
        this.orden.cliente_id= id;
        this.orden.cliente= cliente;
        this.ocultar= "hidden";
    },
    cargarServicio: function(Servicio){
        //this.Servicios.push(Servicio);
        if (Servicio.conductor=="" || Servicio.placa_unidad=="" || Servicio.placa_carretera=="" || Servicio.guia_transportista==""){
            this.textomensajemodal= "Por favor, Complete todos los campos";
            this.mensajemodal="mostrar";
            console.log(Servicio.conductor + " " + Servicio.placa_unidad + " " + Servicio.placa_carretera + " " + Servicio.guia_transportista + " " + Servicio.unidad + " " + Servicio.lineas_productos_id);
        }else{
            this.Servicios.push(Servicio);
            this.Servicio= {id:0,empresa_transporte:"",conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"",almacen:"",cantidad:1,unidad:"",costo_unitario_estiba:0,costo_operativo_extra_estiba:0,costo_flat_estiba:0,costo_total_servicio:0,costo_extra_estiba:0,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,fecha_servicio:null,fecha_pago:null,fecha_liquidacion:null,facturado:0,num_factura:"",lineas_productos_id:null,cliente_id:null,tipo_servicio_id:null, ordenes_servicios_id:0, observaciones:""};
        }
    },
    limpiarBusqueda: function () {
        this.ocultar= "hidden";
    },
    editar:function(id){
        this.editmodo= true;
        this.orden= this.Ordenes[id];
        this.cargarServiciosOrden(this.orden.id);
        this.cargarAlmacenes(this.orden.ingenio_id);
    },
    agregarNuevoServicio: function(){
        this.botonmodal= false;
        //this.Servicio= {id:0,empresa_transporte:"",conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"",almacen:"",cantidad:1,unidad:"",costo_unitario_estiba:0,costo_operativo_extra_estiba:0,costo_flat_estiba:0,costo_total_servicio:0,costo_extra_estiba:0,precio_extra_estiba:0,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,fecha_servicio:null,fecha_pago:null,fecha_liquidacion:null,facturado:0,num_factura:"",lineas_productos_id:null,cliente_id:null,tipo_servicio_id:null, ordenes_servicios_id:0, observaciones:""};
    },
    verServicio:function(id){
        this.textomensajemodal= "";
        this.mensajemodal="hidden";
        this.Servicio= this.Servicios[id];
        this.botonmodal= true;
        this.calcularsubtotal();
    },
    eliminarServicio: function(index){
        const confirmacion = confirm(`Eliminar el servicio numero:  ${index +1}`);
        if(confirmacion){
            this.Servicios.splice(index, 1);
        }
    },
    guardar: function(orden){
        if (this.editmodo==false){
            axios.post(`/api/ordenes`, this.orden).then((res) => {
                this.Ordenes.push(orden);
                //GUARDAR LOS SERVICIOS
                console.log(this.Servicios);
                for(let i in this.Servicios){
                    this.Servicios[i].ordenes_servicios_id= res.data.id;
                    console.log(this.Servicios[i]);
                    axios.post(`/api/servicios`, this.Servicios[i]).then((res) => {
                        
                    });
                }
                this.textomensaje= "Se ha creado Exitosamente";
                this.mensaje="mostrar";
                this.limpiarFormulario(0);
            });
        }else{
            /*axios.put(`/api/servicios/${this.Servicio.id}`, Servicio)
                .then(res=>{
                const index = this.Servicios.findIndex(item => item.id === Servicio.id);
                this.Servicio[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.getKeeps();
            });*/
        }
        
    },
    editarservicio: function(Servicio){
        axios.put(`/api/servicios/${Servicio.id}`, Servicio)
            .then(res=>{
            const index = this.Servicios.findIndex(item => item.id === Servicio.id);
            this.Servicio[index] = res.data;
            this.textomensajemodal= "Se ha actualizado Exitosamente";
            this.mensajemodal="mostrar";
            this.getKeeps();
        });
    },
    eliminar: function(orden, index){
        const confirmacion = confirm(`Eliminar la orden numero:  ${orden.id}`);
        if(confirmacion){
            axios.delete(`/api/ordenes/${orden.id}`)
            .then(()=>{
                this.Ordenes.splice(index, 1);
                this.textomensaje= "Se ha eliminado Exitosamente";
                this.mensaje="mostrar";
            });
        }
    },
    guardarCliente: function(cliente){
        axios.post(`/api/clientes`, this.cliente).then((res) => {
            this.Clientes.push(cliente);
            this.textomensajecli= "Se ha creado Exitosamente";
            this.mensajecli="mostrar";
            this.limpiarFrmCliente(0);
        });
    },
    limpiarFormulario: function(org){
        if (org>0){
            this.textomensaje= "";
            this.mensaje="hidden";
        }
        this.Servicios= [];
        this.ocultar="hidden";
        this.textomensaje= "";
        this.mensaje="hidden";
        this.Servicios= null;
        this.orden= {id:0, fecha:null, cliente_id:0, igv:0, estatus:0, cliente:"", ingenio_id:0, estados_pago_id:0, modos_pagos_id:0};
        this.Servicio= {id:0,empresa_transporte:"",conductor:"",placa_unidad:"",placa_carretera:"",guia_transportista:"",almacen:"",cantidad:1,unidad:"",costo_unitario_estiba:0,costo_operativo_extra_estiba:0,costo_flat_estiba:0,costo_total_servicio:0,costo_extra_estiba:0,precio_servicio:0,precio_total_servicio:0,utilidad:0,igv:0,fecha_servicio:null,fecha_pago:null,fecha_liquidacion:null,facturado:0,num_factura:"",lineas_productos_id:null,cliente_id:null,tipo_servicio_id:null, ordenes_servicios_id:0, observaciones:""};
        this.editmodo= false;
        this.getKeeps();
    },
    limpiarFrmCliente:function(org){
        this.cliente= { id: 0, ruc: "", razon_social: "" };
        if (org>0){
            this.textomensajecli= "";
            this.mensajecli="hidden";
        }
    },
    limpiarFrmUtilidad:function(){
        this.Servicio.utilidad= 0;
    }

    
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>