<?php

Route::resource('asesorias', 'asesoriasController');


//devolver el material de las asesorias

Route::get('asesoria/material/{asesoria}', ['as' => 'materialAsesoria', 'uses' => 
	function($asesoria){
		return Redirect::to('assets/asesorias/' . $asesoria);
	}
	]);