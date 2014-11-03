<?php
class Empresario extends Eloquent {

    protected $table = 'empresarios';
    public $errores;
    // protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'nit',
        'dui',
        'nombre',
        'municipio_id',
        'direccion',
        'sexo',
        'correo',
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
                    'tabla' => 2,
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
                'nit' => 'required|unique:empresarios',
                'dui' => 'required|unique:empresarios',
                'nombre' => 'required|max:100',
                'municipio_id' => 'required',
                'direccion' => 'required|max:250',
                'sexo' => 'required',
                'correo' => 'email|max:75|unique:empresarios'
            );
            
            if ($this->exists) 
            {
                $reglas['nit'] .= ',nit,' . $this->id;
                $reglas['dui'] .= ',dui,' . $this->id;
                $reglas['correo'] .= ',correo,' . $this->id;
            }
            
            $validator = Validator::make($datos,$reglas);

            if($validator->passes()) 
                return true;

            $this->errores = $validator->errors();
            return false;
        }


    /* Relaciones */

        //
        public function empresa() 
        {
            return $this->hasmany('EmpresaEmpresario','empresario_id');
        }

        public function asistencias() 
        {
            return $this->hasmany('Asistencia','empresario_id');
        }

        public function municipio() 
        {
            return $this->belongsTo('Municipio','municipio_id');
        }
    
}