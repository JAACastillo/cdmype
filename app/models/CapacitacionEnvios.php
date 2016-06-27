<?php
    class CapacitacionEnvios extends Eloquent 
    {
        
        protected $table = 'capacitaciones_envios';
        protected $softDelete = true;
        protected $fillable = array(
            'user_id',
            'capacitacion_id',
            'fecha_limite'
        );

        // public function getFechaLimiteAttribute(){ 
        //     $date = strtotime($this->attributes['fecha_limite']);
        //     return date('d/m/Y', $date);
        // }


        public function capacitacion(){
            return $this->belongsTo('CapTermino', 'capacitacion_id');
        }
}