<?php
class CapTermino extends Eloquent {

    protected $table = 'capTerminos';
    public $errores;
    protected $perPage = 9;
    protected $fillable = array(
        'encabezado',
        'tema',
        'descripcion',
        'obj_General',
        'obj_Especifico',
        'productos',
        'lugar',
        'fecha',
        'fecha_lim',
        'hora_ini',
        'hora_fin',
        'nota',
        'estado',
        'usuario_id'
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
                    'tabla' => 20,
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
                'encabezado' => 'max:500',
                'tema' => 'required|max:500',
                'descripcion' => 'required|max:3000',
                'obj_general' => 'required|max:500',
                'obj_especifico' => 'required|max:500',
                'productos' => 'required|max:3000',
                'lugar' => 'required|max:1000',
                'fecha' => 'required',
                'fecha_lim' => 'required',
                'hora_ini' => 'required',
                'hora_fin' => 'required',
                'nota' => 'max:3000'
            );
        
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;
            
            $this->errores = $validador->errors();
            
            return false;
        }
    
    /* Relaciones */

        public function usuarios() 
        {
            return $this->belongsTo('Usuario','usuario_id');
        }

        public function capConsultores() 
        {
            return $this->hasmany('Usuario','captermino_id');
        }

        public function asistencias() 
        {
            return $this->hasmany('Usuario','captermino_id');
        }

}