<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarifario;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class TarifariosController extends Controller
{
    
    public function vistaTarf(){
        return view('tarifarios');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Tarifario= DB::select('SELECT id, nombre, if(vigente=0, "NO", "SI") as vigented, vigente FROM tarifarios');
       return $Tarifario;
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
            $Tarifario = new Tarifario();
            $Tarifario->nombre = $request->nombre;
            $Tarifario->vigente = $request->vigente;
            $Tarifario->save();
            return $Tarifario;
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
        $Tarifario = Tarifario::where('id',$id)->first();    
        /*$cliente = Cliente::where('id','=',$Tarifario->clientes_id)->get();

        $data =[
            'Tarifario'=>$Tarifario,
            'cliente'=>$cliente
        ];*/
        return $Tarifario;
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
            $Tarifario = Tarifario::findOrFail($id);
            $Tarifario->nombre = $request->nombre;
            $Tarifario->vigente = $request->vigente;
            $Tarifario->update();
            return $Tarifario;
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
        $Tarifario = Tarifario::find($id);
        $Tarifario->delete();
    }
}
