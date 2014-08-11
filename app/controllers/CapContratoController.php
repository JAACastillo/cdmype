<?php

class CapContratoController extends BaseController {


	public function index()
	{
        $capcontratos = CapContrato::paginate();
        
        return View::make('capacitaciones.contratos.lista', compact('capcontratos'));
	}

	public function create()
	{
		 $capcontrato = new CapContrato;
		return View::make('capacitaciones.creacion-paso-7', compact('capcontrato'));
	}

	public function store()
	{
        $capcontrato = new CapContrato;
        $data = Input::all();
        
	    // if($capcontrato->guardar($data,'1'))
	    // {   
	    //     $captermino = CapTermino::find(Input::get('captermino_id'));
	    // 	$captermino->estado = 4;
	    // 	$captermino->save();
	    //     return Redirect::route('capcontratos.index');
	    // }
	    
	    // else 
            return Redirect::route('capterminos.index');
	}

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}
	
	public function destroy($id)
	{
		//
	}

}