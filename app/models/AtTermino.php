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
            $date = strtotime($datos['fecha']);

            $datos['fecha'] = date('Y-m-d', $date);
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

    

        //Atributos

        public function getOfertantesAttribute()
        {

            return $this->consultores()
                        ->where("doc_oferta", "!=", "")
                        ->get(); 
            //Return "Ofertantes";
        }


        public function getConsultorSeleccionadoAttribute()
        {
            return $this->consultores()
                        ->where("estado", '=', 'Seleccionado')
                        ->orderby('updated_at', 'desc')
                        ->first();
        }

        public function getPasoRealAttribute(){
            switch ($this->estado) {
            case 'Creado':                       
                return 3;
                break;
            case 'Enviado':
                return 4;
                break;
            case 'Ofertas Recibidas':
                return 5;
                break;
            case 'Consultor Seleccionado':
                return 6;
                break;
            case 'Contratada':
                return 7;
                break;
            case 'Finalizada':
                return 8;
                break;
            default:
                # code...
                break;
        }

        }
     

     
        // public function getContratoAttribute()
        // {
        //     return $this->contratos()
        //                 ->orderby('updated_at', 'desc')
        //                 ->first();
        // }


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

        public function consultores() 
        {
            return $this->hasMany('AtConsultor','attermino_id');
        }

        public function contrato(){
            return $this->hasOne('AtContrato', 'attermino_id');
        }

        public function acta(){
            return $this->hasOne('Acta','attermino_id');
        }
        
        public function ampliacion(){
            return $this->hasOne('ampliacionContrato', 'attermino_id');
        }

}