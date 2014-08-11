<?php
class Municipio extends Eloquent {

    protected $table = 'municipios';
    public $timestamps = false;

    /* Relaciones */

        //
        public function empresas() 
        {
            return $this->hasmany('Empresa','municipio_id');
        }

        public function empresarios() 
        {
            return $this->hasmany('Empresario','municipio_id');
        }

        public function departamento() 
        {
            return $this->belongsTo('Departamento','departamento_id');
        }
        
}