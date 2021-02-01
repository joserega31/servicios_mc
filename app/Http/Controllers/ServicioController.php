<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function vistaServicio(){
        return view('servicio');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Servicio= DB::select('SELECT s.*, c.razon_social as cliente FROM servicios AS s INNER JOIN clientes as c ON s.cliente_id= c.id');
        return $Servicio;
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
            $servicio = new Servicio();
            $servicio->ordenes_servicios_id = $request->ordenes_servicios_id;
            $servicio->conductor = $request->conductor;
            $servicio->placa_unidad = $request->placa_unidad;
            $servicio->placa_carretera = $request->placa_carretera;
            $servicio->guia_transportista = $request->guia_transportista;
            $servicio->cantidad = $request->cantidad;
            $servicio->unidad_id = $request->unidad_id;
            $servicio->precio_extra_estiba = $request->precio_extra_estiba;
            $servicio->precio_servicio = $request->precio_servicio;
            $servicio->precio_total_servicio = $request->precio_total_servicio;
            $servicio->utilidad = $request->utilidad;
            $servicio->igv = $request->igv;
            $servicio->lineas_productos_id = $request->lineas_productos_id;
            $servicio->tipo_servicio_id = $request->tipo_servicio_id;
            $servicio->observaciones = $request->observaciones;
            $servicio->save();
            return $servicio;
        } catch (Exception $ex) {
            return $ex;
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
        $Servicio = Servicio::where('id', $id)->first(); 
        return $Servicio; 
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
        try{
            $servicio = Servicio::findOrFail($id);
            $servicio->conductor = $request->conductor;
            $servicio->placa_unidad = $request->placa_unidad;
            $servicio->placa_carretera = $request->placa_carretera;
            $servicio->guia_transportista = $request->guia_transportista;
            $servicio->cantidad = $request->cantidad;
            $servicio->unidad_id = $request->unidad_id;
            $servicio->precio_extra_estiba = $request->precio_extra_estiba;
            $servicio->precio_servicio = $request->precio_servicio;
            $servicio->precio_total_servicio = $request->precio_total_servicio;
            $servicio->utilidad = $request->utilidad;
            $servicio->igv = $request->igv;
            $servicio->lineas_productos_id = $request->lineas_productos_id;
            $servicio->tipo_servicio_id = $request->tipo_servicio_id;
            $servicio->observaciones = $request->observaciones;
            $servicio->update();
            return $servicio;
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Servicio = Servicio::find($id);
        $Servicio->delete();
    }

    
}
