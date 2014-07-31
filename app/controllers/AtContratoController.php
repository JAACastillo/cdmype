<?php

class AtContratoController extends BaseController {

//Listar
	public function index()
	{
        $atcontratos = AtContrato::paginate();
        
        return View::make('asistencia-tecnica.contratos.lista', compact('atcontratos'));
	}

//Crear
	public function create()
	{
        $atcontrato = new AtContrato;
		return View::make('asistencia-tecnica.creacion-paso-7', compact('atcontrato'));
	}

//Mostrar
	public function store()
	{
        $acta = new Acta;
        return View::make('asistencia-tecnica.creacion-paso-8', compact('acta'));

        // $atcontrato = new AtContrato;
        // $datos = Input::all();
        
        // if($atcontrato->guardar($datos,'1'))
        // {   
        //     $attermino = AtTermino::find(Input::get('attermino_id'));
        // 	$attermino->estado = 4;
        // 	$attermino->save();
        //     return Redirect::route('atcontratos.index');
        // }
        
        // else 
        //     return Redirect::route('crearAtcontrato', array(Input::get('attermino_id')))
        //         ->withInput()->withErrors($atcontrato->errores);
	}

//Ver
	public function show($id)
	{
		//
	}

//Editar
	public function edit($id)
	{
        $atcontrato = AtContrato::find($id);
        
        return View::make('asistencia-tecnica.contrato.formulario')
            ->with('atcontrato', $atcontrato)
            ->with('duracion', $atcontrato->duracion)
            ->with('pago', $atcontrato->pago)
            ->with('aporte', $atcontrato->aporte)
            ->with('attermino_id',$atcontrato->attermino_id)
            ->with('consultor_id',$atcontrato->consultor_id)
            ->with('usuario_id', $atcontrato->usuario_id);
	}

//Actualizar
	public function update($id)
	{
        $atcontrato = AtContrato::find($id);
        
        if(is_null($atcontrato)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($atcontrato->validAndSave($data,'2')) 
            return Redirect::route('atcontratos.index');
        
        else 
            return Redirect::route('atcontratos.edit', $atcontrato->id)
                ->withInput()
                ->withErrors($atcontrato->errors);
	}

//Eliminar
	public function destroy($id)
	{
        $atcontrato = AtContrato::find($id);
        
        if(is_null($atcontrato))
            App::abort(404);
        
        else 
        {
            $attermino = AtTermino::find($atcontrato->attermino_id);
        	$attermino->estado = 3;
        	$attermino->save();
            $atcontrato->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 5,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            return Redirect::route('atterminos.index');
        }
		
        $atContrato = AtContrato::find($id);
        if (is_null($atContrato)) App::abort(404);
        else{
        	
            return Redirect::route('atContratos.index');
        }
	}

}