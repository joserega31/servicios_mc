<?php

namespace App\Http\Controllers;

use App\Models\EstadosPago;
use Illuminate\Http\Request;
use Exception;

class EstPagosController extends Controller
{
    
    public function vistaEpagos(){
        return view('estpagos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EstadosPago::all();
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
            $EstadosPago = new EstadosPago();
            $EstadosPago->nombre = $request->nombre;
            $EstadosPago->save();
            return $EstadosPago;
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
        $EstadosPago = EstadosPago::where('id', $id)->first(); 
        return $EstadosPago; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            $EstadosPago = EstadosPago::findOrFail($id);
            $EstadosPago->nombre = $request->nombre;
            $EstadosPago->update();
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
        $EstadosPago = EstadosPago::find($id);
        $EstadosPago->delete();
    }
}
