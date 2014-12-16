<?php

/*
	utilizado para guardar las ofertas a los consultores
	Imprimir el contrato
	Imprimir el acta
	Dar por finalizada la at.
*/

class pasoFinalController extends BaseController{

    public function oferta($id)
    {
        try {

        $id2 = Math::to_base_10($id, 62) - 100000;

        //return $id;
        $at = AtTermino::find($id2);
        $consultores =  $at
                        ->consultores()
                        ->paginate(3500);


        $pasoActual = 4;
        $pasoReal = $at->pasoReal;
        return View::make('asistencia-tecnica/creacion-paso-4',
                compact('consultores', 'id', 'pasoActual', 'id', 'pasoReal'));

        } catch (Exception $e) {
            App::abort(404);
        }

    }

    public function ofertasGuardar($id){

        try {

        $id2 = Math::to_base_10($id, 62) - 100000;
        $ofertas = Input::file('ofertas');
        $consultores = Input::get('consultores');
        $file = 0;
        $ofertantes = 0;
        foreach ($consultores as $consultor) {
            if($ofertas[$file]){
                $atConsultor = AtConsultor::find($consultor);
                $atConsultor->doc_oferta = $this->guardarOferta($ofertas[$file]);
                $atConsultor->save();
                $ofertantes++;
            }
            $file++;
        }

        if($ofertantes > 0){
            $at = AtTermino::find($id2);
            $at->estado = 3;
            $at->save();
            return Redirect::route('atPaso', $id2);
        }

        return Redirect::back()->with('msj', 'Agrege un documento');

        } catch (Exception $e) {
            App::abort(404);
        }
    }

    private function guardarOferta($file){
        $destinationPath = 'assets/ofertas/';
        $fileName = time() . '.' .  \Str::lower($file->getClientOriginalExtension());//$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);
        return $fileName;
    }


    public function consultor($id){
        try {

        $id2 = Math::to_base_10($id, 62) - 100000;
        $at = AtTermino::find($id2);

        $consultores = $at
                        ->ofertantes;
        //return $consultores;
        $pasoActual = 5;
        $pasoReal = $at->pasoReal;
        return View::make('asistencia-tecnica/creacion-paso-5',
            compact('consultores', 'id', 'pasoActual', 'pasoReal'));

        } catch (Exception $e) {
            App::abort(404);
        }

    }

    public function consultorSeleccionar($id){
        try {

        $consultorID = Input::get('consultor');

        if (!is_null($consultorID)) {
            if($consultorID){
                $consultor = AtConsultor::find($consultorID);
                $consultor->estado = 2;
                $consultor->save();

                $id2 = Math::to_base_10($id, 62) - 100000;


                $at = AtTermino::find($id2);
                $at->estado = 4;
                $at->save();
                return Redirect::route('atPaso', $id2);
            }
            return Redirect::route('atPasoSeleccionarConsultor', $id);
        }

            return Redirect::back()->with('msj', 'Seleccione un consultor');
        } catch (Exception $e) {
            App::abort(404);
        }

    }


    public function contrato($id){

        try {

        $id2 = Math::to_base_10($id) - 100000;

        $at = AtTermino::find($id2);


        if($at->contrato){
            // $at->estado = 5;
            // $at->save();
            return Redirect::route('atPasoContratada', $id);
        }

        $ampliacion = new AmpliacionContrato;
        $atcontrato = new AtContrato;
        $atcontrato->attermino_id = $id2;
        $atcontrato->fecha_inicio = date('Y-m-d');
        $atcontrato->fecha_final = date('Y-m-d');

        $oculto = 'oculto';
        $visible = 'visible';
        $pasoActual = 6;
        $pasoReal = $at->pasoReal;
        $method = "post";
        $action = array('method' => 'PATH', 'id' => 'validar', 'class' => 'form-horizontal');
        return View::make('asistencia-tecnica/creacion-paso-7',
                    compact('atcontrato', 'id', 'pasoActual', 'action', 'pasoReal', 'oculto', 'visible', 'ampliacion'));
        } catch (Exception $e) {
            App::abort(404);
        }

    }


    public function contratoGuardar($id){
        try {

        $data = Input::all();
        $contrato = new AtContrato;
        if($contrato->guardar($data, 1)){
            $id2 = $id;
            $id = Math::to_base_10($id) - 100000;
            $at = AtTermino::find($id);
            $at->estado = 5;
            $at->save();
            return Redirect::route('atPasoContratada', $id2);
        }

        return Redirect::route('atPasoContrato', $id)
                        ->withErrors($contrato->errores)
                        ->withInput();
        } catch (Exception $e) {
            App::abort(404);
        }
    }


