<?php

class ConsultorController extends BaseController {

	public function index()
	{
        $consultores = Consultor::orderBy('nombre','asc')
            ->with("municipio")
            ->paginate(10000000000);

        $consultorEspecialidad = ConsultorEspecialidad::all();

        return View::make('consultores.lista', compact('consultores', 'consultorEspecialidad'));
	}

	public function crearConsultor()
	{
		$consultor = new Consultor;

		$especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
        $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');
        return View::make('consultores.formulario', compact('consultor','especialidades','departamentos','municipios'));
	}


	public function guardarConsultor()
	{

        $consultor = new Consultor;
        $datos = Input::all();
        $subespecialidades = Input::get('especialidad_id');

        if($consultor->guardar($datos,'1'))
        {
            foreach($subespecialidades as $subespecialidad) {
                $ConsultorEspecialidad = new ConsultorEspecialidad();
                $ConsultorEspecialidad->consultor_id = $consultor->id;
                $ConsultorEspecialidad->subespecialidad_id = $subespecialidad;
                $ConsultorEspecialidad->save();
            }

            return Redirect::route('consultores');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($consultor->errores);
        }
	}

	public function verConsultor($id)
	{
        $consultor = Consultor::find($id);

        if(is_null($consultor))
            App::abort(404);

        return View::make('consultores.ver', compact('consultor'));
	}


	public function editarConsultor($id)
	{
        $consultor = Consultor::find($id);
        if(is_null($consultor))
            App::abort(404);

        $consultorEspecialidad = ConsultorEspecialidad::Where('consultor_id', '=', $id)->get();
        $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
        $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
        $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');
        $dataSexo = array('' => 'Seleccione el sexo', 1 => 'Mujer', 2 => 'Hombre');

        foreach ($consultorEspecialidad as $item)
        {
            $datos[] = $item->subespecialidad_id;
        }
        $consultor->especialidades = $datos;

        $consultor->departamento = $consultor->municipio->departamento_id;
        $consultor->sexo = array_search($consultor->sexo, $dataSexo);
        $consultor->municipio = array_search($consultor->municipio_id, $municipios);


        return View::make('consultores.formulario', compact('consultor', 'especialidades','departamentos', 'municipios'));
	}


	public function actualizarConsultor($id)
	{
        $consultor = Consultor::find($id);

        if(is_null($consultor))
            App::abort(404);

        $datos = Input::all();
        $subespecialidades = Input::get('especialidad_id');

        if($consultor->guardar($datos,'2')){

            if($this->actualizarEspecialidades($id,$subespecialidades)){
                return Redirect::route('consultores');
            }
            else{
                return Redirect::back()->withInput()->withErrors(['Error' => 'No se han podido actualizar las especialidades']);
            }
        }
        else
            return Redirect::back()->withInput()->withErrors($consultor->errores);
	}

	public function eliminarConsultor($id)
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
            return Redirect::route('consultores');
        }
	}

// Ver las especialidades
    public function verEspecialidades($id){

        $especialidadesConsultor = ConsultorEspecialidad::Where('consultor_id', '=', $id)->get();
        $datos[] = array();

       array_shift($datos);
        foreach ($especialidadesConsultor as $especialidad)
        {
             $datos[] = $especialidad->especialidad->sub_especialidad;
        }

        return Response::json($datos, 200,  array('content-type' => 'application/json', 'Access-Control-Allow-Origin' => '*'));
    }

//Actualizar las especialidades
    public function actualizarEspecialidades($idConsultor,$subespecialidades){

        //Sacamos todos las especialidades
        $consultores = ConsultorEspecialidad::where('consultor_id', '=', $idConsultor)->get();
        //Las eliminamos
        foreach ($consultores as $item) {
            $consultor = ConsultorEspecialidad::find($item->id);
            $consultor->delete();
        }
        //Ingresamos las nuevas
        foreach($subespecialidades as $subespecialidad) {
                $ConsultorEspecialidad = new ConsultorEspecialidad;
                $ConsultorEspecialidad->consultor_id = $idConsultor;
                $ConsultorEspecialidad->subespecialidad_id = $subespecialidad;
                $ConsultorEspecialidad->save();
        }

        return true;
    }

}
