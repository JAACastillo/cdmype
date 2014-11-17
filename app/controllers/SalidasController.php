<?php

class SalidasController extends \BaseController {


	public function index()
	{
		$meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio',
					 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'];
		return View::make('salidas.index', compact('meses'));
	}

	public function create()
	{
		$salida = new Salida;
		$asesores = User::all()->lists('nombre', 'id');
		date_default_timezone_set('America/El_Salvador');
		// return date_default_timezone_get();
		$hoy = date("Y-m-d");                       // 10, 3, 2001
		$hora = date("H:i");                         // 17:16:18

		$municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');
		$salida->fecha_inicio = $hoy;
		$salida->fecha_final = $hoy;
		$salida->hora_salida = $hora;
		$salida->hora_regreso = $hora;
		$salida->participantes = [1,2,3,4,5,6,7,8,9,10,11,12];

		return View::make('salidas.create', compact('salida', 'asesores', 'municipios'));
	}


	public function store()
	{
		$data = Input::only('observacion','fecha_inicio','hora_salida','hora_regreso','lugar_destino','justificacion','objetivo','encargado');
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

	/** */
	public function show($id)
	{
		$salida = Salida::find($id);
		return View::make('salidas.show', compact('salida'));
	}


	public function edit($id)
	{
		$asesores = User::all()->lists('nombre', 'id');
		$participantes = Participante::Where('salida_id', '=', $id)->get();
		$municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');
		$salida = Salida::find($id);

		foreach ($participantes as $item)
        {
            $datos[] = $item->participante_id;
        }

      $salida->participantes = $datos;

		return View::make('salidas.create', compact('salida', 'municipios', 'asesores'));

	}


	public function update($id)
	{
		$salida = Salida::find($id);

        if(is_null($salida))
            App::abort(404);

      $datos = Input::only('observacion','fecha_inicio','hora_salida','hora_regreso','lugar_destino','justificacion','objetivo','encargado');

      $participantes = Input::get('participantes');
        if($salida->guardar($datos,'2')){

            if($this->actualizarParticipantes($id,$participantes)){
                return Redirect::route('salidas.index');
            }
            else{
                return Redirect::back()->withInput()->withErrors(['Error' => 'No se han podido actualizar los participantes']);
            }
        }
        else
            return Redirect::back()->withInput()->withErrors($salida->errores);
	}


	public function destroy($id)
	{
		//
	}


	public function pdf()
	{
		$ano = Input::get('ano');
		$mes = Input::get('mes');
		$firma = Input::get('firma');

		$salidas = Salida::whereRaw('YEAR(fecha_inicio) = ? and MONTH(fecha_inicio) = ?', [$ano, $mes])->get();

      $pdf = App::make('dompdf');
      $pdf->loadView('pdf.salidas', compact('salidas', 'ano', 'mes', 'firma'))->setOrientation('landscape');;

      return $pdf->stream();
	}

	//Actualizar las especialidades
    public function actualizarParticipantes($idSalida,$salida_participantes){

        //Sacamos todos los participantes
        $participantes = Participante::where('salida_id', '=', $idSalida)->get();
        //Las eliminamos
        foreach ($participantes as $item) {
            $parti = Participante::find($item->id);
            $parti->delete();
        }
        //Ingresamos las nuevos
        foreach($salida_participantes as $item) {
                $part = new Participante;
                $part->participante_id = $item;
                $part->salida_id = $idSalida;
                $part->save();
        }

        return true;
    }

}
