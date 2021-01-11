<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('cors')->group(function(){
    //Rutas a las que se permitirá acceso
    Route::resource('servicios', 'App\Http\Controllers\ServicioController'::class);
    Route::resource('clientes', 'App\Http\Controllers\ClientesController'::class);
    Route::resource('supervisores', 'App\Http\Controllers\SupervisoresController'::class);
    Route::resource('ingenios', 'App\Http\Controllers\IngeniosController'::class);
    Route::resource('LineasProd', 'App\Http\Controllers\LineasProdController'::class);
    Route::resource('metpagos', 'App\Http\Controllers\MetPagosController'::class);
    Route::resource('estpagos', 'App\Http\Controllers\EstPagosController'::class);
    Route::resource('tiposserv', 'App\Http\Controllers\TiposServController'::class);
    Route::resource('tarifarios', 'App\Http\Controllers\TarifariosController'::class);
    Route::resource('designaciones', 'App\Http\Controllers\DesignacionesController'::class);
    Route::resource('home', 'App\Http\Controllers\HomeController'::class);
    Route::resource('roles', 'App\Http\Controllers\RolesController'::class);
    Route::resource('funcionroles', 'App\Http\Controllers\FuncionRolesController'::class);
    Route::resource('menu', 'App\Http\Controllers\MenuController'::class);
    Route::resource('submenu', 'App\Http\Controllers\SubMenuController'::class);
    Route::resource('usuarios', 'App\Http\Controllers\UsuariosController'::class);
    Route::get('serviciopte', 'App\Http\Controllers\HomeController@serviciopte');
    Route::get('servicioptepago', 'App\Http\Controllers\HomeController@servicioptepago');
    Route::get('servicioptepagodet', 'App\Http\Controllers\HomeController@servicioptepagodet');
    Route::get('serviciopteliq', 'App\Http\Controllers\HomeController@serviciopteliq');
    Route::get('totalservicios', 'App\Http\Controllers\HomeController@totalservicios');
    Route::get('submenuxusuario/{id}/{email}', 'App\Http\Controllers\HomeController@cargarSubmenuUsuario');
    
    //REPORTES
    Route::get('exportarservicio', 'App\Http\Controllers\ReportesController@exportarServicio');
    Route::get('exportarlstcli', 'App\Http\Controllers\ReportesController@exportarlstcli');
    Route::get('exportarlstsup', 'App\Http\Controllers\ReportesController@exportarlstsup');
    Route::get('exportarlstuser', 'App\Http\Controllers\ReportesController@exportarlstuser');
    Route::get('exportarlstroles', 'App\Http\Controllers\ReportesController@exportarlstroles');
});