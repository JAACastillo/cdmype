<?php
class indicador extends Eloquent {
    
    protected $table = 'indicadores';    
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'fechaInicio',
        'contabilidadFormal',
        'ventaNacional',
        'ventaExportacion',
        'costoProduccion',
        'financiamiento',
        'capitalSemilla',
        'empleadosHombreTemp',
        'empleadosHombreFijo',
        'empleadosMujerTemp',
        'empleadosMujerFijo',
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
                'fechaInicio'			=> 'required|date',

		        //'contabilidadFormal'	=> 'required',
		        // 'ventaNacional'   		=> 'required',
		        //'costoProduccion'		=> 'required',
		        //'financiamiento'		=> 'required',
		        //'capitalSemilla'		=> 'required',
		       // 'empleadosHombreTemp'	=> 'required|integer',
		        //'empleadosHombreFijo'	=> 'required|integer',
		        //'empleadosMujerTemp'	=> 'required|integer',
		        //'empleadosMujerFijo'	=> 'required|integer',
		        'empresa_id'			=> 'required',
                'productos'             => 'required',
                'mercados'              => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    public function empresa(){
    	return $this->belongsTo('Empresa', 'empresa_id');
    }

    public function mercados(){
        return $this->hasMany('mercadosActuales', 'indicador_id');
    }

    public function productos(){
        return $this->hasMany('productos', 'indicador_id');
    }

}