    public function contratada($id){

        try{
        //return "hoal";
        $id2 = Math::to_base_10($id) - 100000;

        $at = AtTermino::find($id2);

       // return $at;
        $atcontrato = $at->contrato;
           //return $atcontrato;


        if($at->ampliacion){
            $ampliacion = $at->ampliacion;
            $dataSolicitante = array('1' => 'Consultor','2' => 'Empresario');
            $dataPerido = array('1' => 'Días','2' => 'Semanas', '3' => 'Meses');
            $ampliacion->solicitante = array_search($ampliacion->solicitante, $dataSolicitante);
            $ampliacion->periodo = array_search($ampliacion->periodo, $dataPerido);
        }
        else{
            $ampliacion = new AmpliacionContrato;
            $ampliacion->fecha = date('Y-m-d');
        }
        $oculto = 'visible';
        $visible = 'oculto';
        $pasoActual = 6;
        $pasoReal = $at->pasoReal;
        $action = array('method' => 'PATH', 'id' => 'validar', 'class' => 'form-horizontal');
        return View::make('asistencia-tecnica/creacion-paso-7',
                    compact('atcontrato', 'id', 'pasoActual', 'action', 'pasoReal', 'oculto', 'visible', 'ampliacion'));

        } catch (Exception $e) {
            App::abort(404);
        }

    }

    public function editContrato($id){
        $data = Input::all();
        $id = Math::to_base_10($id) - 100000;

        $at = AtTermino::find($id);
        $contrato = AtContrato::find($at->contrato->id);
        $at->estado = 5;
        $at->save();
        if($contrato->guardar($data, 1))
            return Redirect::route('atPaso', $id);


        return Redirect::route('atPasoContratada', $id)
                        ->withErrors($contrato->errores)
                        ->withInput();
    }

    public function pdfContrato($id){
        $contrato = AtContrato::find($id);
        $at =       $contrato->terminos;

        $consultor = $at->consultorSeleccionado->consultor;
        $empresa = $at->empresa;
        // $empresario = $empresa->representante->empresarios;
        $empresario = Empresario::find($at->empresario_id);

        // if($consultor->sexo == 'Mujer')

        $consultor->denominacion = ($consultor->sexo == 'Mujer'? 'la consultora': 'el consultor');

        $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        $pdf->loadView('pdf.contratoAt',
                compact('at', 'consultor', 'empresa', 'empresario', 'contrato'));
        return $pdf->stream();

    }

    public function ampliacion($id){
        $id2 = Math::to_base_10($id, 62) - 100000;

        $at = AtTermino::find($id2);
        //return $id
//return $at->ampliacion;
        if($at->ampliacion)
            $ampliacion = $at->ampliacion;
        else
            $ampliacion = new AmpliacionContrato;
//return $ampliacion;

        $data = Input::all();
        $data['attermino_id'] = $id2;
        //return $data;
        if($ampliacion->guardar($data,1)){
            return Redirect::route('atPasoContratada', $id);
        }

        return Redirect::back()
                        ->withErrors($ampliacion->errores)
                        ->withInput();
    }

    public function ampliacionPdf($id){
        $id2 = Math::to_base_10($id, 62) - 100000;
        $at = AtTermino::find($id2);


        $ampliacion = $at->ampliacion;

        //$fecha = $ampliacion->fecha;
        $nombre = $at->tema;

        if($ampliacion->solicitante == "Consultor")
            $solicitante = $at->consultorSeleccionado->consultor;
        else
            $solicitante = $at->empresa->representante->empresarios;

        $solicitante->calidad = $ampliacion->solicitante;
        //return $solicitante;
        //return $empresario;
        $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        $pdf->loadView('pdf.atAmpliacion',
                compact('ampliacion', 'nombre', 'solicitante'));
        return $pdf->stream();
    }


    public function acta($id){
        try {

        $idAt = Math::to_base_10($id, 62) - 100000;

        $at = AtTermino::find($idAt);

        $oculto = 'oculto';
        $visible = 'visible';

        if($at->acta){
            $acta = $at->acta;
            $dataEstado = array('1' => 'Conformidad','2' => 'Rechazo');
            $acta->estado = array_search($acta->estado, $dataEstado);
            $oculto = "visible";
            $visible = "oculto";
        }else{
            $acta = new acta;
            $acta->attermino_id = $idAt;
            $acta->fecha = date('Y-m-d');
        }


        $pasoReal = $at->pasoReal;
        $pasoActual = 7;

        return View::make('asistencia-tecnica/creacion-paso-8',
            compact('acta', 'pasoActual', 'pasoReal', 'id', 'oculto', 'visible'));
        } catch (Exception $e) {
            App::abort(404);
        }

    }


    public function actaGuardar($id){


        $idAt = Math::to_base_10($id, 62) - 100000;

        $at = AtTermino::find($idAt);

        $oculto = 'oculto';
        $visible = 'visible';

        if($at->acta){
            $acta = $at->acta;
        }
        else{
            $acta = new acta;
        }
        $data = Input::all();
//return $data;
        if($acta->guardar($data, 1))
        {
        $at->estado = 6;
        $at->save();
            return Redirect::route('atPaso', $acta->attermino_id);
        }

        return Redirect::back()
                        ->withErrors($acta->errores)
                        ->withInput();
    }

