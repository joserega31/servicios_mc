<?php

namespace App\Http\Controllers;

use App\Models\OrdenesServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Exception;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home');
    }

    public function serviciopte(){
        $servicioPte= DB::select('SELECT s.id, s.fecha, s.fecha_factura, c.ruc, c.razon_social FROM ordenes_servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE s.fecha_factura is null');
        return $servicioPte;
    }
    public function servicioptepago(){
        $servicioPte= DB::select('SELECT s.id, s.fecha, s.fecha_factura, c.ruc, c.razon_social FROM ordenes_servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE s.fecha_pago is null and s.fecha_factura is not null');
        return $servicioPte;
    }
    public function serviciopteliq(){
        $servicioPte= DB::select('SELECT s.id, s.fecha, s.fecha_factura, s.fecha_pago, c.ruc, c.razon_social FROM ordenes_servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE s.fecha_liquidacion is null and s.fecha_factura is not null and s.fecha_pago is not null');
        return $servicioPte;
    }
    public function totalservicios(){
        $servicioPte= DB::select('SELECT COUNT(IF(fecha_factura is null, 1, NULL)) as totptefacturar, COUNT(IF(fecha_pago is null and fecha_factura is not null, 1, NULL)) as totpago, COUNT(IF(fecha_liquidacion is null and fecha_pago is not null and fecha_factura is not null, 1, NULL)) as totpteliquidar, sum(monto_factura) as totalfacturado, count(id) as totalGeneral  FROM ordenes_servicios');
        return $servicioPte;
    }

    public function cargarSubmenuUsuario($menu_id, $email){
        $submenu= DB::select('SELECT sb.nombre, sb.icono, sb.url FROM ((users as u INNER JOIN roles as r ON u.rol_id= r.id) INNER JOIN funcion_roles as fr ON fr.rol_id= r.id) INNER JOIN sub_menus AS sb ON fr.sub_menu_id= sb.id where fr.menu_id= '.$menu_id.' and u.email="'.$email.'" ORDER BY sb.orden');
        return $submenu;
    }

    public function cargarPermisosUser($url, $email){
        $persmisos= DB::select('SELECT fr.crear, fr.editar, fr.eliminar, r.crear_utilidad_os FROM ((users as u INNER JOIN roles as r ON u.rol_id= r.id) INNER JOIN funcion_roles as fr ON r.id=fr.rol_id) INNER JOIN sub_menus as sb ON fr.sub_menu_id= sb.id WHERE sb.url="'.$url. '" and u.email="'.$email.'"');
        return $persmisos;
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
            $OrdenesServicio = OrdenesServicio::findOrFail($id);
            if ($request->facturado==0){
                $OrdenesServicio->fecha_pago = $request->fecha_pago;

            }else if ($request->facturado==1){
                $OrdenesServicio->fecha_factura = $request->fecha_factura;
                $OrdenesServicio->num_factura = $request->num_factura;
                $OrdenesServicio->monto_factura = $request->monto_factura;

            }else if ($request->facturado==2){
                $OrdenesServicio->fecha_liquidacion = new \DateTime();
            }
            $OrdenesServicio->update();
        } catch (Exception $ex) {
            return $ex;
        }
    }
    
}
