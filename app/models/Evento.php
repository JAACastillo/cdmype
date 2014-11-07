<?php

class Evento extends Eloquent {

	// Add your validation rules here
	public static $rules = [
		'nombre' 		=> 'required',
		'descripcion' 	=> 'required',
		'fecha'			=> 'required',
		'lugar'			=> 'required',
		'tipo'			=> 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['nombre', 'descripcion', 'fecha', 'lugar', 'tipo'];

	// public function getFechaAttribute(){
	// 		return date("d-m-Y",strtotime($this->attributes['fecha']));
	// 	}
}
