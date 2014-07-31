<?php

//return View::make('asistencia-tecnica.creacion-paso-1');
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
Route::post('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresaGuardar']);



Route::get('asistencia-tecnica/paso/terminos/{idEmpresa}', ['as' => 'atPasoTerminos', 'uses' => 'AtTerminoController@terminos']);
Route::post('asistencia-tecnica/paso/terminos', ['as' => 'atCrearTDR', 'uses' => 'AtTerminoController@terminosGuardar']);


Route::get('asistencia-tecnica/paso/{id}', ['as' => 'atPaso', 'uses' => 'AtTerminoController@Paso']);
Route::get('asistencia-tecnica/paso/consultores/{id}', ['as' => 'atPasoConsultor', 'uses' => 'AtTerminoController@consultores']);

// Route::post('asistencia-tecnica/paso/consultores/')


Route::resource('asistencia-tecnica' , 'AtTerminoController');

/*
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
*/