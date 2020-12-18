<?php

namespace App\Http\Controllers;

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
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE S.facturado=0');
        return $servicioPte;
    }
    public function servicioptepago(){
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE S.estados_pago_id=1');
        return $servicioPte;
    }
    public function servicioptepagodet(){
        $servicioPte= DB::select('SELECT s.id, s.fecha_servicio, c.ruc, c.razon_social FROM servicios as s INNER JOIN clientes as c ON s.cliente_id= c.id WHERE S.estados_pago_id=2');
        return $servicioPte;
    }
    public function totalservicios(){
        $servicioPte= DB::select('SELECT COUNT(IF(facturado = 1, 1, NULL)) as totptefacturar, COUNT(IF(estados_pago_id = 1, 1, NULL)) as totpago, COUNT(IF(estados_pago_id = 2, 1, NULL)) as totpagodet, sum(precio_servicio) as totalservicio, sum(precio_total_servicio) as totalfacturado, count(id) as totalGeneral  FROM servicios');
        return $servicioPte;
    }
    
}
