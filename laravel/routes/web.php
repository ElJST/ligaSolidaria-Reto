<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetoController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\MultimediaRelacionController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::resource('retos', RetoController::class)->except(['show']);
Route::get('web_solidaria/retos/indexsololectura', [RetoController::class, 'indexsololectura'])->name('retos.indexsololectura');
Route::get('admin/retos/index', [RetoController::class, 'index'])->name('retos.index');
Route::get('admin/retos/create', [RetoController::class, 'create'])->name('retos.create');
Route::get('/multimedia/create', [MultimediaController::class, 'create'])->name('multimedia.create');
Route::post('/multimedia', [MultimediaController::class, 'store'])->name('multimedia.store');
Route::delete('admin/retos/{id}', [RetoController::class, 'destroy'])->name('retos.destroy');
 
 
// // // // //
 
Route::get('/torneos', [FiltroController::class, 'getTorneos']);
Route::get('/centros/{torneoId}', [FiltroController::class, 'getCentros']);
Route::get('/centros-por-torneo/{torneoId}', [RetoController::class, 'centrosPorTorneo']);
Route::get('retos/{id}', [RetoController::class, 'show'])->name('retos.show');
 
//// Equipo 5 //////
 
Route::get('/centros', [CentroController::class, 'index'])->name('centros.index');
// Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
// Route::post('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
Route::match(['GET', 'POST'], '/torneos', [TorneoController::class, 'index'])->name('torneos.index');
 
Route::get('/centros/{id_torneo}', [TorneoController::class, 'centros'])->name('centros.index');
Route::resource('centros', CentroController::class);
//Route::get("/centros",[CentroController::class,"index"])->name ("centros.index");
 
Route::get('/torneos/{id}', [TorneoController::class, 'mostrarTorneo'])->name('torneos.mostrar');
 
//-------------------michael rutas-----------------------
Route::resource('admin', AdminController::class);
 
Route::resource('sede', Sede_Controller::class);
 
Route::resource('centro', Centro_Controller::class);
 
//-------------------------------------------------------
 
Route::post('/centros', [CentroController::class, 'store'])->name('centros.store');
 
 
/////////////////
//relaciones para cada grupo
Route::resource('relaciones', MultimediaRelacionController::class);
 
Route::post('relaciones/guardar', [MultimediaRelacionController::class, 'guardarMultimedia'])->name('relaciones.guardarMultimedia');
 
Route::get('web_solidaria/multimedia/formulario/{foreignkey}', [MultimediaRelacionController::class, 'index'])->name('formulario.multimedia');