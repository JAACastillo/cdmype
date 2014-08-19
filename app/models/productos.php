<?php
class productos extends Eloquent {
    
    protected $table = 'productos';    
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'nombre',
        'indicador_id'
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
                'nombre'          => 'required',
                'indicador_id'    => 'required|integer',
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    public function indicador(){
        return $this->belongsTo('indicador', 'indicador_id');
    }


}