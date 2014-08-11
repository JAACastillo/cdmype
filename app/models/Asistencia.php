<?php
class Participante extends Eloquent {
    
    protected $table = 'asistencias';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'empresario_id',
        'captermino_id',
        'nota'
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
                    'tabla' => 22,
                    'tabla_id' => $id,
                    'accion' => $accion
                );
                
                $bitacora->guardar($campos);
                return true;
            }
            return false;
        }

    /* Validación de Campos */

        public function validar($datos) 
        {
            $reglas = array(
                'empresario_id' => 'required',
                'captermino_id' => 'required',
                'nota' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        
    /* RELACIÓN */

        public function empresarios() 
        {
            return $this->belongsTo('Empresario','empresario_id');
        }

        public function capTerminos() 
        {
            return $this->belongsTo('CapTermino','captermino_id');
        }

}