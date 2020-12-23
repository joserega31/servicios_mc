<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ServiciosExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $type = DB::table('servicios')
        ->select('servicios.id', 'fecha_servicio','tipo_servicios.nombre',  
        'ruc', 'razon_social', 'empresa_transporte','conductor','placa_unidad','placa_carretera', 
        'guia_transportista', 'almacen', 'cantidad', 'unidad', 'costo_unitario_estiba', 'costo_operativo_extra_estiba',
        'costo_flat_estiba', 'costo_total_servicio', 'costo_extra_estiba', 'precio_extra_estiba',
        'precio_servicio', 'precio_total_servicio', 'utilidad', 'igv', 'fecha_pago', 'fecha_liquidacion',
        'fecha_factura', 'num_factura', 'monto_factura')
        ->join('clientes', 'clientes.id', '=', 'servicios.cliente_id')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio_id')
        ->get();
        return $type ;
        /*$table->integer('lineas_productos_id')->unsigned();   
        $table->foreign('lineas_productos_id')->references('id')->on('lineas_productos');
        $table->integer('estados_pago_id')->unsigned();   
        $table->foreign('estados_pago_id')->references('id')->on('estados_pagos');
        $table->integer('cliente_id')->unsigned();   
        $table->foreign('cliente_id')->references('id')->on('clientes');
        $table->integer('tipo_servicio_id')->unsigned();   
        $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');
        $table->integer('modos_pagos_id')->unsigned(); 
        $table->foreign('modos_pagos_id')->references('id')->on('modo_pagos');*/
    }
     public function headings(): array
    {
        return [
            'Nro',
            'Fecha Servicio',
            'Tipo de Servicio',
            'Ruc',
            'Razon Social',
            'Empresa Transporte',
            'Conductor',
            'Placa Unidad',
            'Placa Carretera',
            'Guia Transportista',
            'Almacen',
            'Cantidad',
            'Unidad',
            'Costo Unitario Estiba',
            'Costo Operativo Extra Estiba',
            'Costo Flat Estiba',
            'Costo Total Servicio',
            'Costo Extra Estiba',
            'Precio Extra Estiba',
            'Precio Servicio',
            'Precio Total Servicio',
            'Utilidad',
            'Igv',
            'Fecha Pago',
            'Fecha Liquidacion',
            'Fecha Factura',
            'Numero Factura',
            'Monto Factura'
        ];
    }
}