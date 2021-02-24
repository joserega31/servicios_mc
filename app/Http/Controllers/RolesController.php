<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Exception;

class RolesController extends Controller
{
    public function vistaroles(){
        return view('roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Roles::all();
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
            $Roles = new Roles();
            $Roles->nombre = $request->nombre;
            $Roles->crear_utilidad_os= $request->crear_utilidad_os;
            $Roles->save();
            return $Roles;
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
        $Roles = Roles::where('id', $id)->first(); 
        return $Roles; 
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
            $Roles = Roles::findOrFail($id);
            $Roles->nombre = $request->nombre;
            $Roles->crear_utilidad_os= $request->crear_utilidad_os;
            $Roles->update();
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
        $Roles = Roles::find($id);
        $Roles->delete();
    }
}
