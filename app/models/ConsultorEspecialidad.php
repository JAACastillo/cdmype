<?php
class ConsultorEspecialidad extends Eloquent {
    
    protected $table = 'consultoresEspecialidades';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'consultor_id',
        'subespecialidad_id'
    );    
    
    /* Guardar */

        public function guardar($datos,$accion) 
        {
            if($this->validar($datos)) 
            {
                $this->fill($datos);
                $this->save();

                $id = $this->id;
                $bitacora = new Bitacora;
                $campos = array(
                    'usuario_id' => Auth::user()->id,
                    'tabla' => 16,
                    'tabla_id' => $id,
                    'accion' => $accion
                );
                
                $bitacora->guardar($campos);
                return true;
            }

            return false;
        }


    /* Validaciones */

        public function validar($datos) 
        {        
            $reglas = array(
                'consultor_id' => 'required',
                'subespecialidad_id' => 'required'
            );
            
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;

            $this->errores = $validador->errors();
            return false;
        }



	/* Relaciones */

        //
        public function consultor() 
        {
            return $this->belongsTo('Consultor','consultor_id');
        }


        public function especialidad()
        {
            return $this->belongsTo('subEspecialidad', 'subespecialidad_id');
        }

        public function subEspecialidades() 
        {
            return $this->belongsTo('Empresario','subespecialidad_id');
        }

}