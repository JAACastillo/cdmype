<?php

class CalendarioController extends BaseController {

  public function eventos(){

    $salidas = Salida::all();
    $evetos  = [];
    $addTime = 21600000; //6 horas
      foreach ($salidas as $salida) {
        $combinada = $salida->fecha_inicio . ' ' . $salida->hora_salida;
        $combinadaFinal = $salida->fecha_inicio. ' ' . $salida->hora_regreso;
        $eventos[] = array(
                             "id"       => $salida->id,
                              "title"   => $salida->lugar_destino,
                              "url"     =>"http://localhost/cdmype",
                              "class"   =>"event-important",
                              "start"   => (strtotime($combinada) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($combinadaFinal) * 1000 )  + $addTime//  + 86400000// Milliseconds
                          );
      }

    //agregando asesorias al calendario
      $asesorias = Asesoria::where('user_id', Auth::user()->id)->get();
      foreach ($asesorias as $salida) {
        $combinada = $salida->fecha_inicio . ' ' . $salida->hora_inicio;
        $combinadaFinal = $salida->fecha_fin. ' ' . $salida->hora_fin;
        $eventos[] = array(
                             "id"       => $salida->id,
                              "title"   => $salida->titulo,
                              "url"     => "http://localhost/cdmype/agenda/asesoria/" . $salida->id,
                              "class"   =>"event-success",
                              "start"   => (strtotime($combinada) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($combinadaFinal) * 1000 )  + $addTime//  + 86400000// Milliseconds
                          );
      }

    //agregando reuniones al calendario
      $reuniones = Reunione::where('user_id', Auth::user()->id)->get();
      foreach ($reuniones as $salida) {
        $combinada = $salida->fecha_inicio . ' ' . $salida->hora_inicio;
        $combinadaFinal = $salida->fecha_fin. ' ' . $salida->hora_fin;
        $eventos[] = array(
                             "id"       => $salida->id,
                              "title"   => $salida->titulo,
                              "url"     => "http://localhost/cdmype/agenda/reunion/"  . $salida->id,
                              "class"   =>"event-information",
                              "start"   => (strtotime($combinada) * 1000) + $addTime,//+ 86400000, // Milliseconds
                              "end"     => (strtotime($combinadaFinal) * 1000 )  + $addTime//  + 86400000// Milliseconds
                          );
      }

    return Response::json(array("success" => 1, "result" => $eventos), 200);
  }

  public function agenda(){

    date_default_timezone_set('America/El_Salvador');

    $asesoria = new Asesoria;
    $reunion = new Reunione;
    $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');
    $especialidades = Especialidades::all()->lists('especialidad', 'id');
    $fecha_inicio = date('Y-m-d');
    $fecha_fin = date('Y-m-d');
    $hora_fin = date("H:i");
    $hora_inicio = date("H:i");

    $asesoria->estado = 1; //por defecto "programada  "
    $asesoria->actividad = 'Prueba para guardar actividades';
    $municipio = 0;


    return View::make('agenda.agenda', compact('asesoria', 'reunion', 'municipios', 'especialidades', 'municipio','fecha_inicio',
                                                'fecha_fin', 'hora_fin', 'hora_inicio'));
  }


