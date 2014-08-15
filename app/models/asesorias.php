<?php
class asesorias extends Eloquent {

    protected $table = 'asesorias';
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'nombre',
        'descripcion',
        'creador',
        'modificado'
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

    /* Validación de Campos */

        public function validar($datos) 
        {
            $reglas = array(
                'nombre' => 'required',
                'descripcion' => 'required',
                'material' => 'required',
                'creador' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }

    /* Relaciones */

        public function material() 
        {
            return $this->hasMany('asesoriaMaterial','asesoria_id');
        }

        public function usuario(){
            return $this->belongsTo('user', 'creador');
        }

        public function editado(){
            return $this->belongsTo('user', 'modificado');
        }
        
}