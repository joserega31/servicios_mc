<?php

namespace App\Http\Controllers;

use App\Exports\ServiciosExport;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, s.facturado, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE s.facturado=0');
        return $servicioPte;
    }
    public function servicioptepago(){
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, s.facturado, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE fecha_pago is null and facturado=1');
        return $servicioPte;
    }
    public function serviciopteliq(){
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, s.facturado, s.fecha_pago, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE fecha_liquidacion is null and facturado=1 and fecha_pago is not null');
        return $servicioPte;
    }
    public function totalservicios(){
        $servicioPte= DB::select('SELECT COUNT(IF(facturado = 0, 1, NULL)) as totptefacturar, COUNT(IF(estados_pago_id = 1, 1, NULL)) as totpago, COUNT(IF(estados_pago_id = 2, 1, NULL)) as totpagodet, sum(precio_total_servicio) as totalservicio, sum(monto_factura) as totalfacturado, count(id) as totalGeneral  FROM servicios');
        return $servicioPte;
    }

    public function cargarSubmenuUsuario($menu_id, $email){
        $submenu= DB::select('SELECT sb.nombre, sb.icono, sb.url FROM ((users as u INNER JOIN roles as r ON u.rol_id= r.id) INNER JOIN funcion_roles as fr ON fr.rol_id= r.id) INNER JOIN sub_menus AS sb ON fr.sub_menu_id= sb.id where fr.menu_id= '.$menu_id.' and u.email="'.$email.'"');
        return $submenu;
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
            $Servicio = Servicio::findOrFail($id);
            if ($request->facturado==0){
                $Servicio->fecha_pago = $request->fecha_pago;
            }else if ($request->facturado==1){
                $Servicio->fecha_factura = $request->fecha_factura;
                $Servicio->num_factura = $request->num_factura;
                $Servicio->monto_factura = $request->monto_factura;
                $Servicio->facturado = 1;
            }else if ($request->facturado==2){
                $Servicio->fecha_liquidacion = new \DateTime();
            }
            $Servicio->update();
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');
        }
    }
    
}
