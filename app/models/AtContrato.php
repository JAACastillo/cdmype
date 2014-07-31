<?php
class AtContrato extends Eloquent {

    protected $table = 'atContratos';
    protected $softDelete = true;
    protected $fillable = array(
            'duracion',
            'fecha_inicio',
            'fecha_final',
            'pago',
            'aporte',
            //'num_bancario',
            'lugar_firma',
            'atconsultor_id'
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
                    'tabla' => 12,
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
                'duracion' => 'required',
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'pago' => 'numeric|required',
                'aporte' => 'numeric|required',
                'lugar_firma' => 'required',
                'atconsultor_id' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);

            if($validador->passes()) 
                return true;
                
            $this->errores = $validador->errors();
            
            return false;
        }

	/* RELACIÓN */

        public function atConsultores() 
        {
            return $this->belongsTo('AtConsultor','atconsultor_id');
        }

}