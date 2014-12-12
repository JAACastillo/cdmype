<?php

class CapTerminoController extends BaseController {


//Listar
	public function index()
	{

        $capterminos = CapTermino::orderBy('tema','asc')
            ->paginate();

        return View::make('capacitaciones.lista', compact('capterminos'));
	}

    public function verTermino(){

        return "ver";
    }

    //Mostrar los terminos para editar

        public function eliminarCapacitacion($id)
        {

            $captermino = CapTermino::find($id);

            if(is_null($captermino))
                App::abort(404);

            else
            {
                $captermino->delete();

                $bitacora = new Bitacora;
                $campos = array(
                    'usuario_id' => Auth::user()->id,
                    'tabla' => 20,
                    'tabla_id' => $id,
                    'accion' => 3
                );

                $bitacora->Guardar($campos);
                return Redirect::back();
            }

        }



//inicio de los pasos.

    //Seleccion del paso
        public function Paso($id)
        {
            try {


            $cap = CapTermino::find($id);

            switch ($cap->estado) {
                case 'Creado':
                    return Redirect::route('capPasoConsultor', $id);
                    break;
                case 'Enviado':
                    return Redirect::route('capPasoOferta', $id);
                    break;
                case 'Ofertas Recibidas':
                    return Redirect::route('capPasoSeleccionarConsultor', $id);
                    break;
                case 'Consultor Seleccionado':
                    return Redirect::route('capPasoAsistencia', $id);
                    break;
                case 'Contratada':
                    return Redirect::route('capPasoContrato', $id);
                    break;
                case 'Finalizada':
                    return Redirect::route('capPasoInforme', $id);
                    break;
                default:
                    # code...
                    break;
            }

            } catch (Exception $e) {
                App::abort(404);
            }
        }

    //Pasos

