<?php

class ConfiguracionController extends BaseController {

	public function index()
	{
		$configuraciones = Configuracion::find(1);
        
        if(is_null($configuraciones)) 
            App::abort(404);
        
        return View::make('configuraciones.formulario', compact('configuraciones'));
	}


	public function actualizarConfiguraciones()
	{
        $configuraciones = Configuracion::find(1);
        
        if(is_null($configuraciones)) 
            App::abort(404);
        
        $datos = Input::all();
        
        if($configuraciones->guardar($datos,'2'))
            return Redirect::to('/');
        
        else 
            return Redirect::back()->withInput()->withErrors($configuraciones->errores);
	}
}