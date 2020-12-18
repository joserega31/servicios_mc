<?php

use App\Models\comentarios;
use App\Models\comercio;
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

Route::get('serviciopte', 'App\Http\Controllers\HomeController@serviciopte');
Route::get('servicioptepago', 'App\Http\Controllers\HomeController@servicioptepago');
Route::get('servicioptepagodet', 'App\Http\Controllers\HomeController@servicioptepagodet');
Route::get('totalservicios', 'App\Http\Controllers\HomeController@totalservicios');