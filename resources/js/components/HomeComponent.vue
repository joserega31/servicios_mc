<template>
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-dark">Servicios</h3>
            <div class="tile_count">
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-file-invoice"></i> Pendientes por Facturar</span>
                    <div class="count">12</div>
                    <span class="count_bottom"><i class="green">4% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fas fa-money-bill-alt"></i> Pendiente de pago</span>
                    <div class="count">8</div>
                    <span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>3% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fas fa-money-bill-alt"></i> Pendiente de pago detalle</span>
                    <div class="count green">6</div>
                    <span class="count_bottom"><i class="green"><i class="fas fa-sort-up"></i>34% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Costo Servicios</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fas fa-sort-down"></i>12% </i> Esta semana</span>
                </div>
                <div class="col-md-2  tile_stats_count">
                    <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Facturas</span>
                    <div class="count">2,315</div>
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
                                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">SERVICIOS&nbsp;</button>
                                <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                                    <a class="dropdown-item" role="presentation" href="#">Servicios pendiente de facturación</a>
                                    <a class="dropdown-item" role="presentation" href="#">Pendiente de pago </a>
                                    <a class="dropdown-item" role="presentation" href="#">Pendiente de pago detalle</a>
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
                            <tr >
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary" title="Emitir Factura">
                                        <i class="fas fa-file-invoice"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" title="Emitir Pago">
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

};
</script>