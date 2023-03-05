<?php

use App\Http\Controllers\home;
use App\Http\Controllers\login;
use App\Http\Controllers\proyectoController;
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
Route::get('/',home::class)->name('home');
Route::get('login',[login::class,'ver_form_login'])->name('login');
Route::get('registro',[login::class,'ver_form_registro'])->name('registro');
Route::post('registro_action',[login::class,'registrar_usuario'])->name('registro_action');
Route::get('login_out',[login::class,'cerrar_sesion'])->name('login_out');
Route::get('proyecto',proyectoController::class)->name('proyecto');
