<?php
class CapTermino extends Eloquent {

    protected $table = 'capTerminos';
    public $errores;
    protected $perPage = 9;
    protected $fillable = array(
        'encabezado',
        'tema',
        'categoria',
        'descripcion',
        'obj_general',
        'obj_especifico',
        'productos',
        'lugar',
        'fecha',
        'fecha_lim',
        'hora_ini',
        'hora_fin',
        'nota',
        'estado',
        'especialidad_id',
        'usuario_id'
    );
    
    /* Guardar */

        public function guardar($datos,$accion)
        {
            $date = strtotime($datos['fecha']);
            $datos['fecha'] = date('Y-m-d', $date);

            $date = strtotime($datos['fecha_lim']);
            $datos['fecha_lim'] = date('Y-m-d', $date);

            if($this->validar($datos)) 
            {
                $this->fill($datos);
                $this->save();
                $id = $this->id;
                $bitacora = new Bitacora;
                
                $campos = array(
                    'usuario_id' => Auth::user()->id,
                    'tabla' => 20,
                    'tabla_id' => $id,
                    'accion' => $accion
                );
                
                $bitacora->guardar($campos);
                return true;
            }
            
            return false;
        }

    /* Validaciones */

        public function validar($datos) {

            $reglas = array(
                'encabezado' => 'max:500',
                'tema' => 'required|max:500',
                'categoria' => 'required',
                'descripcion' => 'required|max:3000',
                'obj_general' => 'required|max:500',
                'obj_especifico' => 'required|max:500',
                'productos' => 'required|max:3000',
                'lugar' => 'required|max:1000',
                'fecha' => 'required',
                'fecha_lim' => 'required',
                'hora_ini' => 'required',
                'hora_fin' => 'required',
                'nota' => 'max:3000',
                'especialidad_id' => 'required',
                'usuario_id' => 'required'
            );
        
            $validador = Validator::make($datos,$reglas);
            
            if($validador->passes()) 
                return true;
            
            $this->errores = $validador->errors();
            
            return false;
        }


        public function getOfertantesAttribute()
        {

            return $this->consultores()
                        ->where("doc_oferta", "!=", "")
                        ->get(); 

        }
        public function getConsultorSeleccionadoAttribute()
        {
            return $this->consultores()
                        ->where("estado", '=', 'Seleccionado')
                        ->orderby('updated_at', 'desc')
                        ->first();
        }

        public function getContratoAttribute()
        {
            return $this->contratos()
                        ->orderby('updated_at', 'desc')
                        ->first();
        }

        //Pasos
            public function getPasoRealAttribute(){
                switch ($this->estado) {
                    case 'Creado':                       
                        return 2;
                        break;
                    case 'Enviado':
                        return 4;
                        break;
                    case 'Ofertas Recibidas':
                        return 5;
                        break;
                    case 'Consultor Seleccionado':
                        return 7;
                        break;
                    case 'Contratada':
                        return 8;
                        break;
                    case 'Finalizada':
                        return 8;
                        break;
                    default:
                        # code...
                        break;
                }

            }

        public function getFechaaAttribute(){

            $date = strtotime($this->fecha);
           return date('d/m/Y', $date);
        }
        public function getFecha_limiteAttribute(){

            $date = strtotime($this->fecha_lim);
           return date('d/m/Y', $date);
        }

    
    /* Relaciones */

        public function usuario() 
        {
            return $this->belongsTo('User');
        }

        public function especialidad() 
        {
            return $this->belongsTo('SubEspecialidad');
        }

        public function consultores() 
        {
            return $this->hasMany('CapConsultor','captermino_id');
        }

        public function contratos(){
            return $this->hasOne('CapContrato', 'captermino_id');
        }

        public function asistencia(){
            return $this->hasOne('Asistencia', 'captermino_id');
        }


}