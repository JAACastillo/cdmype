 <?php

class EmpresaController extends BaseController {


	public function index()
	{
        $empresas = Empresa::orderBy('nombre','asc')
            ->paginate(1000000000);
        
        $empresario = Empresario::All()->count();
        
        return View::make('clientes.empresas.lista', compact('empresas'));
	}

    public function verEmpresa($id)
    {
        $empresa = Empresa::find($id);
        
        if(is_null($empresa)) 
            App::abort(404);

        return View::make('clientes.empresas.ver')
            ->with('empresa',$empresa);
    }

    public function editarEmpresa($id)
    {
        $empresa = Empresa::find($id);
        
        //Pasos
            $pasoActual = 1;
            $empresaEmpresario = EmpresaEmpresario::where('empresa_id','=', $id)->get();
           
            $pasoReal = $empresa->pasoReal;
           // $id =$id;

        $Categoria = array('' => 'Seleccione una opción','1' => 'Empresa','2' => 'Grupo','3' => 'Individual','4' => 'Emprendedor', '5' => 'Cooperativa');
        $constitucion = array('' => 'Seleccione una opción', 1 => 'Persona Natural', 2 => 'Persona Juridica', 3 => 'Gpo de empresas', 4 => 'Gpo de Emprendedores', 5 => 'UDP', 6 => 'Informal Natural' );
        $Clasificacion = array( 
        						1 => 'Emprendedor', 
        						2 => 'Micro-empresa', 
        						3 => 'Subsistencia', 
        						4 => 'Grupo Asociativo Empresas',
            					5 => 'Pequeña Empresa');

        $Sector = array( 1 => 'Artesanias', 2 => 'Agroindustrias Alimentaria', 3 => 'Calzado', 4 => 'Comercio', 5 => 'Construcción',
            6 => 'Química Farmaceutica', 7 => 'Tecnología de Información y Comunicación', 8 => 'Textiles y Confección', 9 => 'Turismo',
            10 => 'Otros' );

        $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
        $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');  
        
        $empresa->categoria = array_search($empresa->categoria,$Categoria);
        $empresa->constitucion = array_search($empresa->constitucion,$constitucion);
        $empresa->clasificacion = array_search($empresa->clasificacion,$Clasificacion);
        $empresa->sector_economico = array_search($empresa->sector_economico,$Sector);
        $empresa->departamento = $empresa->municipio->departamento_id;
        $empresa->municipio = array_search($empresa->municipio_id, $municipios);

        $accion = array('route' => array('actualizarEmpresa', $id), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

            return View::make('clientes.empresas.creacion-paso-1', compact('empresa', 'accion', 
                'departamentos','municipios','id','pasoActual','pasoReal', 'constitucion', 'Clasificacion', 'Categoria'));
    }

    public function actualizarEmpresa($id)
    {
        $empresa = Empresa::find($id);
        
        if(is_null($empresa)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($empresa->guardar($data,'2')) 
            return Redirect::route('pasoEmpresarios', $empresa->id);
        
        else 
            return Redirect::back()->withInput()->withErrors($empresa->errores);
    }

    public function eliminarEmpresa($id)
    {
        $empresa = Empresa::find($id);
        
        if (is_null($empresa))
        {
            App::abort(404);
        }
            $empresa->delete();
            $bitacora = new Bitacora;            
            $campos = array(
                'usuario_id' => Auth::user()->id,
                'tabla' => 5,
                'tabla_id' => $id,
                'accion' => 3
            );
            $bitacora->guardar($campos);
            return Redirect::route('empresas');
    }

// Pasos.

    //Empresa
        public function crearEmpresa()
        {
            //Pasos
            $pasoActual = 1;
            $pasoReal = 1;
            $id =0;
            
            $empresa = new Empresa;
	 		$Categoria = array('' => 'Seleccione una opción','1' => 'Empresa','2' => 'Grupo','3' => 'Individual','4' => 'Emprendedor', '5' => 'Cooperativa');
	        $constitucion = array('' => 'Seleccione una opción', 1 => 'Persona Natural', 2 => 'Persona Juridica', 3 => 'Gpo de empresas', 4 => 'Gpo de Emprendedores', 5 => 'UDP', 6 => 'Informal Natural' );
	        $Clasificacion = array( 
	        						1 => 'Emprendedor', 
	        						2 => 'Micro-empresa', 
	        						3 => 'Subsistencia', 
	        						4 => 'Grupo Asociativo Empresas',
	            					5 => 'Pequeña Empresa');

            $departamentos = array('' => 'Seleccione una opción') + Departamento::all()->lists('departamento', 'id');
            $municipios = array('' => 'Seleccione una opción') + Municipio::all()->lists('municipio', 'id');  

            $accion = array('route' => 'guardarEmpresa', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

            return View::make('clientes.empresas.creacion-paso-1', compact('empresa', 'accion', 
                'departamentos','municipios','id','pasoActual','pasoReal', 'Categoria', 'constitucion', 'Clasificacion'));
        }

        public function guardarEmpresa()
        {

            $empresa = new Empresa;
            $datos = Input::all(); 

            if($empresa->guardar($datos,'1'))
            {
                return  Redirect::route('pasoEmpresarios', $empresa->id);
            }
            else
            { 
                 return Redirect::back()->withInput()->withErrors($empresa->errores);
            }

        }

    //Empresa-Empresario
        public function empresario( $idEmpresa)
        {
            $empresaEmpresario = new EmpresaEmpresario;

            //Pasos
                $pasoActual = 2;
               // $empresaEmpresario = EmpresaEmpresario::where('empresa_id','=', $idEmpresa)->get();
                $empresa = Empresa::find($idEmpresa);
                $empresaEmpresario = $empresa->empresarios;
                $pasoReal = $empresa->pasoReal;
                $id =$idEmpresa;
            $tipo = EmpresaEmpresario::where('empresa_id', '=', $idEmpresa)->get();
            if ($tipo == "[]") {
                $empresaEmpresario->tipos = array('' => 'Seleccione una opción','3' => 'Propietario','4' => 'Propietaria');
            }
            else{
                $empresaEmpresario->tipos = array('' => 'Seleccione una opción','1' => 'Empresario','2' => 'Empresaria','3' => 'Propietario','4' => 'Propietaria','5' => 'Representante');
            }
            $empresaEmpresario->empresa_id = $idEmpresa;

            return View::make('clientes.empresas.creacion-paso-2', compact('empresaEmpresario','id','pasoActual','pasoReal'));
        }


        public function empresarioNuevo($idEmpresa){

            $empresario = new Empresario;
            $datos = Input::all(); 

            if($empresario->guardar($datos,'1'))
            {
                $empresarioEmpresa = new EmpresaEmpresario;
                $empresarioEmpresa->tipo = 3;
                $empresarioEmpresa->empresario_id = $empresario->id;
                $empresarioEmpresa->empresa_id = $idEmpresa;

                $empresarioEmpresa->save();

                return  Redirect::route('pasoEmpresarios',$idEmpresa);
            }
            else
            { 
                 return Redirect::back()->withInput()->withErrors($empresario->errores);
            }
        }

        public function empresarioGuardar()
        {
            $idEmpresario = Input::get('empresario_id');
            $idEmpresa = Input::get('empresa_id');
            $tipo = Input::get('tipo');
            $empresario = Empresario::find($idEmpresario);
            $empresarioExiste = EmpresaEmpresario::where('empresario_id', '=', $idEmpresario)->where('empresa_id', '=', $idEmpresa)->get();
            $propietario = EmpresaEmpresario::whereRaw('empresa_id = ? and tipo = ? or Tipo = ?', array($idEmpresa,'Propietario', 'Propietaria'))->get();
            
            if(!is_null($empresario)){
                if ($empresarioExiste == "[]") {
                    if (($tipo == 3) || ($tipo == 4)) {
                        if (($propietario == "[]")) {
                                $empresaEmpresario = new EmpresaEmpresario;
                                $datos = Input::all();
                                if($empresaEmpresario->guardar($datos,'1')) 
                                    return Redirect::back();
                                
                                else 
                                    return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);                        
                        }
                        return Redirect::back()->withInput()->withErrors(['no-existe' => 'La empresa ya tiene asignado un propietario o Propietaria.']);
                    }
                    else{
                        $empresaEmpresario = new EmpresaEmpresario;
                        $datos = Input::all();
                        if($empresaEmpresario->guardar($datos,'1')) 
                            return Redirect::back();
                        
                        else 
                            return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);
                    }
                    
                }
                return Redirect::back()->withInput()->withErrors(['no-existe' => 'El Empresario ya existe']);
            }
            return Redirect::back()->withInput()->withErrors(['no-existe' => 'El Empresario no ha sido encontrado']);
        }


/* indicadores */
        public function indicadores($id){

            $empresa = Empresa::with('indicador')
                                ->find($id);

            if($empresa->indicador)
                return Redirect::route('empresaPasoIndicadorE', $id);            

            $mercados = array('Local', 'Regional', 'Nacional', 'Internacional');
            $indicador = new indicador;
            $indicador->fechaInicio = date('Y-m-d');
            $pasoActual = 3;
            $pasoReal = $empresa->pasoReal;
            $accion = array('route' => 'empresaPasoIndicadores', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form', 'id' => 'validar');
            $indicador->empresa_id = $id;
            return View::make('clientes.empresas/creacion-paso-indicadores', 
                        compact('id', 'pasoReal', 'pasoActual', 'indicador', 'accion', 'mercados'));
        }


        public function indicadoresGuardar($id){

            $data = Input::all();

            $indicador = new indicador;

            if($indicador->guardar($data, 1)){

                $productos = $data['productos'];

                foreach ($productos as $producto) {
                     if(! empty($producto)){ 
                        $product = new productos;
                        $product->nombre = $producto;
                        $product->indicador_id = $indicador->id;
                        $product->save();
                    }
                }

                $mercados = $data['mercados'];

                foreach ($mercados as $mercado) {
                    $mercadoActual = new mercadosActuales;
                    $mercadoActual->indicador_id = $indicador->id;
                    $mercadoActual->mercados = $mercado + 1;

                    $mercadoActual->save();
                }

                return Redirect::route('empresaPasoIndicadorE', $indicador->empresa_id);
            }

            return Redirect::back()
                            ->withInput()
                            ->withErrors($indicador->errores);

        }

        public function indicador($id){
            $empresa = Empresa::with('indicador')
                                ->find($id);

            //$indicador = new indicador;
            $indicador = $empresa->indicador;
            $mercados = array('Local' => 0, 'Regional' => 1, 'Nacional' => 2, 'Internacional' => 3);
            $data = array();
            //return $indicador->mercados;
            foreach ($indicador->mercados as $mercado) 
            {
                $data[] = $mercados[$mercado->mercados];
            }

           // return $datos;
            $indicador->merca = $data;
            $pasoReal = $empresa->pasoReal;
            $pasoActual = 3;

            $mercados = array('Local', 'Regional', 'Nacional', 'Internacional');


            $accion = array('route' => array('empresaPasoIndicador', $id), 'method' => 'PATCH', 'class' => 'form-horizontal','role' => 'form', 'id' => 'validar');
            $indicador->empresa_id = $id;
            $imprimir = 'si';
            return View::make('clientes.empresas/creacion-paso-indicadores', 
                        compact('id', 'pasoReal', 'pasoActual', 'indicador', 'accion', 'mercados', 'imprimir'));
        }

        public function indicadorEditar(){


             $data = Input::all();


             $empresa = Empresa::with('indicador')
                                ->find($data['empresa_id']);

            $indicador = $empresa->indicador;
            if(!isset($data['contabilidadFormal']))
                $data['contabilidadFormal'] = 0;

           // return $data['contabilidadFormal'];

            if($indicador->guardar($data, 1)){
                $productos = $data['productos'];
                $indicador->productos()->delete();
                foreach ($productos as $producto) {
                    if(! empty($producto)){ 
                        $product = new productos;
                        $product->nombre = $producto;
                        $product->indicador_id = $indicador->id;
                        $product->save();
                    }
                }

                $markets = array('Local' => 0, 'Regional' => 1, 'Nacional' => 2, 'Internacional' => 3);
                $mercados = $data['mercados'];
               
                $indicador->mercados()->delete(); //eliminar todos los mercados
               
                foreach ($mercados as $mercado) {
                        $mercadoActual = new mercadosActuales;
                        $mercadoActual->indicador_id = $indicador->id;
                        $mercadoActual->mercados = $mercado + 1;

                        $mercadoActual->save();
                }

                return Redirect::route('empresaProyectos', $indicador->empresa_id);
            }

            return Redirect::back()
                            ->withInput()
                            ->withErrors($indicador->errores);
        }


        public function f1($idEmpresa){

            $empresa = Empresa::find($idEmpresa);

            //return $empresa;
            $indicador = $empresa->indicador;
            $empresario = $empresa->representante->empresarios;

            $mercados =  array();
            foreach ($indicador->mercados as $mercado) {
                $mercados[] = $mercado->mercados;
            }
           // return $empresario;
            //return $empresario;
            $pdf = App::make('dompdf');
            //$pdf->loadHTML('<h1>Test</h1>');
            $pdf->loadView('pdf.f1', 
                    compact('empresa', 'empresario', 'indicador', 'mercados'));
            return $pdf->stream();
        }

/* fin indicadores */



/* Paso proyecto */

    public function proyecto($id){
         $empresa = Empresa::with('proyectos')
                                ->find($id);

            $indicadores = proyectoIndicador::all()->lists('nombre', 'id');
            $proyecto = new proyecto;
            $proyecto->fechaInicio = date('Y-m-d');
            $proyecto->fechaFin = date('Y-m-d');
            $pasoReal = $empresa->pasoReal;
            $pasoActual = 4;
            $accion = array('route' => 'empresaPasoProyectoGuardar', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form', 'id' => 'validar');
            $proyecto->empresa_id = $id;
            return View::make('clientes.empresas/creacion-paso-proyecto', 
                        compact('id', 'pasoReal', 'pasoActual', 'proyecto', 'accion', 'indicadores'));
     
    }


    public function proyectoGuardar(){
        // return Input::get('activities');
        $data = Input::only('empresa_id', 'nombre', 'descripcion', 'meta', 'fechaInicio', 'fechaFin');
        $data['asesor'] = Auth::user()->id;

        $proyecto = new proyecto;

        if($proyecto->guardar($data,1)){
           return $this->saveProyecto($proyecto);
        }
        return Redirect::route('empresaPasoProyecto', $data['empresa_id'])
                        ->withInput()
                        ->withErrors($proyecto->errores);
    }

    public function proyectoEditar($id){
        $proyecto = proyecto::find($id);
        $indicadores = proyectoIndicador::all()->lists('nombre', 'id');
        $empresa = $proyecto->empresa; 
        $indicadoresDelProyecto = $proyecto->indicadores;

        $indicator = array();

        foreach ($indicadoresDelProyecto as $indicador) {
            $indicator[] = $indicador->indicadorproyecto_id;
        }
        $proyecto->indicator = $indicator;
        $pasoActual = 4;
        $pasoReal = $empresa->pasoReal;
        $id = $empresa->id;   
        $accion = array( 'method' => 'PATCH', 'class' => 'form-horizontal','role' => 'form', 'id' => 'validar');
        $proyecto->empresa_id = $id;
        return View::make('clientes.empresas/creacion-paso-proyecto', 
                    compact('id', 'pasoReal', 'pasoActual', 'proyecto', 'accion', 'indicadores'));
    }


    public function proyectoUpdate($id){
        //return Input::get('activities');
        $proyecto = proyecto::find($id);

        if($proyecto->asesor == Auth::user()->id) {    
                $data = Input::only('empresa_id', 'nombre', 'descripcion', 'meta', 'fechaInicio', 'fechaFin');
                $data['asesor'] = $proyecto->asesor;
                if($proyecto->guardar($data,1)){
                    $proyecto->indicadores()->delete();
                    $proyecto->actividades()->delete();
                   return $this->saveProyecto($proyecto);
                }
        }
        else{
            $proyecto->errores = array(
                                        'Permisos'      => 'No tienes permisos para editar este proyecto',
                                        'Recordatorio'  => 'Recuerda que el proyecto solo puede ser editado por su asesor'
                                    );
            return Redirect::back()
                        ->withErrors($proyecto->errores);
        }
        return Redirect::back()
                        ->withInput()
                        ->withErrors($proyecto->errores);
    }


    private function saveProyecto($proyecto){ //guarda las actividades y los indicadores del proyecto;
        $actividades = Input::get('activities');
        $encargado = Input::get('encargado');
        $fecha = Input::get('fecha');
        $indicadores = Input::get('indicadores');  


        if($actividades != []){
            $posicion = 0;
            foreach ($actividades as $actidad) {
                if(!empty($actidad)){
                    $activity = new actividadesProyecto;
                    $activity->nombre = $actidad;
                    $activity->encargado = $encargado[$posicion];
                    $activity->fecha = $fecha[$posicion];
                    $activity->proyecto_id = $proyecto->id;


                    $activity->save();
                } 
                $posicion++;
            } 
        }
//Agregando la meta para cada una de los indicadores
        $metas = explode("\r\n", $proyecto->meta);
        $posicionMeta = 0; 

        if($indicadores != []){
            foreach ($indicadores as $indicador) {
                $indicator = new indicadoresProyecto;
                $indicator->proyecto_id = $proyecto->id;
                $indicator->indicadorproyecto_id = $indicador;
                try {
                    
                $indicator->meta = $metas[$posicionMeta];
                } catch (Exception $e) {
                    
                }
                $indicator->save();
                $posicionMeta++;
            }
        }

        return Redirect::route('empresaPasoProyectoEditar', $proyecto->id);
    }

    public function proyectos($id){
        $empresa = Empresa::with('proyectos.indicadores','proyectos.indicadores.definicion' ,'proyectos.actividades', 'proyectos.encargado')
                    ->find($id);
        $proyectos = $empresa->proyectos;
        $pasoReal = $empresa->pasoReal;
        $pasoActual = 4;
        return View::make('clientes.empresarios.lista-proyectos', 
                        compact('id', 'pasoReal', 'pasoActual', 'proyectos'));
     
    }

    public function f2($idProyecto){
            $proyecto = proyecto::find($idProyecto);
            $actividades = $proyecto->actividades;
            $empresa = $proyecto->empresa;
            $empresario = $empresa->representante->empresarios;
            $pdf = App::make('dompdf');
            //$pdf->loadHTML('<h1>Test</h1>');
            $pdf->loadView('pdf.f2', 
                    compact('empresa', 'empresario','proyecto' ,'actividades', 'mercados'));
            return $pdf->stream();
    }

    public function seguimientoProyecto($idProyecto){
        $proyecto = proyecto::with('indicadores.definicion', 'actividades', 'empresa')
                            ->find($idProyecto);
        $empresa = $proyecto->empresa;

        $pasoReal = $empresa->pasoReal;
        $pasoActual = 4;
        $id = $empresa->id;
        return View::make('clientes.empresas.seguimientoProyecto', 
                        compact('id', 'pasoReal', 'pasoActual', 'proyecto'));
    }


    public function seguimientoProyectoGuardar($idProyecto){
        $proyecto = proyecto::with('actividades', 'empresa', 'indicadores')
                            ->find($idProyecto);
        //$input = array();

        if($proyecto->asesor == Auth::user()->id) {  
            foreach ($proyecto->actividades as $actividad) {
                $input = Input::get("actividad" . $actividad->id);
                $actividad->completo = (is_null($input))?'0':'1';
                $actividad->save();
            }
            foreach ($proyecto->indicadores as $indicador) {
                $input = Input::get("indicador" . $indicador->id);
                $indicador->detalles = (is_null($input))?'':$input;
                $indicador->save();            
            }
        }
        return Redirect::back();

    }
/* Fin paso proyecto */

    //Termino
        public function termino($idEmpresa)
        {
            $empresa = Empresa::find($idEmpresa);
            $pasoActual = 5;
            $pasoReal = $empresa->pasoReal;
            $id =$idEmpresa;

            return View::make('clientes.empresas.creacion-paso-3', compact('idEmpresa','id','pasoActual','pasoReal'));

        }

}