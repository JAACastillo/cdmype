<?php
class Especialidades extends Eloquent {

    protected $table = 'especialidades';
    protected $softDelete = true;
    
    /* Relaciones */

        //
        public function subEspecialidades() 
        {
            return $this->hasmany('SubEspecialidad','especialidad_id');
        }

}