<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/servicio', [App\Http\Controllers\ServicioController::class, 'vistaServicio'])->name('servicio');
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'vistaCliente'])->name('clientes');
Route::get('/maestros', [App\Http\Controllers\MestrosController::class, 'index'])->name('maestros');
Route::get('/supervisores', [App\Http\Controllers\SupervisoresController::class, 'vistaSup'])->name('supervisores');
Route::get('/ingenios', [App\Http\Controllers\IngeniosController::class, 'vistaIng'])->name('ingenios');
Route::get('/tarifarios', [App\Http\Controllers\TarifariosController::class, 'vistaTarf'])->name('tarifarios');
Route::get('/lineasprod', [App\Http\Controllers\LineasProdController::class, 'vistalprod'])->name('lineasprod');
Route::get('/metpagos', [App\Http\Controllers\MetPagosController::class, 'vistaMpagos'])->name('metpagos');
Route::get('/estpagos', [App\Http\Controllers\EstPagosController::class, 'vistaEpagos'])->name('estpagos');
Route::get('/tiposserv', [App\Http\Controllers\TiposServController::class, 'vistaTserv'])->name('tiposserv');
Route::get('/designaciones', [App\Http\Controllers\DesignacionesController::class, 'vistaDesig'])->name('designaciones');
Route::get('/reportes', [App\Http\Controllers\ReportesController::class, 'index'])->name('reportes');
Route::get('/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('configuracion');
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'vistauser'])->name('usuarios');
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'vistaroles'])->name('roles');
Route::get('/funcionrol', [App\Http\Controllers\FuncionRolesController::class, 'vistafuncionrol'])->name('funcionrol');
