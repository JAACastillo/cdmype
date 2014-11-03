<?php

class AtTerminoController extends BaseController {

//Listar
	public function index()
	{

        $attermino = AtTermino//::orderBy('tema','asc')
            ::with('especialidad', 'empresa', 'usuario', 'consultores', 'contrato')
            ->paginate(1000000);

        return View::make('asistencia-tecnica.lista')
            ->with('atterminos', $attermino);
	}

    public function eliminarAsistencia($id)
    {
        $attermino = AtTermino::find($id);

            if(is_null($attermino))
                App::abort(404);

            else
            {
                $attermino->delete();

                $bitacora = new Bitacora;
                $campos = array(
                    'usuario_id' => Auth::user()->id,
                    'tabla' => 10,
                    'tabla_id' => $id,
                    'accion' => 3
                );

                $bitacora->Guardar($campos);
                return Redirect::back();
            }
    }

    public function verAsistencia()
    {
        return Redirect::route('atPasoTermino');
    }

//inicio de los pasos.

    //Redirecciona al paso en el que se encuent ra la AT.
    //llamado desde el listado
    public function Paso($id)
    {
        $at = AtTermino::find($id);


        $id2 = $id +  100000;
        $id2 = Math::to_base($id2, 62);

        try {

        switch ($at->estado) {
            case 'Creado':
                return Redirect::route('atPasoConsultor', $id2);
                break;
            case 'Enviado':
                return Redirect::route('atPasoOferta', $id2);
                break;
            case 'Ofertas Recibidas':
                return Redirect::route('atPasoSeleccionarConsultor', $id2);
                break;
            case 'Consultor Seleccionado':
                return Redirect::route('atPasoContrato', $id2);
                break;
            case 'Contratada':
                return Redirect::route('atPasoActa', $id2);
                break;
            case 'Finalizada':
                return Redirect::route('atPasoInforme', $id2);
                break;
            default:
                case 'Finalizada':
                    return Redirect::route('atPasoActa', $id2);
                    break;
                # code...
                break;
        }

        } catch (Exception $e) {
            App::abort(404);
        }

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
        $especialidades = array('' => 'Seleccione una opción') + SubEspecialidad::all()->lists('sub_especialidad', 'id');
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
