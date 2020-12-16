<?php

namespace App\Http\Controllers;

use App\Models\ModoPago;
use Illuminate\Http\Request;
use Exception;

class MetPagosController extends Controller
{
    public function vistaMpagos(){
        return view('metpagos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModoPago::all();
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
            $ModoPago = new ModoPago();
            $ModoPago->nombre = $request->nombre;
            $ModoPago->save();
            return $ModoPago;
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
        $ModoPago = ModoPago::where('id', $id)->first(); 
        return $ModoPago; 
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
            $ModoPago = ModoPago::findOrFail($id);
            $ModoPago->nombre = $request->nombre;
            $ModoPago->update();
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
        $ModoPago = ModoPago::find($id);
        $ModoPago->delete();
    }
}
