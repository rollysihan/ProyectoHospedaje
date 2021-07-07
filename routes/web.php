<?php

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
//Lado del administrador
Route::get('/AdministracionMaroly', function () {
    return view('MenuAdmin.menuNav');
});


//ruta para dirigir al formualrio de creacion de servicios//el metodo name es un alias o un nombre para la ruta el cual utilizaremos
//para accerder a esta ruta mediante el metodo {{route('form.vista')}}
Route::get('/Servicios','ServicioController@formvista')->name('form.vista');
Route::post('/servicios/registrar','ServicioController@registrarservicio')->name('registrar.servicio');
//para ver los serviciso creados
Route::get('/servicios/ver','ServicioController@servicioVer')->name('ver.servicio');
//para borrar los servicios
Route::delete('/servicio/borrar/{id}','ServicioController@servicioBorrar')->name('servicio.borrar');

//para editar los servicios
Route::get('/servicio/editar/{id}','ServicioController@servicioEditar')->name('servicio.editar');
Route::patch('/servicio/actuliazar/{id}','ServicioController@servicioActualizar')->name('servicio.actualizar');