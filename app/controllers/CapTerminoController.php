<?php

class CapTerminoController extends BaseController {

    public function index()
	{		
        $capterminos = CapTermino::orderBy('tema','asc')
            ->paginate();
        
        return View::make('capacitaciones.lista',compact('capterminos'));
	}


	public function create()
	{		
        $captermino = new CapTermino;
       
        return View::make('capacitaciones.creacion-paso-2',compact('captermino'));
    }

	public function store()
	{
        $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();
        // $attermino = new AtTermino;
        // $datos = Input::all();
        
        // if($attermino->guardar($datos,'1')) 
        
       
        return View::make('capacitaciones.creacion-paso-3')
            ->with('consultores', $consultores);
        
        // else 
        //     return Redirect::route('crearTermino', array(Input::get('empresario_id'),Input::get('empresa_id')))
        //         ->withInput()->withErrors($attermino->errors);
	}


	public function show($id)
	{
        $captermino = CapTermino::find($id);
        $capcontrato = CapTermino::find($id)->capcontratos;
        
        if(is_null($captermino)) 
            App::abort(404);

        return View::make('capacitacion/termino/show')
            ->with('captermino',$captermino)
            ->with('capcontrato',$capcontrato);
	}


	public function edit($id)
	{   
        $captermino = CapTermino::find($id);
                
        return View::make('capacitacion/termino/form')
                ->with('captermino', $captermino)
                ->with('estado', $captermino->estado)
                ->with('usuario_id', $captermino->usuario_id)
                ->with('consultor_id',$captermino->consultor_id);
	}


	public function update($id)
	{
		$captermino = CapTermino::find($id);
        
        if(is_null($captermino)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($captermino->validAndSave($data,'2')) 
            return Redirect::route('capterminos.index');
        
        else 
            return Redirect::route('capterminos.edit', $captermino->id)
                ->withInput()
                ->withErrors($captermino->errors);
	}


	public function destroy($id)
	{
        $captermino = CapTermino::find($id);
        
        if(is_null($captermino))
            App::abort(404);
        
        else 
        {
            $captermino->delete();
            $bitacora = new Bitacora;
            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 7,
                'tabla_id' => $id,
                'accion' => 3
            );
            
            $bitacora->Guardar($campos);
            return Redirect::route('capterminos.index');
        }
	}
}