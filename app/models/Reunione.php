<?php

class Reunione extends \Eloquent {
   protected $table = 'reuniones';
   public $errores;
   protected $softDelete = true;
   protected $fillable = array(
         'titulo',
         'user_id',
         'municipio_id',
         'fecha_inicio',
         'fecha_fin',
         'hora_inicio',
         'hora_fin',
         'detalle_reunion',
         'organizacion'
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
                    'tabla' => 26,
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
               'municipio_id' => 'required',
               'user_id' => 'required'
            );

            $validador = Validator::make($datos,$reglas);

            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }

    // relaciones

        public function municipio(){
            return $this->belongsTo('Municipio', 'municipio_id');
        }

}
