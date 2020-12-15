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