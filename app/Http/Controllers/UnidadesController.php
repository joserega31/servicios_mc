<?php

namespace App\Http\Controllers;

use App\Models\unidades;
use Illuminate\Http\Request;
use Exception;

class UnidadesController extends Controller
{
    public function vistaUnidades(){
        return view('unidades');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return unidades::all();
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
            $unidades = new unidades();
            $unidades->descripcion_corta = $request->descripcion_corta;
            $unidades->descripcion_larga = $request->descripcion_larga;
            $unidades->save();
            return $unidades;
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
        $unidades = unidades::where('id', $id)->first(); 
        return $unidades; 
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
            $unidades = unidades::findOrFail($id);
            $unidades->descripcion_corta = $request->descripcion_corta;
            $unidades->descripcion_larga = $request->descripcion_larga;
            $unidades->update();
            return $unidades;
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
        $unidades = unidades::find($id);
        $unidades->delete();
    }
}
