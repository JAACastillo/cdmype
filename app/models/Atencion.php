<?php

class Atencion extends Eloquent 
{
        
    protected $table = 'atenciones';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'fecha',
        'usuario_id',
        'empresa_id'
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
                    'tabla' => 4,
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
                'fecha' => 'required',
                'usuario_id' => 'required',
                'empresa_id' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    /* RELACIÓN */
    
        public function usuarios() 
        {
            return $this->belongsTo('Usuario','usuario_id');
        }

        public function empresas() 
        {
            return $this->belongsTo('Empresa','empresa_id');
        }

}