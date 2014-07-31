<?php

class ConfiguracionController extends BaseController {

	public function index()
	{

	}

	public function create()
	{

	}


	public function store()
	{
        
	}

	public function show($id)
	{
        
	}


	public function edit($id)
	{
        $configuraciones = Configuracion::all();
        
        if(is_null($configuraciones)) 
            App::abort(404);
        
        return View::make('configuracion.formulario')
            ->with('configuraciones',$configuraciones);
	}


	public function update($id)
	{
        $configuraciones = Configuracion::all();
        
        if(is_null($configuraciones)) 
            App::abort(404);
        
        $datos = Input::all();
        
        if($configuraciones->guardar($datos,'2'))
            return Redirect::route('/index');
        
        else 
            return Redirect::route('configuracion.formulario')
                ->withInput()
                ->withErrors($consultor->errores);
	}

	public function destroy($id)
	{
        
	}
}