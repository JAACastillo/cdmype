<?php

class Movimiento extends Eloquent 
{
        
    protected $table = 'movimientos';
    protected $softDelete = true;

    //Guardar
        public function guardar($datos) 
        {
            //Llenamos la bitacora y se guarda en la BD
            $this->fill($datos);
            $this->save();
        }
        
    /* RELACIÓN */
        
        public function usuarios() 
        {
            return $this->belongsTo('Usuario','usuario_id');
        }

}