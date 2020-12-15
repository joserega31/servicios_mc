<?php

namespace App\Http\Controllers;

use App\Models\LineasProducto;
use Illuminate\Http\Request;
use Exception;

class LineasProdController extends Controller
{
    public function vistalprod(){
        return view('lineasprod');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LineasProducto::all();
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
            $LineasProducto = new LineasProducto();
            $LineasProducto->nombre = $request->nombre;
            $LineasProducto->save();
            return $LineasProducto;
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
        $LineasProducto = LineasProducto::where('id', $id)->first(); 
        return $LineasProducto; 
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
            $LineasProducto = LineasProducto::findOrFail($id);
            $LineasProducto->nombre = $request->nombre;
            $LineasProducto->update();
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
        $LineasProducto = LineasProducto::find($id);
        $LineasProducto->delete();
    }
}
