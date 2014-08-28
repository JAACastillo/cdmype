<?php
class proyectoIndicador extends Eloquent {
    
    protected $table = 'proyectoindicadores';    
    public $errores;
    protected $perPage = 10;
    protected $softDelete = true;
    protected $fillable = array(
        'nombre',
        'tipo'
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
                'nombre'      => 'required',
                'tipo' => 'required'
            );
            
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes())
                return true;

            $this->errores = $validador->errors();
            return false;
        }
        

    public function proyecto(){
        return $this->belongsTo('proyecto', 'proyecto_id');
    }



    //atributos personalizados

    public function getInputAttribute(){
        if($this->tipo == 'Boolean')
            return "<input type='checkbox' name='detalles'>";
        elseif($this->tipo == 'Dinero')
            return "<input type='number' step='any' name='detalles'>";
        elseif($this->tipo == 'Numero')
            return "<input type='number' name='detalles'>";
        elseif($this->tipo == 'text')
            return "<input type='text' name='detalles'>";

        return "<input type='text' name='detalles'>";
    }


}