<?php

class EmpresarioController extends BaseController {

	public function index()
	{
        $empresarios = Empresario::orderBy('nombre','asc')
            ->paginate(1000000000);

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
        $pasoActual = 1;
        $empresaEmpresario = EmpresaEmpresario::where('empresario_id','=', $id)->get();
        if ($empresaEmpresario == "[]"){
         $pasoReal = 2;
        }
        else            {
         $pasoReal = 4;
        }
        $id =$id;

        $sexos = array(1 => 'Mujer', 2 => 'Hombre');
        $tipos = array(1 => 'Empresaria', 2 => 'Propietaria', 3 => 'Representante', 4 => 'Empresario', 5 => 'Propietario');
        $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
            $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');

        $empresario->sexo = array_search($empresario->sexo,$sexos);
        $empresario->tipo = array_search($empresario->tipo,$tipos);
        $empresario->departamento = $empresario->municipio->departamento_id;
        $empresario->municipio = array_search($empresario->municipio_id, $municipios);

        $accion = array('route' => array('actualizarEmpresario', $id), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

            return View::make('clientes.empresarios.creacion-paso-1', compact('empresario', 'accion',
                'departamentos','municipios','id','pasoActual','pasoReal'));
	}


	public function actualizarEmpresario($id)
	{
        $empresario = Empresario::find($id);

        if(is_null($empresario))
            App::abort(404);

        $data = Input::all();

        if($empresario->guardar($data,'2'))
            return Redirect::route('empresarios');

        else
            return Redirect::back()->withInput()->withErrors($empresario->errores);
	}



	public function eliminarEmpresario($id)
	{
		$empresario = Empresario::find($id);

        if(is_null($empresario))
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

        $pasoActual = 1;
        $pasoReal = 1;
        $id =0;
        $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
        $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');

        $accion = array('route' => 'guardarEmpresario', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

        return View::make('clientes.empresarios.creacion-paso-1', compact('empresario',
            'accion', 'departamentos','municipios','id','pasoActual','pasoReal'));
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
        $pasoActual = 2;
        $empresaEmpresario = EmpresaEmpresario::where('empresario_id','=', $idEmpresario)->get();
        if ($empresaEmpresario == "[]"){
         $pasoReal = 2;
        }
        else            {
         $pasoReal = 4;
        }
        $id =$idEmpresario;

        $empresaEmpresario = new empresaEmpresario;

        $empresaEmpresario->empresario_id = $idEmpresario;

        return View::make('clientes.empresarios.creacion-paso-2', compact('empresaEmpresario','id','pasoActual','pasoReal'));
    }

    public function guardarEmpresa()
        {
            $idEmpresa = Input::get('empresa_id');
            $idEmpresario = Input::get('empresario_id');

            $empresa = Empresa::find($idEmpresa);
            if(!is_null($empresa))
            {

                $empresaEmpresario = new EmpresaEmpresario;
                $datos = Input::all();

                if($empresaEmpresario->guardar($datos,'1'))
                    return  Redirect::route('pasoSocios', $idEmpresario);

                else
                    return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

            }

            return Redirect::back()->withInput()->withErrors(['no-existe' => 'Lo siento no he encontrado la Empresa']);

    }

    public function empresaNueva($idEmpresario){

            $empresa = new Empresa;
            $datos = Input::all();

            if($empresa->guardar($datos,'1'))
            {
                $empresarioEmpresa = new EmpresaEmpresario;
                $empresarioEmpresa->tipo = 3;
                $empresarioEmpresa->empresario_id = $idEmpresario;
                $empresarioEmpresa->empresa_id = $empresa->id;

                $empresarioEmpresa->save();

                return  Redirect::route('pasoSocios',$idEmpresario);
            }
            else
            {
                 return Redirect::back()->withInput()->withErrors($empresario->errores);
            }
    }



    public function socios($idEmpresario)
    {
        $var = EmpresaEmpresario::where('empresario_id','=', $idEmpresario)->first();
        $idEmpresa = $var->empresa_id;

        $pasoActual = 3;
        $empresaEmpresario = EmpresaEmpresario::where('empresa_id','=', $idEmpresa)->get();
        if ($empresaEmpresario) {
            $pasoReal = 4;
        }
        else{
            $pasoReal = 3;
        }
        $id =$idEmpresa;
        $empresaEmpresario = new empresaEmpresario;

        $empresaEmpresario->empresa_id = $idEmpresa;

        return View::make('clientes.empresarios.creacion-paso-3', compact('empresaEmpresario', 'idEmpresa','id','pasoActual','pasoReal'));

    }

    public function nuevoSocio($idEmpresario){
            $var = EmpresaEmpresario::where('empresario_id','=', $idEmpresario)->first();
            $idEmpresa = $var->empresa_id;

            $empresario = new Empresario;
            $datos = Input::all();

            if($empresario->guardar($datos,'1'))
            {
                $empresarioEmpresa = new EmpresaEmpresario;
                $empresarioEmpresa->tipo = Input::get('tipo2');
                $empresarioEmpresa->empresario_id = $empresario->id;
                $empresarioEmpresa->empresa_id = $idEmpresa;

                $empresarioEmpresa->save();

                return Redirect::back();
            }
            else
            {
                 return Redirect::back()->withInput()->withErrors($empresario->errores);
            }
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
                return  Redirect::back();
            else
                return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

        }

        return Redirect::back()->withInput()->withErrors(['no-existe' => 'Lo siento no he encontrado el empresario']);

    }

    public function termino($idEmpresa)
    {

        $pasoActual = 4;
        $pasoReal = 4;
        $id =$idEmpresa;
        return View::make('clientes.empresarios.creacion-paso-4', compact('idEmpresa','id','pasoActual','pasoReal'));

    }

}
