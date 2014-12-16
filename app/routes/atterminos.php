<?php

	//Ver
		Route::get('asistencia-tecnica/ver/{idTermino}', ['as' => 'verAsistencia', 'uses' => 'AtTerminoController@verAsistencia']);
	//Eliminar
		Route::any('asistencia-tecnica/eliminar/{idTermino}', ['as' => 'eliminarAsistencia', 'uses' => 'AtTerminoController@eliminarAsistencia']);

//return View::make('asistencia-tecnica.creacion-paso-1');
Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'pasoEmpresaController@empresa']);
Route::post('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'pasoEmpresaController@empresaGuardar']);



Route::get('asistencia-tecnica/paso/terminos/{idEmpresa}', ['as' => 'atPasoTerminos', 'uses' => 'pasoTerminosController@terminos']);
Route::post('asistencia-tecnica/paso/terminos', ['as' => 'atCrearTDR', 'uses' => 'pasoTerminosController@terminosGuardar']);
Route::get('asistencia-tecnica/paso/termino/{idTermino}', ['as' => 'atPasoTermino', 'uses' => 'pasoTerminosController@termino']);
Route::patch('asistencia-tecnica/paso/termino/{idTermino}', ['as' => 'atModificarTDR', 'uses' => 'pasoTerminosController@terminoModificar']);


Route::get('asistencia-tecnica/paso/{id}', ['as' => 'atPaso', 'uses' => 'AtTerminoController@Paso']);

Route::get('asistencia-tecnica/paso/consultores/{id}', ['as' => 'atPasoConsultor', 'uses' => 'pasoConsultoresController@consultores']);
Route::post('asistencia-tecnica/paso/consultores', ['as' => 'atPasoConsultorGuardar', 'uses' => 'pasoConsultoresController@consultoresGuardar']);

// Route::post('asistencia-tecnica/paso/consultores/')
Route::post('asistencia-tecnica/paso/guardar-oferta/{id}', ['as' => 'atPasoOfertaGuardar', 'uses' => 'pasoFinalController@ofertasGuardar']);
Route::get('asistencia-tecnica/paso/agregar-oferta/{id}', ['as' => 'atPasoOferta', 'uses' => 'pasoFinalController@oferta']);
//Route::post('asistencia-tecnica/paso/consultores', ['as' => 'atPasoConsultorGuardar', 'uses' => 'AtTerminoController@consultoresGuardar']);

Route::get('asistencia-tecnica/paso/seleccionar-consultor/{id}', ['as' => 'atPasoSeleccionarConsultor', 'uses' => 'pasoFinalController@consultor']);
Route::post('asistencia-tecnica/paso/seleccionar-consultor/{id}', ['as' => 'atPasoSeleccionarConsultor', 'uses' => 'pasoFinalController@consultorSeleccionar']);


Route::get('asistencia-tecnica/paso/contrato/pdf/{id}', ['as' => 'atContradoPdf', 'uses' => 'pasoFinalController@pdfContrato']);

Route::get('asistencia-tecnica/paso/contrato/{id}', ['as' => 'atPasoContrato', 'uses' => 'pasoFinalController@contrato']);
Route::post('asistencia-tecnica/paso/contrato/{id}', ['as' => 'atPasoContrato', 'uses' => 'pasoFinalController@contratoGuardar']);
Route::post('asistencia-tecnica/paso/contratada/{id}', ['as' => 'atPasoContratada', 'uses' => 'pasoFinalController@editContrato']);
Route::get('asistencia-tecnica/paso/contratada/{id}', ['as' => 'atPasoContratada', 'uses' => 'pasoFinalController@contratada']);

Route::post('asistencia-tecnica/paso/ampliacion/{id}', ['as' => 'atAmpliacion', 'uses' => 'pasoFinalController@ampliacion']);
Route::get('asistencia-tecnica/paso/ampliacion/pdf/{id}', ['as' => 'atAmpliacionPdf', 'uses' => 'pasoFinalController@ampliacionPdf']);



Route::get('asistencia-tecnica/paso/acta/{id}', ['as' => 'atPasoActa', 'uses' => 'pasoFinalController@acta']);
Route::post('asistencia-tecnica/paso/acta/{id}', ['as' => 'atPasoActa', 'uses' => 'pasoFinalController@actaGuardar']);
Route::get('asistencia-tecnica/paso/acta-imprimir/{id}', ['as' => 'atPasoActaImprimir', 'uses' => 'pasoFinalController@actaPdf']);

Route::get('asistencia-tecnica/paso/informe/{id}', ['as' => 'atPasoInforme', 'uses' => 'pasoFinalController@informe']);
Route::post('asistencia-tecnica/paso/informe/{id}', ['as' => 'atPasoInformeGuardar', 'uses' => 'pasoFinalController@informeGuardar']);


Route::get("asistencia-tecnica/ofertas/{oferta}",
			['as' => 'atOferta', function($oferta) { return Redirect::to('assets/ofertas/' . $oferta); }]

	);

Route::get('asistencias-tecnicas', ['as' => 'asistencia-tecnica', 'uses' => 'AtTerminoController@index']);

Route::get('at/{doc}', ['as' => 'atInforme', 'uses' =>
    function($doc){
        return Redirect::to('assets/informes/'. $doc);
    }
    ]);


Route::get('asistencia-tecnica/recepcion/{id}', ['as' => 'atRecepcion', 'uses' => 'pasoFinalController@recepcion']);

Route::get('asistencia-tecnica/recibo-aporte/{id}', ['as' => 'aporteEmpresario', 'uses' => 'pasoFinalController@aporteEmpresario']);
Route::get('asistencia-tecnica/pago-aporte/{id}', ['as' => 'pagoAporte','uses' => 'pasoFinalController@pagoAporte']);

/*

	Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
	Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
	Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
	Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
	Route::get('asistencia-tecnica/paso/empresa', ['as' => 'atPasoEmpresa', 'uses' => 'AtTerminoController@empresa']);
*/
