<?php

class EventosController extends \BaseController {

	/**
	 * Display a listing of eventos
	 *
	 * @return Response
	 */
	public function index()
	{
		$eventos = Evento::all();

		return View::make('eventos.index', compact('eventos'));
	}

	/**
	 * Show the form for creating a new evento
	 *
	 * @return Response
	 */
	public function create()
	{
		$evento = new Evento;
		$pasoReal = 1;
		$pasoActual = 1;
		$id = 0;

		$accion = array('route' => 'eventos.store', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

		return View::make('eventos.create', compact('evento', 'pasoActual', 'pasoReal', 'accion', 'id'));
	}

	/**
	 * Store a newly created evento in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Evento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		 $evento = new Evento;
		 $evento->fill($data);
		 $evento->save();

		return Redirect::route('eventosParticipantes',$evento->id );
	}

	/**
	 * Display the specified evento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$evento = Evento::findOrFail($id);

		return View::make('eventos.show', compact('evento'));
	}

	/**
	 * Show the form for editing the specified evento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if($id != 0){
			$evento = Evento::find($id);
			$pasoReal = 2;
			$pasoActual = 1;
			$accion = array('route' => array('eventos.update',$id), 'method' => 'PATCH', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

			return View::make('eventos.create', compact('evento', 'pasoActual', 'pasoReal', 'accion', 'id'));
		}
		return Redirect::back();
		// return View::make('eventos.edit', compact('evento'));
	}

	/**
	 * Update the specified evento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$evento = Evento::find($id);

		$validator = Validator::make($data = Input::all(), Evento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		// return $evento;
		$evento->fill($data);
		$evento->save();

		return Redirect::route('eventosParticipantes',$evento->id );
	}

	/**
	 * Remove the specified evento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Evento::destroy($id);

		return Redirect::route('eventos.index');
	}



//participantes a evento

	public function participantes($id){
		$asistencias = EventoEmpresarios::with('empresario', 'empresario.empresa', 'empresario.empresa.empresas')
										->where('evento_id', $id)->get();
		$pasoReal = 2;
		$pasoActual = 2;

		return View::make('eventos.participantes', compact('asistencias', 'id', 'pasoReal', 'pasoActual'));
	}

	public function participantesGuardar($id){
		$empresarioID = Input::get('empresario_id');
		$empresario = Empresario::find($empresarioID);
		if($empresario){
			$asistencia = new EventoEmpresarios;
			$asistencia->empresario_id = $empresarioID;
			$asistencia->evento_id = $id;
			$asistencia->save();
		}
		return Redirect::back();
	}

	public function participantesPDF($id){
		$evento = Evento::find($id);
		$asistencias = EventoEmpresarios::with('empresario', 'empresario.empresa', 'empresario.empresa.empresas')
										->where("evento_id", $id)->get();
		

		$pdf = App::make('dompdf');
		$pdf->loadView('pdf.eventoParticipantes', compact('evento', 'asistencias'))->setOrientation('landscape');
		return $pdf->stream();
	}



}














