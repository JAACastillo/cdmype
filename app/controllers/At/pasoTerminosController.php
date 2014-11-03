<?php

class pasoTerminosController extends BaseController{


    //Creacion de los terminos
    public function terminos( $idEmpresa)
    {

        $pasoActual = 2;
        $pasoReal = 2;
        $id = $idEmpresa;
        $empleados = EmpresaEmpresario::Where('empresa_id', '=', $idEmpresa)->get();
        $attermino = new AtTermino;

        $fecha = date('Y-m-d');

        //valores por defecto
        $attermino->trabajo_local = "70";
        $attermino->aporte = "30";
        $attermino->tiempo_ejecucion = "30";
        $attermino->empresarios = $empleados;
        $attermino->empresa_id = $idEmpresa;
        $attermino->fecha = $fecha;
        $attermino->financiamiento = 800;


        $especialidades = array('' => 'Seleccione una opción') + SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $accion = array('route' => array('atCrearTDR'), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

        return View::make('asistencia-tecnica.creacion-paso-2',
                compact('attermino', 'accion', 'especialidades', 'pasoActual', 'id', 'pasoReal'));
    }

    public function terminosGuardar()
    {
        $datos = Input::all();
        $datos['usuario_id'] = Auth::user()->id;
        $attermino = new AtTermino;


        if($attermino->guardar($datos, 1))
            return Redirect::route('atPasoConsultor', (Math::to_base($attermino->id + 100000,62) ));

        return Redirect::route('atPasoTerminos', $datos['empresa_id'])
                    ->withErrors($attermino->errores)
                    ->withInput();
    }

    //Mostrar los terminos para editar

    public function termino( $id)
    {

        $id2 = Math::to_base_10($id,62) - 100000;
        $attermino =  AtTermino::find($id2);
        $empleados = EmpresaEmpresario::Where('empresa_id', '=', $attermino->empresa_id)->get();
        $attermino->empresarios = $empleados;

        if(! $attermino)
            return Redirect::route('atPasoEmpresa');
        $pasoActual = 2;
        $pasoReal = $attermino->pasoReal;

        $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $accion = array('route' => array('atModificarTDR', $id), 'method' => 'PATCH', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

        return View::make('asistencia-tecnica.creacion-paso-2',
                compact('attermino', 'accion', 'especialidades', 'pasoActual', 'id', 'pasoReal'));
    }

     public function terminoModificar($id)
    {
        $datos = Input::all();
        $id2 = Math::to_base_10($id,62) - 100000;

        $attermino = AtTermino::find($id2);

        $datos['usuario_id'] = $attermino->usuario_id;
        //return $attermino;
        if($attermino->guardar($datos, 1))
            return Redirect::route('atPaso', $id2);

        return Redirect::route('atPasoTermino', $id)
                    ->withErrors($attermino->errores)
                    ->withInput();
    }


//pdf de los tdr

    public function pdf($id){
        $at = AtTermino::with('empresa')
                        ->find($id);
        $empresa = $at->empresa;
        $asesor = $at->usuario;
        $pdf = App::make('dompdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        $pdf->loadView('pdf.tdrAt',
                compact('at', 'empresa', 'asesor'));
        return $pdf->stream();

    }


}
