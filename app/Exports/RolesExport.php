<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RolesExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $type = DB::table('roles')
        ->select('id','nombre')
        ->get();
        return $type ;
    }
     public function headings(): array
    {
        return [
            'Codigo',
            'Nombre'
        ];
    }
}
