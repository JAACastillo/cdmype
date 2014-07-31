<?php
    class Historia extends Eloquent {
        
    protected $table = 'historias';
    protected $softDelete = true;
    
    /* RELACIÓN PERTENECE A */

    public function usuarios() 
    {
        return $this->belongsTo('Usuario','usuario_id');
    }

    public function empresarios() 
    {
        return $this->belongsTo('Empresario','empresario_id');
    }
        
    public function empresas() 
    {
        return $this->belongsTo('Empresa','empresa_id');
    }
    
}