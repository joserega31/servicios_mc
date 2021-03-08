<?php

namespace App\Http\Controllers;

use App\Exports\ClientesExport;
use App\Exports\ReporteGeneral2Export;
use App\Exports\ReporteGeneralExport;
use App\Exports\RolesExport;
use App\Exports\ServiciosExport;
use App\Exports\SupervisoresExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportarServicio() 
    {
        return Excel::download(new ServiciosExport, 'Lista_Servicios.xlsx');
    }
    public function exportarlstcli() 
    {
        return Excel::download(new ClientesExport, 'Lista_Clientes.xlsx');
    }
    public function exportarlstsup() 
    {
        return Excel::download(new SupervisoresExport, 'Lista_Supervisores.xlsx');
    }
    public function exportarlstuser() 
    {
        return Excel::download(new UsersExport, 'Lista_users.xlsx');
    }
    public function exportarlstroles() 
    {
        return Excel::download(new RolesExport, 'Lista_roles.xlsx');
    }
    public function exreportegeneral($fd, $fh, $ing_id,$des_ing, $ult) 
    {
        if ($ult==0){
            return Excel::download(new ReporteGeneralExport($fd, $fh, $ing_id, $des_ing), 'Reporte_General.xlsx');
        }else{
            return Excel::download(new ReporteGeneral2Export($fd, $fh, $ing_id, $des_ing), 'Reporte_General.xlsx');
        }
    }
    
}
