<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('carga', 'HomeController@empleados_json');

Route::post('/crear_registro', 'HomeController@crea_empleado');



Route::get('domicilio/{empleado}', function ($empleado) {
		return view('domicilio')->with('empleado',$empleado);		
	});


Route::post('/agrega_dom/{parametro}', 'HomeController@agrega_domicilio');

Route::get('datosempleado/{parametro}', 'HomeController@informacion');

Route::get('carga_domicilio/{parametro}', 'HomeController@domicilio_json');


Route::get('/tabla', function () {
		return view('tabla_empleados');		
	});

Route::get('/', function () {
		return view('empleados');		
	});
