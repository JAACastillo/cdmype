<?php 

class pasoConsultoresController extends BaseController
{

    public function consultores($id)
    {
        try {
            
        
        $id2 = (Math::to_base_10($id, 62) ) - 100000;
        $at = AtTermino::find($id2);


        $pasoActual = 3;
        $pasoReal = $at->pasoReal;
        $consultores = ConsultorEspecialidad::Where('subespecialidad_id', '=', $at->especialidad_id)
                        ->with('especialidad', 'consultor')
                        ->paginate(1000);
        return View::make('asistencia-tecnica/creacion-paso-3', 
                compact('consultores', 'id', 'pasoActual', 'pasoReal'));

        } catch (Exception $e) {
            App::abort(404);    
        }
    }

    public function consultoresGuardar()
    {
        try {
            
            $consultores =  Input::get('consultores');
            $id = Input::get('idEmpresa');

            $id  = Math::to_base_10($id,62) - 100000;
            $banderaConsultor = 0;
            $at = AtTermino::find($id);
            
            if ($consultores != []) {

                foreach ($consultores as $consultor) {
                    $consul = $at->consultores()
                            ->where('consultor_id', '=', $consultor);
                    if(!$consul->count() > 0)
                    {
                        $consultorAT = new AtConsultor;
                        $consultorAT->attermino_id = $id;
                        $consultorAT->consultor_id = $consultor;
                        $tema = $at->tema;
                       
                       if( $this->mailOferta('emails.asistenciaTecnica', 
                                            $id, 
                                            $consultorAT->consultor->correo, 
                                            $consultorAT->consultor->nombre,
                                            $tema
                                        )
                        )
                        {
                            $consultorAT->save();
                        }
                        
                    }
                    $banderaConsultor = 1;
                }
                if($banderaConsultor == 1)
                {
                    $at->estado = 2;
                    $at->save();
                }

                $id = Math::to_base($id + 100000, 62);
                return Redirect::route('atPasoOferta', $id);
            }

                return Redirect::back()->with('msj', 'Seleccione un consultor');

        } catch (Exception $e) {
            App::abort(404);    
        }

    }


//fin de los pasos
   private function mailOferta($template, $id, $email, $nombreConsultor, $tema)
    {
        try {
                    
            Mail::send($template,array('id' => $id),function($message) use ($id, $email, $nombreConsultor, $tema) {
               
                $message->to($email, $nombreConsultor)
                        ->subject('TDR - ' . $tema);
            });
            return 1;
        } catch (Exception $e) {
            return 0;  
        }

    }

}