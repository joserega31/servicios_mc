<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $type = DB::table('users')
        ->select('users.id','name', 'email', 'nombre')
        ->join('roles', 'roles.id', '=', 'users.rol_id')
        ->get();
        return $type ;
    }
     public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Correo',
            'Rol'
        ];
    }
}