        //Creacion de los terminos
            public function crearTermino()
            {

                $pasoActual = 1;
                $pasoReal = 1;
                $id = 0;
                $captermino = new CapTermino;
                $especialidades = array('' => 'Seleccione una opción') + SubEspecialidad::all()->lists('sub_especialidad', 'id');

                $captermino->fecha = date('Y-m-d');
                $captermino->fecha_lim = date('Y-m-d');

                $captermino->hora_ini = date('08:00');
                $captermino->hora_fin = date('16:00');

                $accion = array('route' => array('capGuardarTermino'), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

                return View::make('capacitaciones.creacion-paso-1',
                        compact('captermino', 'especialidades', 'accion', 'pasoActual', 'id', 'pasoReal'));
            }

            public function guardarTermino()
            {
                $datos = Input::all();
                $datos['usuario_id'] = Auth::user()->id;
                $datos['estado'] = 1;
                $captermino = new CapTermino;

                if($captermino->guardar($datos, 1))
                    return Redirect::route('capPasoConsultor', ($captermino->id));

                return Redirect::back()->withInput()->withErrors($captermino->errores);
            }

            //Mostrar los terminos para editar

            public function modificarTermino($id)
            {

                $captermino =  CapTermino::find($id);


                if(! $captermino)
                    return Redirect::route('capCrearTermino');
                $pasoActual = 1;
                $pasoReal = $captermino->pasoReal;
                $especialidades = array('' => 'Seleccione una opción') + SubEspecialidad::all()->lists('sub_especialidad', 'id');
                $dataCategoria = array(1 => 'Emprendedoras y empresarias de los Departamentos de Cabañas, Cuscatlán y San Vicente.', 2 => 'Empresarios de los departamentos de Cabañas, Cuscatlán y San Vicente.');
                $captermino->categoria = array_search($captermino->categoria, $dataCategoria);

                $captermino->fechaa = date('Y-m-d');
                $captermino->fecha_limite = date('Y-m-d');

                $accion = array('route' => array('actualizarTermino', $id), 'method' => 'PATCH', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

                return View::make('capacitaciones.creacion-paso-1',
                        compact('captermino', 'especialidades', 'accion', 'pasoActual', 'id', 'pasoReal'));
            }

             public function actualizarTermino($id)
            {
                $datos = Input::all();

                $captermino = CapTermino::find($id);

                $datos['usuario_id'] = $captermino->usuario_id;

                if($captermino->guardar($datos, 1))

                    return Redirect::route('capPaso', $id);

                return Redirect::back()->withInput()->withErrors($captermino->errores);
            }

        //Consultores
            public function consultores($id)
            {
                $cap = CapTermino::find($id);
                $pasoActual = 2;
                $pasoReal = $cap->pasoReal;
                $consultores = ConsultorEspecialidad::Where('subespecialidad_id', '=', $cap->especialidad_id)
                        ->with('especialidad', 'consultor')
                        ->paginate();
                return View::make('capacitaciones.creacion-paso-2',
                compact('consultores', 'id', 'pasoActual', 'pasoReal'));
            }

            public function guardarConsultores()
            {
                $consultores =  Input::get('consultores');
                $id = Input::get('idCaptermino');

                if ($consultores != "") {
                    $banderaConsultor = 0;
                    $cap = CapTermino::find($id);

                    foreach ($consultores as $consultor) {
                        $consul = $cap->consultores()
                                ->where('consultor_id', '=', $consultor);
                        if(!$consul->count() > 0)
                        {
                            $consultorAT = new CapConsultor;
                            $consultorAT->estado = 1;
                            //Fechas
                            $consultorAT->captermino_id = $id;
                            $consultorAT->consultor_id = $consultor;
                            $consultorAT->save();

                            $this->mailOferta('emails.capacitacion',
                                                $id,
                                                $consultorAT->consultor->correo,
                                                $consultorAT->consultor->nombre
                                            );

                        }
                        $banderaConsultor = 1;
                    }
                    if($banderaConsultor == 1)
                    {
                        $cap->estado = 2;
                        $cap->save();
                    }
                    return Redirect::route('capPasoConvocatoria', $id);
                }

                    return Redirect::back()->with('msj', 'Seleccione un consultor');

            }

            private function mailOferta($template, $id, $email, $nombreConsultor)
            {
                try {

                Mail::send($template,array('id' => $id),function($message) use ($id, $email, $nombreConsultor) {

                    $message->to($email, $nombreConsultor)
                            ->subject('Capacitaciones - CDMYPE UNICAES');
                });

                } catch (Exception $e) {
                 return "No se ha podido enviar el correo!";
                }
            }

        //Ofertas
            public function oferta($id)
            {

                $cap = CapTermino::find($id);
                $consultores =  $cap
                                ->consultores()
                                ->paginate(1000);
                $pasoActual = 4;
                $pasoReal = $cap->pasoReal;
                return View::make('capacitaciones.creacion-paso-3',
                        compact('consultores', 'id', 'pasoActual', 'id', 'pasoReal'));
            }

            public function guardarOfertas($id){

                $ofertas = Input::file('ofertas');
                $consultores = Input::get('consultores');
                    $file = 0;
                    $ofertantes = 0;

                    foreach ($consultores as $consultor) {
                        if($ofertas[$file]){
                            $capConsultor = CapConsultor::find($consultor);
                            $capConsultor->doc_oferta = $this->guardarOferta($ofertas[$file]);
                            $capConsultor->save();
                            $ofertantes++;
                        }
                        $file++;
                    }

                    if($ofertantes > 0){
                        $cap = CapTermino::find($id);
                        $cap->estado = 3;
                        $cap->save();
                        return Redirect::route('capPaso', $id);
                    }
                return Redirect::back()->with('msj', 'Agrege un documento');
            }


            private function guardarOferta($file){
                $destinationPath = 'assets/ofertas/';
                $fileName = time() . '.' .  \Str::lower($file->getClientOriginalExtension());
                $file->move($destinationPath, $fileName);
                return $fileName;
            }

        //Seleccionar Consultor
            public function consultor($id){

                $cap = CapTermino::find($id);

                $consultores = $cap
                                ->ofertantes;

                $pasoActual = 5;
                $pasoReal = $cap->pasoReal;
                return View::make('capacitaciones.creacion-paso-4',
                    compact('consultores', 'id', 'pasoActual', 'pasoReal'));

            }

            public function seleccionarConsultor($id){
                $consultorID = Input::get('consultor');
                if (!is_null($consultorID)) {
                    if($consultorID){
                        $consultor = CapConsultor::find($consultorID);
                        $consultor->estado = 2;
                        $consultor->save();

                        $cap = CapTermino::find($id);
                        $cap->estado = 4;
                        $cap->save();
                        return Redirect::route('capPaso', $id);
                    }
                    return Redirect::route('capPasoSeleccionarConsultor', $id);
                }

                return Redirect::back()->with('msj', 'Seleccione un consultor');
            }

        //Asistencia
            public function asistencia($id){

                $asistencia = new Asistencia;
                $cap = CapTermino::find($id);

                $pasoReal = $cap->pasoReal;
                $pasoActual = 6;

                return View::make('capacitaciones.creacion-paso-5',
                        compact('asistencia','accion', 'pasoActual', 'id', 'pasoReal'));

            }

            public function convocatoria($id){

                $asistencia = new Asistencia;
                $cap = CapTermino::find($id);

                $pasoReal = $cap->pasoReal;
                $pasoActual = 3;

                return View::make('capacitaciones.convocatoria',
                        compact('asistencia','accion', 'pasoActual', 'id', 'pasoReal'));

            }

            public function actualizarConvocatoria($id){
                $capasistencias = Asistencia::where('captermino_id', '=', $id)->get();
                $asistencias = Input::get('asistencias');

                foreach ($capasistencias as $id1) {
                         $asistencia = Asistencia::find($id1->id);
                         $asistencia->asistira = 1; //No
                         $asistencia->save();
                }

                if($asistencias != "" )
                {

                    foreach ($asistencias as $id2) {
                         $asistencia = Asistencia::find($id2);
                         $asistencia->asistira = 2; //Si
                         $asistencia->save();
                    }
                    return  Redirect::back();
                }
                return  Redirect::back();
            }

            public function pdfConvocatoria($id){
                $capacitacion = CapTermino::find($id);
                $asistencias = Asistencia::where("captermino_id", "=", $id)->get();
                $pdf = App::make('dompdf');
                $pdf->loadView('pdf.capConvocatoria', compact('capacitacion', 'asistencias'))->setOrientation('landscape');
                return $pdf->stream();

            }

            public function guardarConvocatoria(){

                $captermino_id = Input::get('captermino_id');
                $empresario = Input::get('empresario_id');

                $asistencia = new Asistencia;
                $datos = Input::all();

                $datos['asistira'] = 2;
                $datos['asistio'] = 1;

                if(value($empresario) >= 1 )
                {

                    if ($asistencia->guardar($datos, 1)) {
                         return  Redirect::back();
                    }
                    else{
                        return Redirect::back()->withInput()->withErrors($asistencia->errores);
                    }
                }
                else
                {

                    return Redirect::back()->with(['msj' => 'Lo siento no he encontrado el empresario']);
                }

            }

            public function actualizarAsistencia($id){

                $capasistencias = Asistencia::where('captermino_id', '=', $id)->get();
                $asistencias = Input::get('asistencias');


                foreach ($capasistencias as $id1) {
                         $asistencia = Asistencia::find($id1->id);
                         $asistencia->asistio = 1; //No
                         $asistencia->save();
                }

                if($asistencias != "" )
                {

                    foreach ($asistencias as $id2) {
                         $asistencia = Asistencia::find($id2);
                         $asistencia->asistio = 2; //Si
                         $asistencia->save();
                    }
                    return  Redirect::back();
                }
                return  Redirect::back();
            }

            public function pdfAsistencia($id){
                $capacitacion = CapTermino::find($id);
                //$asistencias = Asistencia::where("captermino_id", "=", $id)->Where('asistira', '=', 'Si')->get();
                $asistencias = Asistencia::whereRaw('captermino_id = ? and asistira = ? and asistio = ?', array($id, 'Si', 'Si'))->get();
                $pdf = App::make('dompdf');
                $pdf->loadView('pdf.capAsistencia', compact('capacitacion', 'asistencias'))->setOrientation('landscape');
                return $pdf->stream();

            }

        //Contrato
            public function contrato($id){

                $cap = CapTermino::find($id);

                if($cap->contratos){
                    // $cap->estado = 5;
                    // $cap->save();
                    return Redirect::route('capPasoContratada', $id);
                }

                $capcontrato = new CapContrato;
                $capcontrato->capconsultor_id = $id;


                $oculto = 'oculto';
                $visible = 'visible';
                $pasoActual = 7;
                $pasoReal = $cap->pasoReal;
                $method = "post";
                $action = array('method' => 'PATH', 'class' => 'form-horizontal', 'id' => 'validar');
                return View::make('capacitaciones.creacion-paso-6',
                            compact('capcontrato', 'id', 'pasoActual', 'action', 'pasoReal', 'oculto', 'visible'));
            }


            public function guardarContrato($id){

                $data = Input::all();
                $contrato = new CapContrato;
                if($contrato->guardar($data, 1)){
                    $cap = CapTermino::find($id);
                    $cap->estado = 6;
                    $cap->save();
                    return Redirect::route('capPasoContratada', $id);
                }

                return Redirect::back()->withInput()->withErrors($contrato->errores);
            }


            public function contratada($id){

                $cap = CapTermino::find($id);
                $capcontrato = $cap->contrato;

                $oculto = 'visible';
                $visible = 'oculto';
                $pasoActual = 7;
                $pasoReal = $cap->pasoReal;
                $dataFirma = array('' => 'Seleccione una opción','1' => 'Director','2' => 'Directora');
                $capcontrato->firma = array_search($capcontrato->firma,$dataFirma);

                $action = array('method' => 'PATH', 'class' => 'form-horizontal', 'id' => 'validar');
                return View::make('capacitaciones.creacion-paso-6',
                            compact('capcontrato', 'id', 'pasoActual', 'action', 'pasoReal', 'oculto', 'visible'));

            }

            public function editContrato($id){
                $data = Input::all();

                $cap = CapTermino::find($id);
                $contrato = CapContrato::find($cap->contrato->id);

                if($contrato->guardar($data, 1))
                     return Redirect::route('capPasoContratada', $id);

                return Redirect::back()->withInput()->withErrors($contrato->errores);
            }

            public function pdfContrato($id){

                $contrato = CapContrato::find($id);
                $capacitacion = $contrato->terminos;

                $consultor = $capacitacion->consultorSeleccionado->consultor;

                $pdf = App::make('dompdf');

                $pdf->loadView('pdf.capContrato',
                        compact('capacitacion', 'consultor', 'contrato'));
                return $pdf->stream();

            }


            //pdf de los tdr

            public function pdf($id){
                $cap = CapTermino::find($id);
                $pdf = App::make('dompdf');
                $pdf->loadView('pdf.tdrCap',
                        compact('cap', 'empresa'));
                return $pdf->stream();

            }


            public function informe($id){
                 try {

                $captermino = CapTermino::find($id);
                $capcontrato = $captermino->contrato;

                $pasoReal = $captermino->pasoReal;
                $pasoActual = 8;

                return View::make('capacitaciones/creacion-paso-final', compact('captermino','capcontrato','pasoActual', 'pasoReal', 'id'));
                } catch (Exception $e) {
                    App::abort(404);
                }

            }

            public function informeGuardar($id){

                $informe = Input::file('informe');
                $cap = CapTermino::find($id);
                $cap->informe = $this->guardarInforme($informe[0]);
                $cap->save();

                return Redirect::back();

            }

            private function guardarInforme($file){
                $destinationPath = 'assets/informes/';
                $fileName = time() . '.' .  \Str::lower($file->getClientOriginalExtension());
                $file->move($destinationPath, $fileName);
                return $fileName;
            }


    public function recepcion($id){
        $capacitacion = CapTermino::with('contratos')
                                    ->find($id);
        $consultor  = $capacitacion->consultorSeleccionado;
        $fecha       = $capacitacion->fecha;
        $contrato   = $capacitacion->contratos;
        // $empresa   = $capacitacion->empresa; 

        $servicio['tipo'] = "SERVICIOS DE CAPACITACIÓN";
        $servicio['descripcion'] = "Capacitación denominada: " . $capacitacion->tema . " para " . $capacitacion->categoria;
        $servicio['pago'] = $contrato->pago;
            
        date_default_timezone_set('America/El_Salvador');

        $time = time();
                       // 7 days; 24 hours; 60 mins; 60 secs
        $hora = date("g:i a", $time);
    // echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";

            //return $empresario;
        $pdf = App::make('dompdf');
            //$pdf->loadHTML('<h1>Test</h1>');
        $pdf->loadView('pdf.recepcionBienes',
                compact('fecha', 'servicio', 'hora', 'consultor'));
            return $pdf->stream();
    }





}
