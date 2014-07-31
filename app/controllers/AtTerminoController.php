<?php

class AtTerminoController extends BaseController {

//Listar
	public function index()
	{


        $attermino = AtTermino::orderBy('tema','asc')
            ->with('especialidad', 'empresa')
            ->paginate();
        
        return View::make('asistencia-tecnica.lista')
            ->with('atterminos', $attermino);
	}

//Crear
	public function create()
	{
        $attermino = new AtTermino;
       
        return View::make('asistencia-tecnica.creacion-paso-2')
            ->with('attermino', $attermino);
	}


//inicio de los pasos.


    public function Paso($id)
    {
        
        $at = AtTermino::find($id);
        switch ($at->estado) {
            case 'Creado':
                
                return Redirect::route('atPasoConsultor', $id);
                break;
            
            default:
                # code...
                break;
        }

        return "404";
    }

    //Seleccion de la Empresa
    public function empresa()
    {
        return View::make('asistencia-tecnica.creacion-paso-1');
    }
    public function empresaGuardar()
    {
        $idEmpresa = Input::get('empresario');

        $empresa = Empresa::find($idEmpresa);
        if(!is_null($empresa))
        {   

           return  Redirect::route('atPasoTerminos', $idEmpresa);

        }
        return View::make('asistencia-tecnica.creacion-paso-1')
                    ->withErrors(['no-existe' => 'Lo siento no he encontrado la empresa']);
    }

    //Creacion de los terminos
    public function terminos( $idEmpresa)
    {
        
        $empresario = Empresa::find($idEmpresa)->empresarios()->Where('tipo', '=', 'Propietario')->first();
        $idEmpresario =$empresario->id;
        $attermino = new AtTermino;



        $fecha = date("d/m/Y");
        //$fecha = strtotime ('+2 day', strtotime($fecha));

        //valores por defecto
        $attermino->trabajo_local = "70";
        $attermino->aporte = "30";
        $attermino->tiempo_ejecucion = "30";
        $attermino->empresario_id = $idEmpresario;
        $attermino->empresa_id = $idEmpresa;
        $attermino->fecha = $fecha;
        $attermino->financiamiento = 800;


        $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $accion = array('route' => 'atCrearTDR', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');

        return View::make('asistencia-tecnica.creacion-paso-2', compact('attermino', 'accion', 'especialidades'));
    }

    public function terminosGuardar()
    {
        $datos = Input::all();
        $datos['usuario_id'] = Auth::user()->id;


        $attermino = new AtTermino;


        if($attermino->guardar($datos, 1))        
            return View::make('asistencia-tecnica.creacion-paso-3', compact('attermino'));
        
        return Redirect::route('atPasoTerminos', $datos['empresa_id'])
                    ->withErrors($attermino->errores)
                    ->withInput();
    }


    public function consultores($id)
    {
        $at = AtTermino::find($id);
        $consultores = ConsultorEspecialidad::Where('subespecialidad_id', '=', $at->especialidad_id)
                        ->with('especialidad', 'consultor')
                        ->paginate();

       // return ;
        return View::make('asistencia-tecnica/creacion-paso-3', compact('consultores'));
    }

//Guardar
	public function store()
	{
        $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();
        // $attermino = new AtTermino;
        // $datos = Input::all();
        
        // if($attermino->guardar($datos,'1')) 
        
       
        return View::make('asistencia-tecnica.creacion-paso-3')
            ->with('consultores', $consultores);
        
        // else 
        //     return Redirect::route('crearTermino', array(Input::get('empresario_id'),Input::get('empresa_id')))
        //         ->withInput()->withErrors($attermino->errors);
	}

//Ver
	public function show($id)
	{
        // $attermino = AtTermino::find($id);
        // $atcontrato = AtTermino::find($id)->atcontratos;
        // $acta = AtTermino::find($id)->actas;
        // $historia = Empresario::find($attermino->empresario_id)->historias;
        
        // if(is_null($attermino)) 
        //     App::abort(404);

        // return View::make('asistencia/termino/show')
        //     ->with('attermino',$attermino)
        //     ->with('atcontrato',$atcontrato)
        //     ->with('historia',$historia)
        //     ->with('acta',$acta);
 	}

//Editar
	public function edit($id)
	{
		$attermino = AtTermino::find($id);
        $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $accion = array('route' => array('asistencia-tecnica.update', $id), 'method' => 'PATCH', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');

        return View::make('asistencia-tecnica.creacion-paso-2', compact('attermino', 'accion', 'especialidades'));
	}

//Actualizar
	public function update($id)
	{
		$attermino = AtTermino::find($id);
        
        if(is_null($attermino)) 
            App::abort(404);
        
        $datos = Input::all();
        $datos['usuario_id'] = $attermino->usuario_id;
        
        if($attermino->guardar($datos,'2')) 
            return Redirect::route('asistencia-tecnica.index');
        
        else 
            return Redirect::route('asistencia-tecnica.edit', $attermino->id)
                ->withInput()
                ->withErrors($attermino->errores);
	}

//Eliminar
	public function destroy($id)
	{
        $attermino = AtTermino::find($id);
        
        if(is_null($attermino))
            App::abort(404);
        
        else 
        {
            $attermino->softdelete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 4,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            return Redirect::route('atterminos.index');
        }
	}

    

}