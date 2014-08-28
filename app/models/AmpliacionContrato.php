<?php
class AmpliacionContrato extends Eloquent {
    
    protected $table = 'ampliacionescontratos';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'fecha',
        'tiempo_ampliacion',
        'periodo',
        'razonamiento',
        'attermino_id',
        'solicitante'
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
                    'tabla' => 14,
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
                'fecha' => 'required',
                'tiempo_ampliacion' => 'required',
                'periodo' => 'required',
                'razonamiento' => 'required',
                'solicitante' => 'required',
                'attermino_id' => 'required'

            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }

    /* Relaciones */
 
        public function atConsultores()
        {
            return $this->belongsTo('AtConsultor','atconsultor_id');
        }

}