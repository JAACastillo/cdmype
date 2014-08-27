<?php

class asesoriasController extends \BaseController {

	public function index()
	{

		$asesorias = asesorias::paginate();
		return View::make('asesorias.lista', compact('asesorias'));
	}

	public function create()
	{
		$asesoria = new asesorias;
		return View::make('asesorias.formulario', compact('asesoria'));
	}


	public function store()
	{

		$data = Input::get();
		$data['creador'] = Auth::user()->id;
		$data['material'] = Input::file('material');

		$asesoria = new asesorias;

		$materiales = Input::file('material');

		if($asesoria->guardar($data, 1)){

			foreach ($materiales as $material) {

				if(!empty($material)){
					$nombreMaterial = $this->guardarAsesoria($material);
					$materialAsesoria = new asesoriaMaterial;
					$materialAsesoria->asesoria_id = $asesoria->id;
					$materialAsesoria->material = $nombreMaterial;

					$materialAsesoria->save();
				}
			}
			return Redirect::route('asesorias');
		}

		return Redirect::back()
						->withErrors($asesoria->errores)
						->withInput();
	}

    private function guardarAsesoria($file){
    	try {
    	
	        $destinationPath = 'assets/asesorias/';
	        $fileName = $file->getClientOriginalName();
	        $file->move($destinationPath, $fileName);
	        return $fileName;

    	} catch (Exception $e) {
    		App::abort(404);
    	}
    }
 

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
		$asesoria = asesorias::find($id);
		return View::make('asesorias.formulario', compact('asesoria'));
		
	}


	public function update($id)
	{
		//
		$asesoria = asesorias::find($id);

		$data = Input::get();

		$data['creador'] = $asesoria->creador;
		$data['modificado'] = Auth::user()->id;
		
		if($asesoria->guardar($data, 1)){
			$materiales = Input::file('material');
			if(count($materiales)>0){
				
				foreach ($materiales as $material) {
					if ($material != "") {
					$nombreMaterial = $this->guardarAsesoria($material);

					$materialAsesoria = new asesoriaMaterial;
					$materialAsesoria->asesoria_id = $asesoria->id;
					$materialAsesoria->material = $nombreMaterial;

					$materialAsesoria->save();
					}
				}
			}
			
			return Redirect::route('asesorias');
		}

		return Redirect::back()
						->withErrors($asesoria->errores)
						->withInput();
	}


	public function destroy($id)
	{
		//
	}


}
