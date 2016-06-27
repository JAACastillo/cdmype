<?php
class AtContrato extends Eloquent {

    protected $table = 'atcontratos';
    protected $softDelete = true;
    protected $fillable = array(
            'duracion',
            'fecha_inicio',
            'fecha_final',
            'pago',
            'aporte',
            //'num_bancario',
            'lugar_firma',
            'attermino_id'
    );

       /* Guardar */

        public function guardar($datos,$accion)
        {
            $date = strtotime($datos['fecha_inicio']);
            $datos['fecha_inicio'] = date('Y-m-d', $date);

            $date = strtotime($datos['fecha_final']);
            $datos['fecha_final'] = date('Y-m-d', $date);

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


        //atributos

        public function getInicioAttribute(){

            $date = strtotime($this->fecha_inicio);
           return date('d/m/Y', $date);
        }
        public function getFinalAttribute(){

            $date = strtotime($this->fecha_final);
           return date('d/m/Y', $date);
        }


        public function getPagoCdmypeAttribute(){
            if($this->aporte)
                return ($this->pago * ($this->aporte) / 100);
            return $this->pago;
        }

        public function getPagoEmpresarioAttribute(){
            return $this->pago - $this->getPagoCdmypeAttribute();
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
                'attermino_id' => 'required'
            );

            $validador = Validator::make($datos,$reglas);

            if($validador->passes())
                return true;

            $this->errores = $validador->errors();

            return false;
        }


        public function getVencidaAttribute(){
            $hoy = strtotime(date("d-m-Y", time()));
            $vencimiento = strtotime( $this->attributes['fecha_final']);
            return ($hoy > $vencimiento);
        }

	/* RELACIÓN */

        public function terminos()
        {
            return $this->belongsTo('AtTermino','attermino_id');
        }
        public function ampliacion(){
            return $this->hasOne('AmpliacionContrato', 'attermino_id');
        }


}
