<?php

	Route::get('capacitaciones', ['as' => 'capacitaciones', 'uses' => 'CapTerminoController@index']);

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
	//Convocatoria
	Route::get('capacitaciones/paso/convocatoria/{id}', ['as' => 'capPasoConvocatoria', 'uses' => 'CapTerminoController@convocatoria']);
	Route::post('capacitaciones/paso/convocatoria', ['as' => 'capPasoGuardarConvocatoria', 'uses' => 'CapTerminoController@guardarConvocatoria']);
	Route::post('capacitaciones/paso/Convocatoria/{id}', ['as' => 'capPasoActualizarConvocatoria', 'uses' => 'CapTerminoController@actualizarConvocatoria']);
	Route::get('capacitaciones/paso/convocatoria/pdf/{id}', ['as' => 'capConvocatoriaPdf', 'uses' => 'CapTerminoController@pdfConvocatoria']);

	//Ofertas
	Route::get('capacitaciones/paso/agregar-oferta/{id}', ['as' => 'capPasoOferta', 'uses' => 'CapTerminoController@oferta']);
	Route::post('capacitaciones/paso/guardar-oferta/{id}', ['as' => 'capPasoGuardarOferta', 'uses' => 'CapTerminoController@guardarOfertas']);

	Route::get('capacitaciones/paso/seleccionar-consultor/{id}', ['as' => 'capPasoSeleccionarConsultor', 'uses' => 'CapTerminoController@consultor']);
	Route::post('capacitaciones/paso/seleccionar-consultor/{id}', ['as' => 'capPasoSeleccionarConsultor', 'uses' => 'CapTerminoController@seleccionarConsultor']);

	//Asistencia
	Route::get('capacitaciones/paso/asistencias/{id}', ['as' => 'capPasoAsistencia', 'uses' => 'CapTerminoController@asistencia']);
	Route::post('capacitaciones/paso/asistencias/{id}', ['as' => 'capPasoActualizarAsistencia', 'uses' => 'CapTerminoController@actualizarAsistencia']);

	//PDF
	Route::get('capacitaciones/paso/contrato/pdf/{id}', ['as' => 'capContradoPdf', 'uses' => 'CapTerminoController@pdfContrato']);
	Route::get('capacitaciones/paso/asistencia/pdf/{id}', ['as' => 'capAsistenciaPdf', 'uses' => 'CapTerminoController@pdfAsistencia']);

	//Contrato
	Route::get('capacitaciones/paso/contrato/{id}', ['as' => 'capPasoContrato', 'uses' => 'CapTerminoController@contrato']);
	Route::post('capacitaciones/paso/contrato/{id}', ['as' => 'capPasoContrato', 'uses' => 'CapTerminoController@guardarContrato']);
	Route::post('capacitaciones/paso/contratada/{id}', ['as' => 'capPasoContratada', 'uses' => 'CapTerminoController@editContrato']);
	Route::get('capacitaciones/paso/contratada/{id}', ['as' => 'capPasoContratada', 'uses' => 'CapTerminoController@contratada']);

	Route::get('capacitaciones/paso/informe/{id}', ['as' => 'capPasoInforme', 'uses' => 'CapTerminoController@informe']);
	Route::post('capacitaciones/paso/informe/{id}', ['as' => 'capPasoInformeGuardar', 'uses' => 'CapTerminoController@informeGuardar']);

	Route::get('cap/{doc}', ['as' => 'CapInforme', 'uses' =>
    function($doc){
        return Redirect::to('assets/informes/'. $doc);
    }
    ]);

	//
	Route::get("capacitaciones/ofertas/{oferta}",
			['as' => 'capOferta', function($oferta) { return Redirect::to('assets/ofertas/' . $oferta); }]

	);
	Route::get('capacitaciones/paso/{id}', ['as' => 'capPaso', 'uses' => 'CapTerminoController@Paso']);
	Route::get('capacitaciones/recepcion/{id}', ['as' => 'capRecepcion', 'uses' => 'CapTerminoController@recepcion']);
