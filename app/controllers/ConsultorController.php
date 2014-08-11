<?php

class ConsultorController extends BaseController {

	public function index()
	{
        $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();
        
        return View::make('consultores.lista')
            ->with('consultores', $consultores);
	}

	public function create()
	{
		$consultor = new Consultor;
		$especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        return View::make('consultores.formulario', compact('consultor', 'especialidades'));
	}


	public function store()
	{

        $consultor = new Consultor;
        $datos = Input::all();


        $subespecialidades = Input::get('especialidad_id');
        

        
        if($consultor->guardar($datos,'1'))
        {

            // $consultorEs = Consultor::find(1);
            // $consultor->especialidad()->saveMany($subespecialidades);
            
            foreach($subespecialidades as $subespecialidad) {
                $ConsultorEspecialidad = new ConsultorEspecialidad();
                $ConsultorEspecialidad->consultor_id = $consultor->id;
                $ConsultorEspecialidad->subespecialidad_id = $subespecialidad;
                $ConsultorEspecialidad->save();
            }

            return Redirect::route('consultores.index');  
        }
        else
        { 
            return Redirect::route('consultores.create')
                ->withInput()
                ->withErrors($consultor->errores);
        }
	}

	public function show($id)
	{
        $consultor = Consultor::find($id);

        if(is_null($consultor)) 
            App::abort(404);
        
        return View::make('consultores.ver')
            ->with('consultor',$consultor);
	}


	public function edit($id)
	{
        $consultor = Consultor::find($id);
        
        if(is_null($consultor)) 
            App::abort(404);
        
        $dataSexo = array(
            1 => 'Mujer', 
            2 => 'Hombre'
        );
        
        $consultor->sexo = array_search($consultor->sexo,$dataSexo);
        return View::make('consultores.formulario')
            ->with('consultor',$consultor);
	}


	public function update($id)
	{
        $consultor = Consultor::find($id);
        
        if(is_null($consultor)) 
            App::abort(404);
        
        $datos = Input::all();
        
        if($consultor->guardar($datos,'2'))
            return Redirect::route('consultores.index');
        
        else 
            return Redirect::route('consultores.edit', $consultor->id)
                ->withInput()
                ->withErrors($consultor->errores);
	}

	public function destroy($id)
	{
        $consultor = Consultor::find($id);
        
        if(is_null($consultor))
            App::abort(404);
        
        else 
        {
            $consultor->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 3,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            return Redirect::route('consultores.index');
        }
	}
}