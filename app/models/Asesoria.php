<?php

class Asesoria extends \Eloquent {
   protected $table = 'asesoria';
   public $errores;
   protected $softDelete = true;
   protected $fillable = array(
        'titulo',
         'municipio_id',
         'fecha_inicio',
         'fecha_fin',
         'hora_inicio',
         'hora_fin',
         'tipo',
         'especialidad',
         'proyecto_id',
         'actividad',
         'detalle',
         'estado',
         'user_id',
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
                    'tabla' => 27,
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
               'user_id' => 'required',
               'empresa_id'  => 'required'
            );

            $validador = Validator::make($datos,$reglas);

            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }

        public function empresa()
        {
            return $this->belongsTo('Empresa');
        }

        public function municipio()
        {
            return $this->belongsTo('Municipio', 'municipio_id');
        }

        public function especialidades()
        {
            return $this->belongsTo('Especialidades', 'especialidad');
        }

        public function proyecto()
        {
            return $this->belongsTo('proyecto', 'proyecto_id');
        }

        public function actividad()
        {
            return actividadesProyecto::find($this->actividad);
        }
        public function asesor(){
            return $this->belongsTo('User', 'user_id');
        }
}
