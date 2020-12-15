<template>
<div class="container-fluid">
    <h3 class="text-dark mb-4">Servicios</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Servicio</th>
                            <th class="text-left">Descripcion</th>
                            <th>Fecha&nbsp;</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>00580</td>
                            <td>20554823140</td>
                            <td>Dolphin Servicios Corporativo E.I.R.L</td>
                            <td class="text-left d-xl-flex flex-row justify-content-xl-start align-items-xl-end">14/04/2020</td>
                            <td>
                                <button type="button" class="btn btn-warning" title="Editar">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" title="Eliminar">
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
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="hidden" class="form-control" id="modo" name="modo" value="N">
                            <label for="cliente">Cliente</label>
                            <select id="cliente" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empresa_transporte">Empresa de Transporte</label>
                            <input type="text" class="form-control" id="empresa_transporte" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="conductor">Conductor</label>
                            <input type="text" class="form-control" id="conductor" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="placa_unidad">Placa Unidad</label>
                            <input type="text" class="form-control" id="placa_unidad" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="placa_carretera">Placa Carretera</label>
                            <input type="text" class="form-control" id="placa_carretera" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="guia">Gu&iacute;a Transport&iacute;sta</label>
                            <input type="text" class="form-control" id="guia" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="almacen">Almacen</label>
                            <input type="text" class="form-control" id="almacen" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" step="1" min="1" value="1" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="unidad">Unidad</label>
                            <input type="text" class="form-control" id="unidad" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="costo_uni_est">Costo Unitario Estiba</label>
                            <input type="number" class="form-control" id="costo_uni_est" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costo_opeext_est">Costo Operativo Extra Estiba</label>
                            <input type="number" class="form-control" id="costo_opeext_est" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costo_extr_est">Costo Extra Estiba</label>
                            <input type="number" class="form-control" id="costo_extr_est" step="0.1" min="1" value="0.00" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="precio_extr_est">Precio Extra Estiba</label>
                            <input type="number" class="form-control" id="precio_extr_est" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio_servicio">Precio Servicio</label>
                            <input type="number" class="form-control" id="precio_servicio" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio_tot_serv">Precio Total Servicio</label>
                            <input type="number" class="form-control" id="precio_tot_serv" step="0.1" min="1" value="0.00" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="costo_tot_serv">Costo Total Servicio</label>
                            <input type="number" class="form-control" id="costo_tot_serv" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="utilidad">Utilidad</label>
                            <input type="number" class="form-control" id="utilidad" step="0.1" min="1" value="0.00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="igv">IGV</label>
                            <input type="number" class="form-control" id="igv" step="0.1" min="1" value="0.00" required>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>