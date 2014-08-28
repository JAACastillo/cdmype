<?php
class indicadoresProyecto extends Eloquent {
    
    protected $table = 'indicadoresproyecto';    
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'indicadorproyecto_id',
        'proyecto_id',
        'meta'
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
                    'tabla' => 21,
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
                'indicadorproyecto_id'      => 'required',
                'proyecto_id'    => 'required|integer',
                'meta'       => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    public function proyecto(){
        return $this->belongsTo('proyecto', 'proyecto_id');
    }

    public function definicion(){
        return $this->belongsTo('proyectoIndicador', 'indicadorproyecto_id');
    }


}