<?php

class CapTerminoController extends BaseController {


//Listar
	public function index()
	{

        $capterminos = CapTermino::orderBy('tema','asc')
            ->paginate();
        
        return View::make('capacitaciones.lista', compact('capterminos'));
	}



//inicio de los pasos.

    //Redirecciona al paso en el que se encuentra la Cap. 
    //llamado desde el listado
    public function Paso($id) 
    {
        $cap = CapTermino::find($id);

        switch ($cap->estado) {
            case 'Creado':                       
                return Redirect::route('capPasoConsultor', $id);
                break;
            case 'Enviado':
                return Redirect::route('capPasoOferta', $id);
                break;
            case 'Ofertas Recibidas':
                return Redirect::route('capPasoSeleccionarConsultor', $id);
                break;
            case 'Consultor Seleccionado':
                return Redirect::route('capPasoAsistencia', $id);
                break;
            case 'Contratada':
                return Redirect::route('capPasoActa', $id);
                break;
            case 'Finalizada':
                return Redirect::route('capPasoActa', $id);
                break;
            default:
                # code...
                break;
        }

        return "404";
    }



    //Pasos

        //Creacion de los terminos
            public function crearTermino()
            {

                $pasoActual = 1;
                $pasoReal = 1;
                $id = 0;
                $captermino = new CapTermino;
                $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');

                $accion = array('route' => array('capGuardarTermino'), 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');
                
                return View::make('capacitaciones.creacion-paso-1', 
                        compact('captermino', 'especialidades', 'accion', 'pasoActual', 'id', 'pasoReal'));
            }

            public function guardarTermino()
            {
                $datos = Input::all();
                $datos['usuario_id'] = Auth::user()->id;
                $datos['estado'] = 1;
                $captermino = new CapTermino;

                if($captermino->guardar($datos, 1))        
                    return Redirect::route('capPasoConsultor', ($captermino->id));
                
                return Redirect::back()->withInput()->withErrors($captermino->errores);
            }

            //Mostrar los terminos para editar

            public function modificarTermino($id)
            {
                
                $captermino =  CapTermino::find($id);


                if(! $captermino)
                    return Redirect::route('capCrearTermino');
                $pasoActual = 1;
                $pasoReal = $captermino->pasoReal;

                $especialidades = SubEspecialidad::all()->lists('sub_especialidad', 'id');
                $dataCategoria = array(1 => 'Emprendedoras y empresarias de los Departamentos de Cabañas, Cuscatlán y San Vicente.', 2 => 'Empresarios de los departamentos de Cabañas, Cuscatlán y San Vicente.');
                $captermino->categoria = array_search($captermino->categoria, $dataCategoria);

                $accion = array('route' => array('actualizarTermino', $id), 'method' => 'PATCH', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');

                return View::make('capacitaciones.creacion-paso-1', 
                        compact('captermino', 'especialidades', 'accion', 'pasoActual', 'id', 'pasoReal'));
            }

             public function actualizarTermino($id)
            {
                $datos = Input::all();

                $captermino = CapTermino::find($id);

                $datos['usuario_id'] = $captermino->usuario_id;

                if($captermino->guardar($datos, 1))        
                
                    return Redirect::route('capPaso', $id);
                
                return Redirect::back()->withInput()->withErrors($captermino->errores);
            }

        //Consultores
            public function consultores($id)
            {
                $cap = CapTermino::find($id);
                $pasoActual = 2;
                $pasoReal = $cap->pasoReal;
                $consultores = ConsultorEspecialidad::Where('subespecialidad_id', '=', $cap->especialidad_id)
                        ->with('especialidad', 'consultor')
                        ->paginate();
                return View::make('capacitaciones.creacion-paso-2', 
                compact('consultores', 'id', 'pasoActual', 'pasoReal'));
            }

            public function guardarConsultores()
            {

                $consultores =  Input::get('consultores');
                $id = Input::get('idCaptermino');

                $banderaConsultor = 0;
                $cap = CapTermino::find($id);

                foreach ($consultores as $consultor) {
                    $consul = $cap->consultores()
                            ->where('consultor_id', '=', $consultor);
                    if(!$consul->count() > 0)
                    {
                        $consultorAT = new CapConsultor;
                        $consultorAT->captermino_id = $id;
                        $consultorAT->consultor_id = $consultor;
                        $consultorAT->save();
                       
                        $this->mailOferta('emails.capacitacion', 
                                            $id, 
                                            $consultorAT->consultor->correo, 
                                            $consultorAT->consultor->nombre
                                        );
                        
                    }
                    $banderaConsultor = 1;
                }
                if($banderaConsultor == 1)
                {
                    $cap->estado = 2;
                    $cap->save();
                }

                return Redirect::route('capPasoOferta', $id);
            }

            private function mailOferta($template, $id, $email, $nombreConsultor)
            {
                Mail::send($template,array('id' => $id),function($message) use ($id, $email, $nombreConsultor) {
                   
                    $message->to($email, $nombreConsultor)
                            ->subject('capacitaciones - CDMYPE UNICAES');
                });
            }

        //Ofertas
            public function oferta($id)
            {

                $cap = CapTermino::find($id);
                $consultores =  $cap
                                ->consultores()
                                ->paginate();
                $pasoActual = 3;
                $pasoReal = $cap->pasoReal;
                return View::make('capacitaciones.creacion-paso-3', 
                        compact('consultores', 'id', 'pasoActual', 'id', 'pasoReal'));
            }

            public function guardarOfertas($id){

                $ofertas = Input::file('ofertas');
                $consultores = Input::get('consultores');

                $file = 0;
                $ofertantes = 0;

                foreach ($consultores as $consultor) {
                    if($ofertas[$file]){
                        $capConsultor = CapConsultor::find($consultor);
                        $capConsultor->doc_oferta = $this->guardarOferta($ofertas[$file]);
                        $capConsultor->save();
                        $ofertantes++;
                    }
                    $file++;
                }

                if($ofertantes > 0){
                    $cap = CapTermino::find($id);
                    $cap->estado = 3;
                    $cap->save();
                    return Redirect::route('capPaso', $id);
                }
                
                return Redirect::route('capPasoOferta', $id);
            }


            private function guardarOferta($file){
                $destinationPath = 'assets/ofertas/';
                $fileName = $file->getClientOriginalName();
                $file->move($destinationPath, $fileName);
                return $fileName;
            }    

        //Seleccionar Consultor
            public function consultor($id){

                $cap = CapTermino::find($id);

                $consultores = $cap
                                ->ofertantes;

                $pasoActual = 4;
                $pasoReal = $cap->pasoReal;
                return View::make('capacitaciones.creacion-paso-4', 
                    compact('consultores', 'id', 'pasoActual', 'pasoReal'));

            }

            public function seleccionarConsultor($id){
                $consultorID = Input::get('consultor');

                if($consultorID){
                    $consultor = CapConsultor::find($consultorID);
                    $consultor->estado = 2;
                    $consultor->save();

                    $cap = CapTermino::find($id);
                    $cap->estado = 4;
                    $cap->save();
                    return Redirect::route('capPaso', $id);
                }
                return Redirect::route('capPasoSeleccionarConsultor', $id);
            }

        //Asistencia

            public function asistencia($id){

                $asistencia = new Asistencia;

                $pasoReal = 5;
                $pasoActual = 5;
                
                return View::make('capacitaciones.creacion-paso-5', 
                        compact('asistencia','accion', 'pasoActual', 'id', 'pasoReal'));

            }


            public function guardarAsistencia($id){

                return "Guardar";

            }
}