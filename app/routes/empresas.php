<?php


//Edicion
Route::get('empresa/edicion/{idEmpresa}', ['as' => 'editarEmpresa', 'uses' => 'EmpresaController@editarEmpresa']);
Route::post('empresa/actualizacion/{idEmpresa}', ['as' => 'actualizarEmpresa', 'uses' => 'EmpresaController@actualizarEmpresa']);

//Ver
Route::get('empresa/{idEmpresa}', ['as' => 'verEmpresa', 'uses' => 'EmpresaController@verEmpresa']);

//Eliminar
Route::any('empresa/eliminacion/{idEmpresa}', ['as' => 'eliminarEmpresa', 'uses' => 'EmpresaController@eliminarEmpresa']);

Route::resource('empresas','EmpresaController');

//Pasos

	// Empresa
	Route::get('empresas/paso/creacion', ['as' => 'crearEmpresa', 'uses' => 'EmpresaController@crearEmpresa']);
	Route::post('empresas/paso/creacion', ['as' => 'guardarEmpresa', 'uses' => 'EmpresaController@guardarEmpresa']);

	// Empresa-Empresario
	Route::get('empresas/paso/empresario/{idEmpresa}', ['as' => 'pasoEmpresarios', 'uses' => 'EmpresaController@empresario']);
	Route::post('empresas/paso/empresario/{idEmpresa}', ['as' => 'pasoEmpresarios', 'uses' => 'EmpresaController@empresarioNuevo']);
	Route::post('empresas/paso/empresario', ['as' => 'pasoEmpresariosGuardar', 'uses' => 'EmpresaController@empresarioGuardar']);

	// Termino
	Route::get('empresas/paso/termino/{idEmpresa}', ['as' => 'pasoTerminoEmpresa', 'uses' => 'EmpresaController@termino']);            