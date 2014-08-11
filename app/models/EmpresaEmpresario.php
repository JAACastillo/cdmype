<?php
class EmpresaEmpresario extends Eloquent {

    /* Atributos */

    protected $table = 'empresasEmpresarios';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'tipo',
        'empresario_id',
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
                    'tabla' => 6,
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
                'tipo' => 'required',
                'empresario_id' => 'required',
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
        public function empresas() 
        {
            return $this->belongsTo('Empresa','empresa_id');
        }

        public function empresarios() 
        {
            return $this->belongsTo('Empresario','empresario_id');
        }


}