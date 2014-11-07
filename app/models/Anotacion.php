<?php
class Anotacion extends Eloquent {

    protected $table = 'anotaciones';
    public $errores;
    protected $softDelete = true;
    protected $fillable = array(
        'nota',
        'empresa_id',
        'usuario_id'
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
                    'tabla' => 25,
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
                'nota' => 'required',
                'empresa_id' => 'required',
                'usuario_id' => 'required'
            );

            $validador = Validator::make($datos,$reglas);

            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }

    /* Relaciones */

    public function usuario(){
        return $this->belongsTo('user', 'usuario_id');
    }


}
