<template>
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-dark">Servicios</h3>
            <div class="tile_count">
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-file-invoice"></i> Pendientes por Facturar</span>
                    <div class="count">{{totptefacturar}}</div>
                    <span class="count_bottom"><i class="green">4% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fas fa-money-bill-alt"></i> Pendiente de pago</span>
                    <div class="count">{{totpago}}</div>
                    <span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>3% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fas fa-money-bill-alt"></i> Pendiente de pago detalle</span>
                    <div class="count">{{totpagodet}}</div>
                    <span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>34% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Costo Servicios</span>
                    <div class="count">{{totalservicio}}</div>
                    <span class="count_bottom"><i class="red"><i class="fas fa-sort-down"></i>12% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Facturado</span>
                    <div class="count">{{totalfacturado}}</div>
                    <span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>34% </i> Esta semana</span>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Servicios pendiente de facturación</button>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                                    <a class="dropdown-item" role="presentation" @click="cargarServicios(0)">Servicios pendiente de facturación</a>
                                    <a class="dropdown-item" role="presentation" @click="cargarServicios(1)">Pendiente de pago </a>
                                    <a class="dropdown-item" role="presentation" @click="cargarServicios(2)">Pendiente de pago detalle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th class="text-left">Ruc</th>
                                <th class="text-left">Raz&oacute;n Social</th>
                                <th class="text-left">Fecha Servicio</th>
                                <th>Acci&oacute;n</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in servicios" :key="index">
                                <td>{{ item.id }}</td>
                                <td>{{ item.ruc }}</td>
                                <td>{{ item.razon_social }}</td>
                                <td>{{ item.fecha_servicio }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" title="Emitir Factura"  @click="emitirFactura(index)">
                                        <i class="fas fa-file-invoice"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" title="Emitir Pago" @click="emitirPago(index)">
                                        <i class="fas fa-dollar-sign"></i>
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
        

    </div>   
</template>

<script>
export default {
    data() {
        return {
            servicios: [],
            servicio:{id:0, fecha_servicio: null,ruc: "", razon_social: ""},
            totptefacturar:0, 
            totpago: 0,
            totpagodet: 0, 
            totalservicio: 0, 
            totalfacturado: 0
        };
    },
    created: function () {
        this.cargartotalservicio();
        this.cargarServicios(0);
    },  
    methods: {
        cargarServicios: function (org) {
            var url = "api/serviciopte";
            if (org==1){
                url = "api/servicioptepago";
            }else if(org==2){
               url = "api/servicioptepagodet";
            }
            axios.get(url).then((res) => {
                if (res.data[0].id){
                    this.servicios= res.data;
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

                    console.log(res.data);
                }else{
                    console.log("No se encontro registros");
                }
            });
        },
        emitirFactura: function (id) {
            this.servicio= this.servicios[id];
            alert('Facturar: '+ this.servicio);
        },
         emitirPago: function (id) {
            this.servicio= this.servicios[id];
            alert('Pagar: '+ this.servicio);
        },
    }
};
</script>