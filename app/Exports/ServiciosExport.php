<?php

namespace App\Exports;

use App\Models\Servicio;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServiciosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Servicio::all();
    }
}
