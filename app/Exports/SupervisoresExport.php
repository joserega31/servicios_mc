<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SupervisoresExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $type = DB::table('supervisores')
        ->select('id','nombres', 'apellidos', 'dni', 'numcuenta', 'cci', 'banco')
        ->get();
        return $type ;
    }
     public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Apellido',
            'Dni',
            'Numero de Cuenta',
            'CCI',
            'Banco'
        ];
    }
}
