<?php

class EmpresarioController extends BaseController {

	public function index()
	{
        $empresarios = Empresario::orderBy('nombre','asc')
            ->paginate();
        
        return View::make('clientes.empresarios.lista', compact('empresarios'));
	}

	public function create()
	{
		$empresario = new Empresario;
		
        // Variables
       $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');

        return View::make('clientes.empresarios.creacion-paso-1', compact('empresario','departamentos','municipios'));
	}


	public function store()
	{

        $empresario = new Empresario;
        $datos = Input::all();

        //Recuperar ultimo registro
        $id = '1';
        
        if($empresario->guardar($datos,'1'))
        {
             Session::put('empresario_id', $id);
             return Redirect::route('Empresario-Empresa.create');  
        }
        else
        { 
             return Redirect::route('empresarios.create')
                 ->withInput()
                 ->withErrors($empresario->errores);
	    }
    }


	public function show($id)
	{
        $empresario = Empresario::find($id);
        
        if(is_null($empresario)) 
            App::abort(404);

        return View::make('clientes.empresarios.ver')
            ->with('empresario',$empresario);
	}


	public function edit($id)
	{
        $empresario = Empresario::find($id);
        
        $sexos = array(
            1 => 'Mujer', 
            2 => 'Hombre'
        );
        
        $tipos = array(
            1 => 'Empresaria', 
            2 => 'Propietaria', 
            3 => 'Representante', 
            4 => 'Empresario', 
            5 => 'Propietario'
        );

        // Variables

        $departamentos = array( 1 => 'Cabañas' );
        $municipios = array( 1 => 'Ilobasco' );

        $empresario->sexo = array_search($empresario->sexo,$sexos);
        $empresario->tipo = array_search($empresario->tipo,$tipos);
        
        return View::make('clientes.empresarios.formulario')
            ->with('empresario', $empresario)
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios);
	}


	public function update($id)
	{
        $empresario = Empresario::find($id);
        
        if(is_null($empresario)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($empresario->guardar($data,'2')) 
            return Redirect::route('empresarios.index');
        
        else 
            return Redirect::route('empresarios.edit', $empresario->id)
                ->withInput()
                ->withErrors($user->errors);
	}



	public function destroy($id)
	{
		$empresario = Empresario::find($id);
        
        if (is_null($empresario)) 
            App::abort(404);
        
        else 
        {
            $empresario->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 2,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            return Redirect::route('empresarios.index');
        }
	}
}