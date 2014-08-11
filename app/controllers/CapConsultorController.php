<?php

class OfertaController extends BaseController {

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store()
	{
		$oferta = new Oferta;
        $data = Input::all();
        
        if($oferta->validAndSave($data,'1')) 
        {
        	if(Input::get('attermino_id') > 0)
                return Redirect::route('crearOferta',array('AtTermino',Input::get('attermino_id')));
                                       
            elseif(Input::get('captermino_id') > 0)
            	return Redirect::route('crearOferta',array('CapTermino',Input::get('captermino_id')));
        }
        else
        {
        	if(Input::get('attermino_id') > 0)
                return Redirect::route('crearOferta',array('AtTermino',Input::get('attermino_id')))
                    ->withInput()->withErrors($oferta->errors);
                                       
            elseif(Input::get('captermino_id') > 0)
            	return Redirect::route('crearOferta',array('CapTermino',Input::get('captermino_id')))
                    ->withInput()->withErrors($oferta->errors);
        }
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
		$oferta = Oferta::find($id);
        
        if (is_null($oferta))
            App::abort(404);
        
        else 
        {
            $oferta->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 10,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            
            if($oferta->attermino_id > 0)
                return Redirect::route('crearOferta',array('AtTermino',$oferta->attermino_id));
                                       
            elseif($oferta->captermino_id > 0)
            	return Redirect::route('crearOferta',array('CapTermino',$oferta->captermino_id));
        }
	}
}