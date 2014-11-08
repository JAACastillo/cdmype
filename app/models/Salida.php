<?php

class Salida extends \Eloquent {
	protected $fillable = array('estado',
                        'observacion',
                        'fecha_inicio',
                        'fecha_final',
                        'hora_salida',
                        'hora_regreso',
                        'lugar_destino',
                        'participantes',
                        'justificacion',
                        'objetivo',
                        'encargado');

   public function guardar($datos,$accion)
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
}
