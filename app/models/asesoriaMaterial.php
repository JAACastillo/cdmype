<?php
class asesoriaMaterial extends Eloquent {

    protected $table = 'asesoriaMateriales';
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'asesoria_id',
        'material'
    );
    
    
        public function asesoria() 
        {
            return $this->belongsTo('asesorias','asesoria_id');
        }
        
}