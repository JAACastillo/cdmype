<?php
class Empresa extends Eloquent {

    protected $table = 'empresas';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'categoria',
        'nombre',
        'descripcion',
        'municipio_id',
        'registro_iva',
        'constitucion',
        'clasificacion',
        'sector_economico',
        'actividad'
    );

    /* Validaciones */

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
                    'tabla' => 9,
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
            $rules = array(
                'categoria' => 'required',
                'nombre' => 'required',
                'municipio_id' => 'required',
                'registro_iva' => 'required',
                'clasificacion' => 'required'
            );
            
            $validator = Validator::make($datos,$rules);
            
            if($validator->passes()) 
                return true;

            $this->errores = $validator->errors();
            return false;
        }

	/* Relaciones */

        public function atenciones() 
        {
            return $this->hasMany('Atencion','empresa_id');
        }

        public function atTerminos() 
        {
            return $this->hasMany('AtTermino','empresa_id');
        }

        public function empresarios() 
        {
            return $this->hasMany('EmpresaEmpresario','empresa_id');
        }

        public function municipio() 
        {
            return $this->belongsTo('Municipio');
        }

}