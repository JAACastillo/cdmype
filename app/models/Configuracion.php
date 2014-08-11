<?php
class Configuracion extends Eloquent {
    
    protected $table = 'configuraciones';
    public $errores;
    protected $perPage = 9;
    protected $fillable = array(
        'num_bancario',
        'institucion',
        'correo'
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
                    'tabla' => 24,
                    'tabla_id' => $id,
                    'accion' => $accion
                );
                
                $bitacora->guardar($campos);
                return true;
            }
            
            return false;
        }

    /* Validaciones */

        public function validar($datos) {

            $reglas = array(
                'num_bancario' => 'required|max:50',
                'institucion' => 'required|max:200',
                'correo' => 'required|max:50'
            );
        
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;
            
            $this->errores = $validador->errors();
            
            return false;
        }
    
    
}