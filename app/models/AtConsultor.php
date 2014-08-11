<?php
class AtConsultor extends Eloquent {
    
    protected $table = 'atConsultores';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'estado',
        'doc_oferta',
        'fecha_oferta',
        'fecha_seleccion',
        'attermino_id',
        'consultor_id'
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
                    'tabla' => 11,
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
                'estado' => 'required',
                'doc_oferta' => 'required',
                'fecha_oferta' => 'required',
                'fecha_seleccion' => 'required',
                'attermino_id' => 'required', 
                'consultor_id' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
    
    /* RELACIÓN */
    
        public function atContratos() 
        {
            return $this->hasmany('AtContrato','atconsultor_id');
        }

        public function ampliacionesContratos() 
        {
            return $this->hasmany('AmpliacionContrato','atconsultor_id');
        }

        public function actas() 
        {
            return $this->hasmany('Acta','atconsultor_id');
        }

        public function atTerminos() 
        {
            return $this->belongsTo('AtTerminos','attermino_id');
        }

        public function consultor() 
        {
            return $this->belongsTo('Consultor');
        }

}