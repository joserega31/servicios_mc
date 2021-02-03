<template>
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-dark">Ordenes de Servicios</h3>
            <div class="tile_count">
                    <div class="col-md-2  tile_stats_count">
                        <span class="count_top"><i class="fa fa-file-invoice"></i> Pendientes por Facturar</span>
                        <div class="count">{{totptefacturar}}</div>
                        <!--span class="count_bottom"><i class="green">4% </i> Esta semana</span-->
                    </div>
                    <div class="col-md-2  tile_stats_count">
                        <span class="count_top"><i class="fas fa-money-bill-alt"></i> Pendiente de pago</span>
                        <div class="count">{{totpago}}</div>
                        <!--span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>3% </i> Esta semana</span-->
                    </div>
                    <div class="col-md-3  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Costo Ordenes Servicios</span>
                        <div class="count">{{totalservicio}}</div>
                        <!--span class="count_bottom"><i class="red"><i class="fas fa-sort-down"></i>12% </i> Esta semana</span-->
                    </div>
                    <div class="col-md-2  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Facturado</span>
                        <div class="count">{{totalfacturado}}</div>
                        <!--span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>34% </i> Esta semana</span-->
                    </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select class="btn btn-primary form-control" @change="cargarServicios()" v-model="opcionFiltro">
                                <option selected value="0">Pendiente de facturación</option>
                                <option value="1">Pendiente de pago </option>
                                <option value="2">Pendiente por Liquidar </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-success" title="Exportar" @click="exportarservicio()">
                                <i class="far fa-file-excel"></i> Exportar
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Orden de Servicio</th>
                                <th class="text-left">Ruc</th>
                                <th class="text-left">Raz&oacute;n Social</th>
                                <th class="text-left">Fecha Orden Servicio</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in OrdenesServicios" :key="index">
                                <td>{{ item.id }}</td>
                                <td>{{ item.ruc }}</td>
                                <td>{{ item.razon_social }}</td>
                                <td>{{ item.fecha }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" title="Emitir Factura" data-toggle="modal" data-target="#emitirfactura" v-on:click.prevent="enviarid(index)" v-if="item.fecha_factura==null">
                                        <i class="fas fa-file-invoice"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" title="Emitir Pago" data-toggle="modal" data-target="#emitirPago" v-on:click.prevent="enviarid(index)" v-if="item.fecha_factura!==null && item.fecha_pago==null">
                                        <i class="fas fa-dollar-sign"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning" title="Liquidar OrdenServicio" data-toggle="modal" data-target="#liquidarservicio" v-on:click.prevent="enviarid(index)" v-if="item.fecha_factura!==null && item.fecha_pago!=null">
                                        <i class="far fa-calendar-check"></i>
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
        
        <div class="modal fade" id="emitirfactura" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="emitirfacturaLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emitirfacturaLabel">Emitir Factura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success w-100" role="alert" :class="mensaje">
                            {{textomensaje}}
                        </div>
                        <form @submit.prevent="emitirFactura(OrdenServicio)">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" id="id" required v-model="OrdenServicio.id">
                                    <label for="nombre">Fecha</label>
                                    <input type="date" class="form-control" id="fecha_factura" v-model="OrdenServicio.fecha_factura" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nombre">Numero</label>
                                    <input type="text" class="form-control" id="num_factura" v-model="OrdenServicio.num_factura" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nombre">Monto</label>
                                    <input type="number" class="form-control" id="monto_factura" v-model="OrdenServicio.monto_factura" min="0.00" step="0.01" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="buttom" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Emitir Factura</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="emitirPago" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="emitirPagoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emitirPagoLabel">Emitir Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success w-100" role="alert" :class="mensajef">
                            {{textomensajef}}
                        </div>
                        <form @submit.prevent="emitirPago(OrdenServicio)">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" id="id" required v-model="OrdenServicio.id">
                                    <label for="nombre">Fecha</label>
                                    <input type="date" class="form-control" id="fecha_pago" v-model="OrdenServicio.fecha_pago" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="buttom" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Emitir Pago</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="liquidarservicio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="liquidarservicioLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="liquidarservicioLabel">Liquidar OrdenServicio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success w-100" role="alert" :class="mensaje">
                            {{textomensaje}}
                        </div>
                        <form @submit.prevent="liquidarservicio(OrdenServicio)">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" id="id" required v-model="OrdenServicio.id">
                                    <label for="nombre">Fecha</label>
                                    <input type="date" class="form-control" id="fecha_pago" v-model="OrdenServicio.fecha_pago" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="buttom" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Liquidar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>   
</template>

<script>
export default {
    data() {
        return {
            OrdenesServicios: [],
            OrdenServicio:{id:0, fecha: null,ruc: "", razon_social: "", fecha_factura:null, num_factura:"", monto_factura:0, fecha_pago:null, facturado:0, fecha_factura1:null, fecha_pago1:null},
            totptefacturar:0, 
            totpago: 0,
            totpagodet: 0, 
            totalservicio: 0, 
            totalfacturado: 0,
            opcionFiltro:0,
            mensaje:"hidden",
            textomensaje:"",
            mensajef:"hidden",
            textomensajef:""
        };
    },
    created: function () {
        this.cargartotalservicio();
        this.cargarServicios(0);
    },  
    methods: {
        cargarTodosServicios: function () {
            var url = "api/OrdenesServicios";
            axios.get(url).then((res) => {
                if (res.data[0].id){
                    this.OrdenesServicios = res.data;
                    this.buscliente= res.data.razon_social;
                }else{
                    console.log("No se encontro registros");
                }
        });
        },
        cargarServicios: function () {
            this.limpiarFormulario();
            var org =this.opcionFiltro;
            var url = "api/serviciopte";
            if (org==1){
                url = "api/servicioptepago";
            }else if(org==2){
                url = "api/serviciopteliq";
            }
            axios.get(url).then((res) => {
                if (res.data[0].id){
                    this.OrdenesServicios= res.data;
                }else{
                    console.log("No se encontro registros");
                }
            });
        },
        cargartotalservicio: function () {
            var url = "api/totalservicios";
            axios.get(url).then((res) => {
                if (res.data){
                    this.totptefacturar= res.data[0].totptefacturar; 
                    this.totpago= res.data[0].totpago; 
                    this.totpagodet= res.data[0].totpagodet; 
                    this.totalservicio= res.data[0].totalservicio; 
                    this.totalfacturado= res.data[0].totalfacturado; 
                    if (this.totalservicio== null){
                        this.totalservicio=0;
                    }
                    if (this.totalfacturado== null){
                        this.totalfacturado=0;
                    }
                }else{
                    console.log("No se encontro registros");
                }
            });
        },
        emitirFactura: function (OrdenServicio) {
            OrdenServicio.facturado=1;
            axios.put(`/api/home/${OrdenServicio.id}`, OrdenServicio)
                .then(res=>{
                const index = this.OrdenesServicios.findIndex(item => item.id === OrdenServicio.id);
                this.OrdenesServicios[index] = res.data;
                this.textomensajef= "Se ha actualizado Exitosamente";
                this.mensajef="mostrar";
                this.cargartotalservicio();
                this.cargarServicios(0);
            });
        },
        emitirPago: function (OrdenServicio) {
            OrdenServicio.facturado=0;
            axios.put(`/api/home/${OrdenServicio.id}`, OrdenServicio)
                .then(res=>{
                const index = this.OrdenesServicios.findIndex(item => item.id === OrdenServicio.id);
                this.OrdenesServicios[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.cargarServicios(1); 
            });
        },
        liquidarservicio: function (OrdenServicio) {
            OrdenServicio.facturado=2;
            axios.put(`/api/home/${OrdenServicio.id}`, OrdenServicio)
                .then(res=>{
                const index = this.OrdenesServicios.findIndex(item => item.id === OrdenServicio.id);
                this.OrdenesServicios[index] = res.data;
                this.textomensaje= "Se ha actualizado Exitosamente";
                this.mensaje="mostrar";
                this.cargarServicios(2);
            });
        },
        exportarservicio: function () {
            var url = "api/exportarservicio";
            window.open(url);
        },
        enviarid: function (id) {
            this.OrdenServicio= this.OrdenesServicios[id];

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
            this.OrdenServicio.fecha_factura1= ano+"-"+mes+"-"+dia;
            this.OrdenServicio.fecha_pago1= ano+"-"+mes+"-"+dia;
            
            this.textomensaje= "";
            this.mensaje="hidden";
        },
        limpiarFormulario: function(){
            this.textomensaje= "";
            this.mensaje="hidden";
            this.textomensajef= "";
            this.mensajef="hidden";
            this.OrdenesServicios= [],
            this.OrdenServicio={id:0, fecha_servicio: null,ruc: "", razon_social: "", fecha_factura:null, num_factura:"", monto_factura:0, fecha_pago:null, facturado:0, fecha_factura1:null, fecha_pago1:null}
        }
    }
};
</script>