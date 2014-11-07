<?php

class EventoEmpresarios extends \Eloquent {
	protected $table = 'empresario_evento';


	public function empresario(){
		return $this->belongsTo('Empresario');
	}


	public function evento(){
		return $this->belongsTo('Evento');
	}
} 