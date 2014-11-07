<?php



//Edicion
Route::get('empresa/edicion/{idEmpresa}', ['as' => 'editarEmpresa', 'uses' => 'EmpresaController@editarEmpresa']);
Route::post('empresa/actualizacion/{idEmpresa}', ['as' => 'actualizarEmpresa', 'uses' => 'EmpresaController@actualizarEmpresa']);

//Ver
Route::get('empresa/{idEmpresa}', ['as' => 'verEmpresa', 'uses' => 'EmpresaController@verEmpresa']);

//Eliminar
Route::any('empresa/eliminacion/{idEmpresa}', ['as' => 'eliminarEmpresa', 'uses' => 'EmpresaController@eliminarEmpresa']);

Route::get('empresas', ['as' => 'empresas', 'uses' => 'EmpresaController@index']);

//Pasos

	// Empresa
	Route::get('empresas/paso/creacion', ['as' => 'crearEmpresa', 'uses' => 'EmpresaController@crearEmpresa']);
	Route::post('empresas/paso/creacion', ['as' => 'guardarEmpresa', 'uses' => 'EmpresaController@guardarEmpresa']);

	// Empresa-Empresario
	Route::get('empresas/paso/empresario/{idEmpresa}', ['as' => 'pasoEmpresarios', 'uses' => 'EmpresaController@empresario']);
	Route::post('empresas/paso/empresario/{idEmpresa}', ['as' => 'pasoEmpresarios', 'uses' => 'EmpresaController@empresarioNuevo']);
	Route::post('empresas/paso/empresario', ['as' => 'pasoEmpresariosGuardar', 'uses' => 'EmpresaController@empresarioGuardar']);

	// indicadores
	Route::get('empresas/paso/indicadores/{idEmpresa}', ['as' => 'empresaPasoIndicadores', 'uses' => 'EmpresaController@indicadores']);
	Route::post('empresas/paso/indicadores/{idEmpresa}', ['as' => 'empresaPasoIndicadores', 'uses' => 'EmpresaController@indicadoresGuardar']);

	Route::get('empresas/paso/indicador/{idEmpresa}', ['as' => 'empresaPasoIndicadorE', 'uses' => 'EmpresaController@indicador']);
	Route::patch('empresas/paso/indicador/{idEmpresa}', ['as' => 'empresaPasoIndicador', 'uses' => 'EmpresaController@indicadorEditar']);
	Route::get('empresas/paso/indicador/pdf/{idEmpresa}', ['as' => 'f1PDF', 'uses' => 'EmpresaController@f1']);


	Route::get('empresas/paso/termino/{idEmpresa}', ['as' => 'pasoTerminoEmpresa', 'uses' => 'EmpresaController@termino']);



	Route::get('empresas/paso/proyecto/{idEmpresa}', ['as' => 'empresaPasoProyecto', 'uses' => 'EmpresaController@proyecto']);
	Route::post('empresas/paso/proyecto/', ['as' => 'empresaPasoProyectoGuardar', 'uses' => 'EmpresaController@proyectoGuardar']);
	Route::get('empresas/paso/proyectos/{idEmpresa}', ['as' => 'empresaProyectos', 'uses' => 'EmpresaController@proyectos']);
	Route::get('empresas/paso/proyecto/editar/{idEmpresa}', ['as' => 'empresaPasoProyectoEditar', 'uses' => 'EmpresaController@proyectoEditar']);
	Route::patch('empresas/paso/proyecto/editar/{idEmpresa}', ['as' => 'empresaPasoProyectoEditar', 'uses' => 'EmpresaController@proyectoUpdate']);
	Route::get('empresas/f2/{idProyecto}', ['as' => 'empresaF2', 'uses' => 'EmpresaController@f2']);


	Route::get('empresas/paso/proyecto/seguimiento/{idProyecto}', ['as' => 'empresaPasoSeguimientoProyecto', 'uses' => 'EmpresaController@seguimientoProyecto']);
	Route::post('empresas/paso/proyecto/seguimiento/{idProyecto}', ['as' => 'empresaPasoSeguimientoProyecto', 'uses' => 'EmpresaController@seguimientoProyectoGuardar']);

	// CRM

	Route::get('empresas/proyectos/{idEmpresa}', ['as' => 'crm', 'uses' => 'CrmController@crm']);
	Route::post('empresas/proyectos/anotaciones', ['as' => 'anotaciones', 'uses' => 'CrmController@anotaciones']);


