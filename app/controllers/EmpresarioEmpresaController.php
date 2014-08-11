<?php

class EmpresarioEmpresaController extends BaseController {

//Listar
	public function index()
	{

	}

//Crear
	public function create()
	{
		$empresaEmpresario = new empresaEmpresario;
		return View::make('clientes.empresarios.creacion-paso-2')
		->with('empresaEmpresario', $empresaEmpresario)
		->with('empresario_id',  Session::get('empresario_id'));

	}

//Guardar
	public function store()
	{
		$empresaEmpresario = new EmpresaEmpresario;
        $datos = Input::all();
        
        if($empresaEmpresario->guardar($datos,'1')) 
            return View::make('clientes.empresarios.creacion-paso-3');
        
        else 
            return Redirect::route('Empresario-Empresa.create')
                ->withInput()
                ->withErrors($empresaEmpresario->errores);

		
	}

//Ver
	public function show($id)
	{
		//
	}

//Editar
	public function edit($id)
	{
		//
	}

//Actualizar
	public function update($id)
	{
		//
	}

//Eliminar
	public function destroy($id)
	{
        //
	}

}