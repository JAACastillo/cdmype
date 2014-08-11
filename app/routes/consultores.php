<?php

//Creacion
Route::get('consultor/creacion', ['as' => 'crearConsultor', 'uses' => 'ConsultorController@crearConsultor']);
Route::post('consultor/creacion', ['as' => 'guardarConsultor', 'uses' => 'ConsultorController@guardarConsultor']);

//Edicion
Route::get('consultor/edicion/{idConsultor}', ['as' => 'editarConsultor', 'uses' => 'ConsultorController@editarConsultor']);
Route::post('consultor/actualizacion/{idConsultor}', ['as' => 'actualizarConsultor', 'uses' => 'ConsultorController@actualizarConsultor']);

//Ver
Route::get('consultor/{idConsultor}', ['as' => 'verConsultor', 'uses' => 'ConsultorController@verConsultor']);

//Eliminar
Route::any('consultor/eliminacion/{idConsultor}', ['as' => 'eliminarConsultor', 'uses' => 'ConsultorController@eliminarConsultor']);

//Ver Especialidades
Route::post('consultor/especialidades/{idConsultor}', ['as' => 'verEspecialidades', 'uses' => 'ConsultorController@verEspecialidades']);


Route::resource('consultores','ConsultorController');
