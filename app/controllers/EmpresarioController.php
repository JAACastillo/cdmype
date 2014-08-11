<?php

class EmpresarioController extends BaseController {

	public function index()
	{
        $empresarios = Empresario::orderBy('nombre','asc')
            ->paginate();
        
        return View::make('clientes.empresarios.lista', compact('empresarios'));
	}

	public function verEmpresario($id)
	{
        $empresario = Empresario::find($id);
        
        if(is_null($empresario)) 
            App::abort(404);

        return View::make('clientes.empresarios.ver', compact('empresario'));
	}


	public function editarEmpresario($id)
	{
        $empresario = Empresario::find($id);
        
        $sexos = array(1 => 'Mujer', 2 => 'Hombre');
        $tipos = array(1 => 'Empresaria', 2 => 'Propietaria', 3 => 'Representante', 4 => 'Empresario', 5 => 'Propietario');
        $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');

        $empresario->sexo = array_search($empresario->sexo,$sexos);
        $empresario->tipo = array_search($empresario->tipo,$tipos);
        $empresario->municipio = array_search($empresario->municipio_id, $municipios);

        return View::make('clientes.empresarios.formulario', compact('empresario','departamentos','municipios'));
	}


	public function actualizarEmpresario($id)
	{
        $empresario = Empresario::find($id);
        
        if(is_null($empresario)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($empresario->guardar($data,'2')) 
            return Redirect::route('empresarios.index');
        
        else 
            return Redirect::back()->withInput()->withErrors($empresario->errores);
	}



	public function eliminarEmpresario($id)
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

//Pasos

    //Creacion de la Empresa
    public function crearEmpresario()
    {
        $empresario = new Empresario;

        $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');

        $accion = array('route' => 'guardarEmpresario', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form');

        return View::make('clientes.empresarios.creacion-paso-1', compact('empresario', 'accion', 'departamentos','municipios'));
    }

    public function guardarEmpresario()
    {

        $empresario = new Empresario;
        $datos = Input::all(); 

        if($empresario->guardar($datos,'1'))
        {
            return  Redirect::route('pasoEmpresa', $empresario->id);
        }
        else
        { 
             return Redirect::back()->withInput()->withErrors($empresario->errores);
        }

    }

    //Seleccion del Empresario
    public function empresa( $idEmpresario)
    {
        $empresaEmpresario = new empresaEmpresario;

        $empresaEmpresario->empresario_id = $idEmpresario;

        return View::make('clientes.empresarios.creacion-paso-2', compact('empresaEmpresario'));
    }


    public function guardarEmpresa()
    {
        $idEmpresa = Input::get('empresa_id');

        $empresa = Empresa::find($idEmpresa);
        if(!is_null($empresa))
        {   

            $empresaEmpresario = new EmpresaEmpresario;
            $datos = Input::all();
            
            if($empresaEmpresario->guardar($datos,'1')) 
                return  Redirect::route('pasoSocios', $idEmpresa);
            
            else 
                return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

        }
        
        return Redirect::back()->withInput()->withErrors(['no-existe' => 'Lo siento no he encontrado la Empresa']);

    }

    public function socios($idEmpresa)
    {
        $empresaEmpresario = new empresaEmpresario;

        $empresaEmpresario->empresa_id = $idEmpresa;

        return View::make('clientes.empresarios.creacion-paso-3', compact('empresaEmpresario', 'idEmpresa'));

    }

    public function guardarSocios()
    {
        $idEmpresa = Input::get('empresa_id');

        $idEmpresario = Input::get('empresario_id');

        $empresario = Empresario::find($idEmpresario);
        if(!is_null($empresario))
        {   

            $empresaEmpresario = new EmpresaEmpresario;
            $datos = Input::all();
            
            if($empresaEmpresario->guardar($datos,'1')) 
                return  Redirect::route('pasoTerminoEmpresario', $idEmpresa);
            else 
                return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

        }
        
        return Redirect::back()->withInput()->withErrors(['no-existe' => 'Lo siento no he encontrado el empresario']);
        
    }

    public function termino($idEmpresa)
    {

        return View::make('clientes.empresarios.creacion-paso-4', compact('idEmpresa'));

    }

}