    public function actaPdf($id){
        $idAt = Math::to_base_10($id, 62) - 100000;
        $at = AtTermino::with('acta', 'contrato', 'empresa')
                        ->find($idAt);

//        return $at;
        if(!$at->acta)
            return app::abort(404);

        $empresa = $at->empresa;
        $consultor = $at->consultorSeleccionado;
        // $empresario = $empresa->representante;
        $empresario = Empresario::find($at->empresario_id);
        $contrato = $at->contrato;
        $acta = $at->acta;



        //return $empresario;
        $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        $pdf->loadView('pdf.atActa',
                compact('at', 'consultor', 'empresa', 'empresario', 'contrato', 'acta'));
        return $pdf->stream();

    }


    public function informe($id){
         try {

        $idAt = Math::to_base_10($id, 62) - 100000;

        $attermino = AtTermino::find($idAt);
        $atcontrato = $attermino->contrato;

        $pasoReal = $attermino->pasoReal;
        $pasoActual = 8;

        return View::make('asistencia-tecnica/creacion-paso-final', compact('attermino','atcontrato','pasoActual', 'pasoReal', 'id', 'oculto', 'visible'));
        } catch (Exception $e) {
            App::abort(404);
        }

    }

    public function informeGuardar($id){

        // return "hola";
        $id2 = Math::to_base_10($id, 62) - 100000;
        $informe = Input::file('informe');
        $at = AtTermino::find($id2);
        $at->informe = $this->guardarInforme($informe[0]);
        $at->save();

        return Redirect::back();

    }

    private function guardarInforme($file){
        $destinationPath = 'assets/informes/';
        $fileName = time() . '.' .  \Str::lower($file->getClientOriginalExtension());
        $file->move($destinationPath, $fileName);
        return $fileName;
    }




    //Recepcion de at
    public function recepcion($id){
        $asistencia = AtTermino::with('empresa', 'contrato', 'acta', 'empresa')
                                ->find($id);
        $consultor  = $asistencia->consultorSeleccionado;
        $fecha       = $asistencia->acta->fecha;
        $contrato   = $asistencia->contrato;
        $empresa   = $asistencia->empresa; 

        $servicio['tipo'] = "SERVICIOS DE ASISTENCIA TÉCNICA";
        $servicio['descripcion'] = "Asistencia técnica denominada: " . $asistencia->tema . " para la empresa " . $empresa->nombre;
        $servicio['pago'] = $contrato->pagoEmpresario;
        
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

    public function aporteEmpresario($id){
            $asistencia = AtTermino::with('empresa', 'contrato', 'acta', 'empresa')
                                    ->find($id);
            $consultor  = $asistencia->consultorSeleccionado;
            // $acta       = $asistencia->acta;
            $contrato   = $asistencia->contrato;
            // $empresa   = $asistencia->empresa;
        $pago = round($contrato->pagoEmpresario,2);
        $concepto = "Pago correspondiente al aporte empresarial por desarrollo de asistencia técnica denominada:";
        $concepto = $concepto . $asistencia->tema;
        $fecha = $contrato->fecha_final;
            
        date_default_timezone_set('America/El_Salvador');

           $time = time();
                       // 7 days; 24 hours; 60 mins; 60 secs
            $hora = date("g:i a", $time);
    // echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";

            //return $empresario;
            $pdf = App::make('dompdf');
            //$pdf->loadHTML('<h1>Test</h1>');
            $pdf->loadView('pdf.aporteEmpresarial',
                    compact('consultor', 'pago', 'concepto', 'fecha', 'consultor'));
            return $pdf->stream();
    }
    public function pagoAporte($id){
            $asistencia = AtTermino::with('empresa', 'contrato', 'acta', 'empresa')
                                    ->find($id);
            // $consultor  = $asistencia->consultorSeleccionado;
            // // $acta       = $asistencia->acta;
            $contrato   = $asistencia->contrato;
            $empresa   = $asistencia->empresa;
        $pago = round($contrato->pagoEmpresario,2);
        $concepto = "Pago correspondiente al aporte empresarial del $asistencia->aporte %
                    por desarrollo de asistencia técnica denominada: '";
        $concepto = $concepto . $asistencia->tema;
        $concepto = $concepto . "' Para: " . $empresa->nombre;
        // $fecha = $contrato->fecha_final;
            
        // date_default_timezone_set('America/El_Salvador');

        //    $time = time();
        //                // 7 days; 24 hours; 60 mins; 60 secs
        //     $hora = date("g:i a", $time);
    // echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";

            //return $empresario;
            $pdf = App::make('dompdf');
            //$pdf->loadHTML('<h1>Test</h1>');
            $pdf->loadView('pdf.pagoAporte',
                    compact('concepto', 'pago'));
            return $pdf->stream();
    }
}
