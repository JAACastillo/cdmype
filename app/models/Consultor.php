<?php
class Consultor extends Eloquent {

    protected $table = 'consultores';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'nit',
        'dui',
        'correo',
        'nombre',
        'direccion',
        'sexo',
        'telefono',
        'celular'
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
                    'tabla' => 15,
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
                'nit' => 'required|unique:consultores',
                'dui' => 'required|unique:consultores',
                'nombre' => 'required|max:100',
                'correo' => 'email|required|max:75|unique:consultores',
                'direccion' => 'required|max:250',
                'sexo' => 'required'
            );
            
            if ($this->exists) 
            {
                $reglas['nit'] .= ',nit,' . $this->id;
                $reglas['dui'] .= ',dui,' . $this->id;
                $reglas['correo'] .= ',correo,' . $this->id;
            }
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;

            $this->errores = $validador->errors();
            return false;
        }


	/* Relaciones */

        //
        public function capConsultores() 
        {
            return $this->hasMany('CapConsultor', 'consultor_id');
        }

        public function especialidad() 
        {
            return $this->hasMany('ConsultorEspecialidad', 'consultor_id');
        }

        public function atConsultores() 
        {
            return $this->hasMany('AtConsultor', 'consultor_id');
        }
}