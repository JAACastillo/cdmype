<?php
class Departamento extends Eloquent {

    protected $table = 'departamentos';
    public $timestamps = false;

    /* Relaciones */

        //
        public function municipios() 
        {
            return $this->hasmany('Municipio','departamento_id');
        }
        
}