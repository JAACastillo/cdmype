<?php

	Route::resource('capacitaciones' , 'CapTerminoController');

	//Ver
		Route::get('capacitacion/{idTermino}', ['as' => 'capMostrarTermino', 'uses' => 'CapTerminoController@verTermino']);
	//Eliminar
		Route::any('capacitacion/eliminacion/{idTermino}', ['as' => 'eliminarCapacitacion', 'uses' => 'CapTerminoController@eliminarCapacitacion']);

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
	Route::post('capacitaciones/paso/asistencias', ['as' => 'capPasoGuardarAsistencia', 'uses' => 'CapTerminoController@guardarAsistencia']);
	Route::post('capacitaciones/paso/asistencia', ['as' => 'capPasoActualizarAsistencia', 'uses' => 'CapTerminoController@actualizarAsistencia']);
	//Contrato


	//PDF
	Route::get('capacitaciones/paso/contrato/pdf/{id}', ['as' => 'capContradoPdf', 'uses' => 'CapTerminoController@pdfContrato']);
	Route::get('capacitaciones/paso/asistencia/pdf/{id}', ['as' => 'capAsistenciaPdf', 'uses' => 'CapTerminoController@pdfAsistencia']);

	Route::get('capacitaciones/paso/contrato/{id}', ['as' => 'capPasoContrato', 'uses' => 'CapTerminoController@contrato']);
	Route::post('capacitaciones/paso/contrato/{id}', ['as' => 'capPasoContrato', 'uses' => 'CapTerminoController@guardarContrato']);
	Route::post('capacitaciones/paso/contratada/{id}', ['as' => 'capPasoContratada', 'uses' => 'CapTerminoController@editContrato']);
	Route::get('capacitaciones/paso/contratada/{id}', ['as' => 'capPasoContratada', 'uses' => 'CapTerminoController@contratada']);

	//
	Route::get("capacitaciones/ofertas/{oferta}", 
			['as' => 'capOferta', function($oferta) { return Redirect::to('assets/ofertas/' . $oferta); }]

	);
	Route::get('capacitaciones/paso/{id}', ['as' => 'capPaso', 'uses' => 'CapTerminoController@Paso']);