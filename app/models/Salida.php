<?php

class Salida extends \Eloquent {
  protected $fillable = array('estado',
                        'observacion',
                        'fecha_inicio',
                        'hora_salida',
                        'hora_regreso',
                        'lugar_destino',
                        'participantes',
                        'justificacion',
                        'objetivo',
                        'encargado');

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
                 'tabla' => 26,
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
                'observacion'   => 'required',
                'fecha_inicio'  => 'required',
                'hora_salida'   => 'required',
                'hora_regreso'  => 'required',
                'lugar_destino' => 'required',
                // 'participantes' => 'required',
                'justificacion' => 'required',
                'objetivo'      => 'required',
                'encargado'     => 'required'

            );
                      
            $validator = Validator::make($datos,$reglas);

            if($validator->passes()) 
                return true;

            $this->errores = $validator->errors();
            return false;
        }


     //relaciones

     public function municipio()
     {
        return $this->belongsTo('Municipio', 'lugar_destino');
     }

     public function responsable()
     {
        return $this->belongsTo('User', 'encargado');
     }

     public function participantes(){
        return $this->hasMany('participante');
     }
}

