<?php

namespace App\Http\Controllers;

use App\Models\OrdenesServicio;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OrdenesServicio= DB::select('SELECT o.*, c.razon_social as cliente FROM ordenes_servicios AS o INNER JOIN clientes as c ON o.cliente_id= c.id');       
        return $OrdenesServicio;
    }
    public function cargarServiciosOrden($id){
        $servicios= DB::select('SELECT * FROM servicios WHERE ordenes_servicios_id="'.$id.'"');
        return $servicios;
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
        try{
            $OrdenesServicio = new OrdenesServicio();
            $OrdenesServicio->fecha = $request->fecha;
            $OrdenesServicio->cliente_id = $request->cliente_id;
            $OrdenesServicio->igv = 1;
            $OrdenesServicio->estatus = 0;
            $OrdenesServicio->estados_pago_id = $request->estados_pago_id;
            $OrdenesServicio->ingenio_id = $request->ingenio_id;
            $OrdenesServicio->modos_pagos_id = $request->modos_pagos_id;
            $OrdenesServicio->save();
            return $OrdenesServicio;
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $OrdenesServicio = OrdenesServicio::where('id', $id)->first(); 
        return $OrdenesServicio;
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
       /* try{
            $OrdenesServicio = OrdenesServicio::findOrFail($id);
            $OrdenesServicio->fecha = $request->fecha;
            $OrdenesServicio->cliente_id = $request->cliente_id;
            $OrdenesServicio->igv = $request->igv;
            $OrdenesServicio->update();
            return $OrdenesServicio;
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $OrdenesServicio = OrdenesServicio::find($id);
        $OrdenesServicio->delete();
    }
}
