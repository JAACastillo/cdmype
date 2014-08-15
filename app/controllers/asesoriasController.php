<?php

class asesoriasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$asesorias = asesorias::paginate();
		return View::make('asesorias.lista', compact('asesorias'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$asesoria = new asesorias;
		return View::make('asesorias.formulario', compact('asesoria'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
			return Redirect::route('asesorias.index');
		}

		return Redirect::back()
						->withErrors($asesoria->errores)
						->withInput();
	}

    private function guardarAsesoria($file){
        $destinationPath = 'assets/asesorias/';
        $fileName = $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);
        return $fileName;
    }
 



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$asesoria = asesorias::find($id);
		return View::make('asesorias.formulario', compact('asesoria'));
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$asesoria = asesorias::find($id);

		$data = Input::get();

		$data['creador'] = $asesoria->creador;
		$data['modificado'] = Auth::user()->id;
		$data['material'] = 'Yes';
		
		if($asesoria->guardar($data, 1)){
			$materiales = Input::file('material');
			if(count($materiales)>0){
				foreach ($materiales as $material) {
					$nombreMaterial = $this->guardarAsesoria($material);

					$materialAsesoria = new asesoriaMaterial;
					$materialAsesoria->asesoria_id = $asesoria->id;
					$materialAsesoria->material = $nombreMaterial;

					$materialAsesoria->save();
				}
			}
			return Redirect::route('asesorias.index');
		}

		return Redirect::back()
						->withErrors($asesoria->errores)
						->withInput();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