  //Conocer que tipo de actividad es la que se esta creando.
    public function guardar(){

      $tipoActividad = Input::get('tipoActividad');


// return $tipoActividad;
      if($tipoActividad == 1){
          $data = Input::only('titulo', 'municipio_id', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', 'especialidad','proyecto_id', 'actividad', 'detalle', 'estado','tipo', 'empresa_id' );
          $data['user_id'] = Auth::user()->id;
          return $this->saveAsesoria($data);
      }
      elseif($tipoActividad == 2){
        $data = Input::only('titulo','municipio_id', 'fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin','organizacion','detalle_reunion');
          $data['user_id'] = Auth::user()->id;

          return $this->saveReunion($data);
      }
    }

  //Funciones para guardar asesorias y reuniones segun sea el tipo de actividad
    private function saveAsesoria($data){

      // return $data;
        $asesoria = new Asesoria;
        if ($asesoria->guardar($data, 1)){
          return Redirect::to('/');
        }

        return Redirect::back()
                        ->withInput()
                        ->withErrors($asesoria->errores);
    }


    private function saveReunion($data){

      $reunion = new Reunione;
      if($reunion->guardar($data,1)){
        return Redirect::to('/');
      }

      return Redirect::back()->withInput()->withErrors($reunion->errores);
    }

  //Editar Asesoria
    public function asesoria($id){
      $asesoria = Asesoria::find($id);
      return View::make('agenda.asesorias.show', compact('asesoria'));
    }

    public function editarAsesoria($id){

      $asesoria = Asesoria::find($id);
      $municipios = Municipio::all()->lists('municipio', 'id');
      $especialidades = array('' => 'Seleccione una opción') + Especialidades::all()->lists('especialidad', 'id');
      $dataEstados = array(1 => 'Programada',2 => 'Completada', 3 => 'Cancelada');
      $dataTipo = array(1 => 'Seguimiento', 2 => 'Inicial');
      $asesoria->tipo = array_search($asesoria->tipo, $dataTipo);
      $asesoria->estado = array_search($asesoria->estado, $dataEstados);

      // $asesoria->empresa = $asesoria->empresa->nombre;
      // $asesoria->empresa_id = $asesoria->empresa_id;

      // $asesoria->proyecto_id = $asesoria->proyecto->id;
      // $asesoria->actividad = $asesoria->actividad()->nombre;

      // Valores fijos
      $municipio = $asesoria->municipio_id;
      $fecha_inicio = $asesoria->fecha_inicio;
      $hora_inicio = $asesoria->hora_inicio;
      $fecha_fin = $asesoria->fecha_fin;
      $hora_fin = $asesoria->hora_fin;

      return View::make('agenda.asesorias.editar', compact('asesoria', 'municipios',
                                                  'municipio', 'especialidades', 'fecha_inicio', 'fecha_fin',
                                                  'hora_inicio', 'hora_fin'));

    }
    public function actualizarAsesoria($id){
      $data = Input::all();
      // return $data;

      $asesoria = Asesoria::find($id);

          if(is_null($asesoria))
              App::abort(404);

          $datos = Input::all();
          $datos['user_id'] = Auth::user()->id;

          if($asesoria->guardar($datos,'2')){

            return Redirect::route('verAsesoria', $asesoria->id);
          }
            return Redirect::back()->withInput()->withErrors($asesoria->errores);
    }

  //Editar Reunion
    public function reunion($id){
      $reunion = Reunione::find($id);

      return View::make('agenda.reuniones.show', compact('reunion'));
    }

    public function editarReunion($id){
      $reunion = Reunione::find($id);
      $municipios = Municipio::all()->lists('municipio', 'id');
      $municipio = $reunion->municipio_id;
      $dataOrg = [1 => 'CDMYPE', 2 => 'CONAMYPE', 3 => 'Capacitación'];
      $reunion->organizacion = array_search($reunion->organizacion, $dataOrg);

      $fecha_inicio = $reunion->fecha_inicio;
      $hora_inicio = $reunion->hora_inicio;
      $fecha_fin = $reunion->fecha_fin;
      $hora_fin = $reunion->hora_fin;

      return View::make('agenda.reuniones.editar', compact('reunion', 'municipios',
                                                  'municipio', 'fecha_inicio', 'fecha_fin',
                                                  'hora_inicio', 'hora_fin'));

    }

    public function actualizarReunion($id){

      $reunion = Reunione::find($id);

          if(is_null($reunion))
              App::abort(404);

          $datos = Input::all();
          $datos['user_id'] = Auth::user()->id;

          if($reunion->guardar($datos,'2')){

            return Redirect::route('verReunion', $reunion->id);
          }
            return Redirect::back()->withInput()->withErrors($reunion->errores);
    }

    //bitacora de seguimiento
    public function bitacora($id){

      $asesoria = Asesoria::find($id);
       $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        // $pdf->loadView('pdf.bitacora', compact('asesoria'));
        return $pdf->stream();
    }



}
