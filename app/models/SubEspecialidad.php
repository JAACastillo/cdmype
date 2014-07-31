<?php
class SubEspecialidad extends Eloquent {

    protected $table = 'subEspecialidades';
    protected $softDelete = true;
    public $errores;
    protected $perPage = 10;
    protected $fillable = array(
        'especialidad_id',
        'subespecialidad'
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
                    'tabla' => 17,
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
                'especialidad_id' => 'required',
                'subespecialidad' => 'required'
            );
            
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;

            $this->errores = $validador->errors();
            return false;
        }


    
    /* Relaciones */

        //
        public function atTerminos() 
        {
            return $this->hasmany('AtTermino','subespecialidad_id');
        }

        public function especialidades() 
        {
            return $this->belongsTo('Especialidad','especialidad_id');
        }

        public function consultoresEspecialidades() 
        {
            return $this->hasmany('ConsultorEspecialidad','subespecialidad_id');
        }

}