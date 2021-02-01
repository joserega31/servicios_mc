<?php

namespace App\Http\Controllers;

use App\Models\almacenes;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AlmacenesController extends Controller
{
    public function vistaAlmacenes(){ 
        return view('almacenes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes= DB::select('SELECT a.*, i.nombre as ingenio FROM almacenes as a INNER JOIN ingenios as i ON a.ingenios_id= i.id');
        return $almacenes;
    }
    
    public function almacenesxingenio($ingenio_id)
    {
        $almacenes= DB::select('SELECT id, nombre_almacen FROM almacenes WHERE ingenios_id="'.$ingenio_id. '"');
        return $almacenes;
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
            $almacenes = new almacenes();
            $almacenes->nombre_almacen = $request->nombre_almacen;
            $almacenes->ingenios_id = $request->ingenios_id;
            $almacenes->save();
            return $almacenes;
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
        $almacenes = almacenes::where('id', $id)->first(); 
        return $almacenes; 
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
            $almacenes = almacenes::findOrFail($id);
            $almacenes->nombre_almacen = $request->nombre_almacen;
            $almacenes->ingenios_id = $request->ingenios_id;
            $almacenes->update();
            return $almacenes;
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
        $almacenes = almacenes::find($id);
        $almacenes->delete();
    }
}
