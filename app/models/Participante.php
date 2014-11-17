<?php

class Participante extends \Eloquent {
	protected $fillable = [];//array('participante_id', 'salida_id');



   //relaciones

   public function participante()
   {
      return $this->belongsTo('User', 'participante_id');
   }
}
