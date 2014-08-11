<?php
class Especialidad extends Eloquent {

    protected $table = 'especialidades';
    protected $softDelete = true;
    
    /* Relaciones */

        //
        public function subespecialidades() 
        {
            return $this->hasmany('SubEspecialidad','especialidad_id');
        }

}