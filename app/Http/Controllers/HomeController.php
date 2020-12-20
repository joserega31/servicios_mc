<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, s.facturado, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE S.facturado=0');
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
        $servicioPte= DB::select('SELECT COUNT(IF(facturado = 1, 1, NULL)) as totptefacturar, COUNT(IF(estados_pago_id = 1, 1, NULL)) as totpago, COUNT(IF(estados_pago_id = 2, 1, NULL)) as totpagodet, sum(precio_total_servicio) as totalservicio, sum(monto_factura) as totalfacturado, count(id) as totalGeneral  FROM servicios');
        return $servicioPte;
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
            if ($request->facturado==1){
                $Servicio->fecha_pago = $request->fecha_pago;
                $Servicio->fecha_liquidacion = new \DateTime();
            }else{
                $Servicio->fecha_factura = $request->fecha_factura;
                $Servicio->num_factura = $request->num_factura;
                $Servicio->monto_factura = $request->monto_factura;
                $Servicio->facturado = 1;
            }
            $Servicio->update();
        } catch (Exception $ex) {
            return $this->JsonResponseError($ex, 'exception');
        }
    }
    
}
