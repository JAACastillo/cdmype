<?php
class AtTermino extends Eloquent {

    protected $table = 'atTerminos';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'tema',
        'obj_general',
        'obj_especifico',
        'productos',
        'tiempo_ejecucion',
        'trabajo_local',
        'fecha',
        'financiamiento',
        'aporte',
        'estado',
        'especialidad_id',
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
                    'tabla' => 10,
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
                'tema' => 'required|max:500',
                'obj_general' => 'required|max:500',
                'obj_especifico' => 'required|max:500',
                'productos' => 'required|max:3000',
                'tiempo_ejecucion' => 'numeric|required',
                'trabajo_local' => 'numeric|required',
                'fecha' => 'required',
                'financiamiento' => 'required',
                'aporte' => 'required',
                'especialidad_id' => 'required',
                'usuario_id' => 'required',
                'empresa_id' => 'required'
            );
        
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;
            
            $this->errores = $validador->errors();
            
            return false;
        }

    
    /* Relaciones */

        //
        public function usuario() 
        {
            return $this->belongsTo('User');
        }

        public function especialidad() 
        {
            return $this->belongsTo('SubEspecialidad');
        }

        public function empresa() 
        {
            return $this->belongsTo('Empresa');
        }

        public function atConsultores() 
        {
            return $this->hasmany('AtConsultor','atconsultor_id');
        }

}