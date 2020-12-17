<?php

namespace App\Http\Controllers;

use App\Models\Designacione;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class DesignacionesController extends Controller
{

           
    public function vistaDesig(){
        return view('designaciones');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designaciones= DB::select('select d.*, CONCAT(s.nombres, " ", s.apellidos) as supervisor, i.nombre as ingenio from (designaciones as d INNER JOIN supervisores as s ON d.supervisores_id= s.id) INNER JOIN ingenios as i ON d.ingenios_id=i.id');
        return $designaciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $Designacione = new Designacione();
            $Designacione->supervisores_id = $request->supervisores_id;
            $Designacione->ingenios_id = $request->ingenios_id;
            $Designacione->fecha_inicio = $request->fecha_inicio;
            $Designacione->fecha_fin = $request->fecha_fin;
            $Designacione->save();
            return $Designacione;
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
        try{
            $Designacione = Designacione::findOrFail($id);
            $Designacione->supervisores_id = $request->supervisores_id;
            $Designacione->ingenios_id = $request->ingenios_id;
            $Designacione->fecha_inicio = $request->fecha_inicio;
            $Designacione->fecha_fin = $request->fecha_fin;
            $Designacione->update();
            return $Designacione;
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
        $Designacione = Designacione::find($id);
        $Designacione->delete();
    }
}
