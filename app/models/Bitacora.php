<?php
    class Bitacora extends Eloquent 
    {
        
        protected $table = 'bitacoras';
        protected $softDelete = true;
        protected $fillable = array(
            'usuario_id',
            'tabla',
            'tabla_id',
            'accion'
        );

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