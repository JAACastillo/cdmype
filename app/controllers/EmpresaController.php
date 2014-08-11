<?php

class EmpresaController extends BaseController {


	public function index()
	{
        $empresas = Empresa::orderBy('nombre','asc')
            ->paginate();
        
        $empresario = Empresario::All()->count();
        
        return View::make('clientes.empresas.lista', compact('empresas'));
	}

//Inicio de los pasos.

    //Creacion de la Empresa
    public function empresa()
    {
        $empresa = new Empresa;

        $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');

        $accion = array('route' => 'pasoEmpresa', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form');

        return View::make('clientes.empresas.creacion-paso-1', compact('empresa', 'accion', 'departamentos','municipios'));
    }

    public function empresaGuardar()
    {

        $empresa = new Empresa;
        $datos = Input::all(); 

        if($empresa->guardar($datos,'1'))
        {
            return  Redirect::route('pasoEmpresario', $empresa->id);
        }
        else
        { 
             return Redirect::back()->withInput()->withErrors($empresa->errores);
        }

    }

    //Seleccion del Empresario
    public function empresario( $idEmpresa)
    {
        $empresaEmpresario = new empresaEmpresario;

        $empresaEmpresario->empresa_id = $idEmpresa;

        return View::make('clientes.empresas.creacion-paso-2', compact('empresaEmpresario'));
    }


    public function empresarioGuardar()
    {
        $idEmpresario = Input::get('empresario_id');

        $empresario = Empresario::find($idEmpresario);
        if(!is_null($empresario))
        {   

            $empresaEmpresario = new EmpresaEmpresario;
            $datos = Input::all();
            
            if($empresaEmpresario->guardar($datos,'1')) 
                return  Redirect::route('pasoTermino', Input::get('empresa_id'));
            
            else 
                return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

        }
        
        return Redirect::back()->withErrors(['no-existe' => 'Lo siento no he encontrado el Empresario']);

    }

    public function termino($idEmpresa)
    {

        return View::make('clientes.empresas.creacion-paso-3', compact('idEmpresa'));

    }

    public function store()
    {


    }

	public function show($id)
	{
        $empresa = Empresa::find($id);
        
        if(is_null($empresa)) 
            App::abort(404);

        return View::make('clientes.empresas.ver')
            ->with('empresa',$empresa);
	}


	public function edit($id)
	{
        $empresa = Empresa::find($id);

        $Categoria = array(
            1 => 'Empresa', 
            2 => 'Grupo'
        );
        
        $Constitucion = array(
            1 => 'Informal Natural', 
            2 => 'Formal Natural', 
            3 => 'Formal Jurídica'
        );
        
        $Clasificacion = array(
            1 => 'Emprendedor', 
            2 => 'Micro-empresa',
            3 => 'Micro-empresa de Subsistencia', 
            4 => 'Grupo Asociativo Empresas',
            5 => 'No definido'
        );

        $Sector = array(
            1 => 'Artesanias',
            2 => 'Agroindustrias Alimentaria',
            3 => 'Calzado',
            4 => 'Comercio',
            5 => 'Construcción',
            6 => 'Química Farmaceutica',
            7 => 'Tecnología de Información y Comunicación',
            8 => 'Textiles y Confección',
            9 => 'Turismo',
            10 => 'Otros'
        );

        // Variables

        $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');
        
        $empresa->categoria = array_search($empresa->categoria,$Categoria);
        $empresa->constitucion = array_search($empresa->constitucion,$Constitucion);
        $empresa->clasificacion = array_search($empresa->clasificacion,$Clasificacion);
        $empresa->sector_economico = array_search($empresa->sector_economico,$Sector);


        $accion = array('route' => array('empresas.update', $id), 'method' => 'PATCH', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');

        return View::make('clientes.empresas.formulario', 'empresa', 'municipios', 'departamentos');
	}

	public function update($id)
	{
        $empresa = Empresa::find($id);
        
        if(is_null($empresa)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($empresa->guardar($data,'2')) 
            return Redirect::route('empresas.index');
        
        else 
            return Redirect::route('empresas.edit', $empresa->id)
                ->withInput()
                ->withErrors($empresa->errores);
	}

	public function destroy($id)
	{
		$empresa = Empresa::find($id);
        
        if (is_null($empresa)) 
            App::abort(404);
        
        else 
        {
            $empresa->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 5,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->guardar($campos);
            return Redirect::route('clientes.empresas.index');
        }
	}

}