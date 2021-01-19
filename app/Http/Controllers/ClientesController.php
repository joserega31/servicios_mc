<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Exception;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaCliente()
    {
        return view('clientes');
    }

    public function index()
    {
        return Cliente::all();
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
            $Cliente = new Cliente();
            $Cliente->ruc = $request->ruc;
            $Cliente->razon_social = $request->razon_social;
            $Cliente->tarifario_id = $request->tarifario_id;
            $Cliente->save();
            return $Cliente;
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

    public function show($buscar)
    {
        $Cliente = Cliente::where('razon_social', 'like', '%' . $buscar . '%')->get(); 
        return $Cliente; 
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
            $Cliente = Cliente::findOrFail($id);
            $Cliente->ruc = $request->ruc;
            $Cliente->razon_social = $request->razon_social;
            $Cliente->tarifario_id = $request->tarifario_id;
            $Cliente->update();
            return $Cliente;
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
        $Cliente = Cliente::find($id);
        $Cliente->delete();
    }
}
