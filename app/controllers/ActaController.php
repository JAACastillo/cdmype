<?php

class ActaController extends BaseController {

//Listar
	public function index()
	{
         $actas = Acta::paginate();
        
        return View::make('asistencia-tecnica.actas.lista', compact('actas'));
	}

//Crear
	public function create()
	{
		//
	}

//Guardar
	public function store()
	{
		//
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