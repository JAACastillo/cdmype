<?php

//Paso 1
Route::get('empresas/paso/creacion', ['as' => 'pasoEmpresa', 'uses' => 'EmpresaController@empresa']);
Route::post('empresas/paso/creacion', ['as' => 'pasoEmpresa', 'uses' => 'EmpresaController@empresaGuardar']);

//Paso 2
Route::get('empresas/paso/empresario/{idEmpresa}', ['as' => 'pasoEmpresario', 'uses' => 'EmpresaController@empresario']);
Route::post('empresas/paso/empresario', ['as' => 'pasoEmpresarioGuardar', 'uses' => 'EmpresaController@empresarioGuardar']);

Route::get('empresas/paso/termino/{idEmpresa}', ['as' => 'pasoTermino', 'uses' => 'EmpresaController@termino']);



Route::resource('empresas','EmpresaController');

            