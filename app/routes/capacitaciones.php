<?php

	Route::resource('capacitaciones' , 'CapTerminoController');

//Pasos

	//Terminos
	Route::get('capacitaciones/paso/termino', ['as' => 'capCrearTermino', 'uses' => 'CapTerminoController@crearTermino']);
	Route::post('capacitaciones/paso/terminos', ['as' => 'capGuardarTermino', 'uses' => 'CapTerminoController@guardarTermino']);
	
	Route::get('capacitaciones/paso/termino/{idTermino}', ['as' => 'capModificarTermino', 'uses' => 'CapTerminoController@modificarTermino']);
	Route::patch('capacitaciones/paso/termino/{idTermino}', ['as' => 'actualizarTermino', 'uses' => 'CapTerminoController@actualizarTermino']);
	
	//seleccionar consultores
	Route::get('capacitaciones/paso/consultores/{id}', ['as' => 'capPasoConsultor', 'uses' => 'CapTerminoController@consultores']);
	Route::post('capacitaciones/paso/consultores', ['as' => 'capPasoGuardarConsultor', 'uses' => 'CapTerminoController@guardarConsultores']);
	//Ofertas
	Route::get('capacitaciones/paso/agregar-oferta/{id}', ['as' => 'capPasoOferta', 'uses' => 'CapTerminoController@oferta']);
	Route::post('capacitaciones/paso/guardar-oferta/{id}', ['as' => 'capPasoGuardarOferta', 'uses' => 'CapTerminoController@guardarOfertas']);
	
	Route::get('capacitaciones/paso/seleccionar-consultor/{id}', ['as' => 'capPasoSeleccionarConsultor', 'uses' => 'CapTerminoController@consultor']);
	Route::post('capacitaciones/paso/seleccionar-consultor/{id}', ['as' => 'capPasoSeleccionarConsultor', 'uses' => 'CapTerminoController@seleccionarConsultor']);
	//Asistencia
	Route::get('capacitaciones/paso/asistencia/{id}', ['as' => 'capPasoAsistencia', 'uses' => 'CapTerminoController@asistencia']);
	Route::post('capacitaciones/paso/asistencia', ['as' => 'capPasoGuardarAsistencia', 'uses' => 'CapTerminoController@guardarAsistecnia']);


	Route::get('capacitaciones/paso/{id}', ['as' => 'capPaso', 'uses' => 'CapTerminoController@Paso']);