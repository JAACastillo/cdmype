<?php

class pasoEmpresaController extends BaseController {
	//Seleccion de la Empresa
    public function empresa()
    {
        $pasoActual = 1;
        $pasoReal = 1;
        $id = 0;
        $idEmpresa = 0;
        //return $idEmpresa;
        return View::make('asistencia-tecnica.creacion-paso-1',
                    compact('pasoActual','id', 'idEmpresa', 'pasoReal'));
    }
    public function empresaGuardar()
    {
        try {
            
        $idEmpresa = Input::get('empresa_id');

        $empresa = Empresa::find($idEmpresa);
        if(!is_null($empresa))
        {   
            //Cookie::forever('atEmpresa', $idEmpresa);
            //return Cookie::get('atEmpresa');
           return  Redirect::route('atPasoTerminos', $idEmpresa);

        }
        return Redirect::route('atPasoEmpresa')
                    ->with(['msj' => 'La empresa no existe']);

        } catch (Exception $e) {
            App::abort(404);    
        }
        
    }

}