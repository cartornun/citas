<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes', 'PacienteController');
Route::resource('localizaciones', 'LocalizacionController');

Route::get('citas/citasPasadas','CitaController@citasPasadas')->name('citas.citasPasadas');
Route::resource('citas', 'CitaController');
Route::resource('enfermedades', 'EnfermedadController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/prueba', 'HomeController@index');

Route::get('/filtro-especialidad','PacienteController@getFromEspecialidad')->name('filtro-especialidad');
