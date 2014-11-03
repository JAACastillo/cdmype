<?php
class Empresa extends Eloquent {

    protected $table = 'empresas';
    public $errores;
    protected $perPage = 9;
    protected $softDelete = true;
    protected $fillable = array(
        'categoria',
        'nombre',
        'descripcion',
        'municipio_id',
        'direccion',
        'registro_iva',
        'constitucion',
        'clasificacion',
        'sector_economico',
        'actividad',
        'nit'
    );

    /* Validaciones */

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
                    'tabla' => 9,
                    'tabla_id' => $id,
                    'accion' => $accion
                );

                $bitacora->guardar($campos);
                return true;
            }

            return false;
        }

    /* FIn Validaciones */


    /* Atributos personalizados */

    public function getPasoRealAttribute(){

        if($this->proyectos != '[]')
            return 5;
        elseif($this->indicador)
            return 4;
        elseif($this->empresarios != '[]')
            return 3;

        return 2;
    }

    /* Fin atributos personalizados */
        public function validar($datos)
        {
            $rules = array(
                'categoria' => 'required',
                'nombre' => 'required',
                'municipio_id' => 'required',
                'direccion' => 'required',
                'clasificacion' => 'required'
            );

            $validator = Validator::make($datos,$rules);

            if($validator->passes())
                return true;

            $this->errores = $validator->errors();
            return false;
        }

        public function getRepresentanteAttribute(){
            return $this->empresarios()
                        ->where('tipo', '=', 'Propietario')
                        ->first();
        }

	/* Relaciones */

        public function atenciones()
        {
            return $this->hasMany('Atencion','empresa_id');
        }

        public function atTerminos()
        {
            return $this->hasMany('AtTermino','empresa_id');
        }

        public function empresarios()
        {
            return $this->hasMany('EmpresaEmpresario','empresa_id');
        }

        public function municipio()
        {
            return $this->belongsTo('Municipio');
        }

        public function indicador(){
            return $this->hasOne('indicador', 'empresa_id');
        }

        public function proyectos(){
            return $this->hasMany('proyecto', 'empresa_id');
        }

}
