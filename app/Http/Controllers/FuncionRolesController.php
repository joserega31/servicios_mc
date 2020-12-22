<?php

namespace App\Http\Controllers;

use App\Models\FuncionRoles;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class FuncionRolesController extends Controller
{
    
    public function vistafuncionrol(){
        return view('funcionrol');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FuncionRoles= DB::select('SELECT fr.*, r.nombre as rol, m.nombre as nommenu, sb.nombre as nomsubmenu FROM ((funcion_roles AS fr INNER JOIN roles as r ON fr.rol_id= r.id) INNER JOIN menus as m ON fr.menu_id= m.id) INNER JOIN sub_menus as sb ON fr.sub_menu_id= sb.id');
        return $FuncionRoles;
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
            $FuncionRoles = new FuncionRoles();
            $FuncionRoles->rol_id = $request->rol_id;
            $FuncionRoles->menu_id = $request->menu_id;
            $FuncionRoles->sub_menu_id = $request->sub_menu_id;
            $FuncionRoles->crear = $request->crear;
            $FuncionRoles->editar = $request->editar;
            $FuncionRoles->eliminar = $request->eliminar;
            $FuncionRoles->save();
            return $FuncionRoles;
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
            $FuncionRoles = FuncionRoles::findOrFail($id);
            $FuncionRoles->crear = $request->crear;
            $FuncionRoles->editar = $request->editar;
            $FuncionRoles->eliminar = $request->eliminar;
            $FuncionRoles->update();
            return $FuncionRoles;
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
        $FuncionRoles = FuncionRoles::find($id);
        $FuncionRoles->delete();
    }
}
