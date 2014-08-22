<?php

//Edicion
Route::get('empresario/edicion/{idEmpresario}', ['as' => 'editarEmpresario', 'uses' => 'EmpresarioController@editarEmpresario']);
Route::post('empresario/actualizacion/{idEmpresario}', ['as' => 'actualizarEmpresario', 'uses' => 'EmpresarioController@actualizarEmpresario']);

//Ver
Route::get('empresario/{idEmpresario}', ['as' => 'verEmpresario', 'uses' => 'EmpresarioController@verEmpresario']);

//Eliminar
Route::any('empresario/eliminacion/{idEmpresario}', ['as' => 'eliminarEmpresario', 'uses' => 'EmpresarioController@eliminarEmpresario']);

Route::get('empresarios', ['as' => 'empresarios', 'uses' => 'EmpresarioController@index']);

//Pasos

	//Paso 1
	Route::get('empresario/paso/creacion', ['as' => 'crearEmpresario', 'uses' => 'EmpresarioController@crearEmpresario']);
	Route::post('empresario/paso/creacion', ['as' => 'guardarEmpresario', 'uses' => 'EmpresarioController@guardarEmpresario']);

	//Paso 2
	Route::get('empresario/paso/empresa/{idEmpresario}', ['as' => 'pasoEmpresa', 'uses' => 'EmpresarioController@empresa']);
	Route::post('empresario/paso/empresa/{idEmpresario}', ['as' => 'pasoEmpresa', 'uses' => 'EmpresarioController@empresaNueva']);
	Route::post('empresario/paso/empresa', ['as' => 'pasoGuardarEmpresa', 'uses' => 'EmpresarioController@guardarEmpresa']);

	//Paso 3
	Route::get('empresario/paso/socios/{idEmpresa}', ['as' => 'pasoSocios', 'uses' => 'EmpresarioController@socios']);
	Route::post('empresario/paso/socios/{idEmpresa}', ['as' => 'pasoSocios', 'uses' => 'EmpresarioController@nuevoSocio']);
	Route::post('empresario/paso/socios', ['as' => 'pasoGuardarSocios', 'uses' => 'EmpresarioController@guardarSocios']);

	//Paso 4
	Route::get('empresario/paso/termino/{idEmpresa}', ['as' => 'pasoTerminoEmpresario', 'uses' => 'EmpresarioController@termino']);


	
