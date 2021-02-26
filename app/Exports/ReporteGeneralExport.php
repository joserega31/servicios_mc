<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReporteGeneralExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function __construct($fd, $fh, $ing_id)
    {
        $this->fd = $fd;
        $this->fh = $fh;
        $this->ing_id = $ing_id;
        return $this;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $type = DB::table('servicios')
        ->select('servicios.id', 'fecha','razon_social',  
        'ruc', 'conductor','placa_unidad','placa_carretera', 
        'guia_transportista', 'descripcion_larga', 'cantidad','lineas_productos.nombre','servicios.igv', 'precio_total_servicio')
        ->join('ordenes_servicios', 'ordenes_servicios.id', '=', 'servicios.ordenes_servicios_id')
        ->join('clientes', 'clientes.id', '=', 'ordenes_servicios.cliente_id')
        ->join('tipo_servicios', 'tipo_servicios.id', '=', 'servicios.tipo_servicio_id')
        ->join('unidades', 'unidades.id', '=', 'servicios.unidad_id')
        ->join('lineas_productos', 'lineas_productos.id', '=', 'servicios.lineas_productos_id')
        ->where('fecha','>=', $this->fd)
        ->where('fecha','<=', $this->fh)
        ->where('ordenes_servicios.ingenio_id','=', $this->ing_id)
        ->get();
        return $type ;
    }
     public function headings(): array
    {
        return [
            'Nro',
            'Fecha',
            'Empresa de transporte',
            'Ruc',
            'Conductor',
            'Placa Unidad',
            'Placa Carretera',
            'Guia Transportista',
            'Peso (TM)',
            'Cantidad de cajas',
            'Mercancia',
            'Igv',
            'Total'
        ];
    }
}