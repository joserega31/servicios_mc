<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientesExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $type = DB::table('clientes')
        ->select('id','ruc', 'razon_social')
        ->get();
        return $type ;
    }
     public function headings(): array
    {
        return [
            'Nro',
            'Ruc',
            'Razon Social'
        ];
    }
}