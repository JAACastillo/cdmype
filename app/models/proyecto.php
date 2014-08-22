<?php
class proyecto extends Eloquent {
    
    protected $table = 'proyectos';    
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'nombre',
        'meta',
        'descripcion',
        'fechaInicio',
        'fechaFin',
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
                'nombre'        => 'required',
                'descripcion'        => 'required',
		        'meta'			=> 'required',			
		        'fechaInicio'	=> 'required|date',
		        'fechaFin'		=> 'required|date',
		        'empresa_id'	=> 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    public function empresa(){
        return $this->belongsTo('empresa', 'empresa_id');
    }

    public function indicadores(){
        return $this->hasMany('indicadoresProyecto', 'proyecto_id');
    }

    public function actividades(){
        return $this->hasMany('actividadesProyecto', 'proyecto_id');
    }

}