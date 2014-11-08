<?php

class SalidasController extends \BaseController {


	public function index()
	{
		return View::make('salidas.index');
	}

	public function create()
	{
		$salida = new Salida;
		$asesores = User::all()->lists('nombre', 'id');
		return View::make('salidas.create', compact('salida', 'asesores'));
	}


	public function store()
	{
		$data = Input::only('observacion','fecha_inicio','fecha_final','hora_salida','hora_regreso','lugar_destino','justificacion','objetivo','encargado');
		$participantes = Input::get('participantes');
		$salida = new Salida;

		if($salida->guardar($data, 1)){
			foreach($participantes as $participante) {
             $partic = new Participante();
             $partic->participante_id = $participante;
             $partic->salida_id = $salida->id;
             $partic->save();
            }
			return Redirect::to('salidas');
		}

		return Redirect::back()
						->withErrors($salida->errores)
						->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /salidas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /salidas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /salidas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /salidas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
