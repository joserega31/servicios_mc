<?php

namespace App\Http\Controllers;

use App\Models\Supervisores;
use Illuminate\Http\Request;
USE Exception;

class SupervisoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaSup(){
        return view('supervisores');
    }

    public function index()
    {
        return Supervisores::all();
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
            $Supervisores = new Supervisores();
            $Supervisores->dni = $request->dni;
            $Supervisores->nombres = $request->nombres;
            $Supervisores->apellidos = $request->apellidos;
            $Supervisores->numcuenta = $request->numcuenta;
            $Supervisores->cci = $request->cci;
            $Supervisores->banco = $request->banco;
            $Supervisores->save();
            return $Supervisores;
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
            $Supervisores = Supervisores::findOrFail($id);
            $Supervisores->dni = $request->dni;
            $Supervisores->nombres = $request->nombres;
            $Supervisores->apellidos = $request->apellidos;
            $Supervisores->numcuenta = $request->numcuenta;
            $Supervisores->cci = $request->cci;
            $Supervisores->banco = $request->banco;
            $Supervisores->update();
            return $Supervisores;
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
        $Supervisores = Supervisores::find($id);
        $Supervisores->delete();
    }
}
