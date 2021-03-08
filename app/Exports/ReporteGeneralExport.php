<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ReporteGeneralExport implements FromCollection,WithHeadings, ShouldAutoSize,WithCustomStartCell, WithEvents
{
    public function __construct($fd, $fh, $ing_id, $des_ing)
    {
        $this->fd = $fd;
        $this->fh = $fh;
        $this->ing_id = $ing_id;
        $this->des_ing = $des_ing;
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
        'guia_transportista', 'descripcion_larga', 'cantidad',
        'lineas_productos.nombre','servicios.igv', 'precio_total_servicio')
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

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [['REPORTE GENERAL DE ORDENES DE SERVICIO'],
                ['FECHA DESDE: ' . $this->fd . '       HASTA: '. $this->fh],
                ['INGENIO: ' . $this->des_ing],
                [],
                [
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
        ]];
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->mergeCells('A2:O2');
                $event->sheet->getStyle('A2')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('A3:O3');
                $event->sheet->getStyle('A3')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->mergeCells('A4:O4');
                $event->sheet->getStyle('A4')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A6:O6')->getFont()->setBold(true);
                $event->sheet->setCellValue('L'. ($event->sheet->getHighestRow()+1), '=SUM(L7:L'.$event->sheet->getHighestRow().')');
                $event->sheet->setCellValue('M'. ($event->sheet->getHighestRow()), '=SUM(M7:M'.($event->sheet->getHighestRow()-1).')');
            }
        ];
    }
    
}