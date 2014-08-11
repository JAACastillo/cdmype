<?php

class EmpresaEmpresarioController extends BaseController {

//Listar
	public function index()
	{

	}

//Crear
	public function create()
	{
		
		$empresaEmpresario = new empresaEmpresario;
		return View::make('clientes.empresas.creacion-paso-2')
		->with('empresaEmpresario', $empresaEmpresario)
		->with('empresa_id',  Session::get('empresa_id'));

	}

//Guardar
	public function store()
	{
		$empresaEmpresario = new EmpresaEmpresario;
        $datos = Input::all();
        
        if($empresaEmpresario->guardar($datos,'1')) 
            return View::make('clientes.empresas.creacion-paso-3');
        
        else 
            return Redirect::route('Empresa-Empresario.create')
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