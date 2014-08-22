 <?php

class EmpresaController extends BaseController {


	public function index()
	{
        $empresas = Empresa::orderBy('nombre','asc')
            ->paginate();
        
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

        $Categoria = array(1 => 'Empresa', 2 => 'Grupo');
        $Constitucion = array( 1 => 'Informal Natural', 2 => 'Formal Natural', 3 => 'Formal Jurídica' );
        $Clasificacion = array( 1 => 'Emprendedor', 2 => 'Micro-empresa', 3 => 'Micro-empresa de Subsistencia', 4 => 'Grupo Asociativo Empresas',
            5 => 'No definido');

        $Sector = array( 1 => 'Artesanias', 2 => 'Agroindustrias Alimentaria', 3 => 'Calzado', 4 => 'Comercio', 5 => 'Construcción',
            6 => 'Química Farmaceutica', 7 => 'Tecnología de Información y Comunicación', 8 => 'Textiles y Confección', 9 => 'Turismo',
            10 => 'Otros' );

        $departamentos = Departamento::all()->lists('departamento', 'id');
        $municipios = Municipio::all()->lists('municipio', 'id');
        
        $empresa->categoria = array_search($empresa->categoria,$Categoria);
        $empresa->constitucion = array_search($empresa->constitucion,$Constitucion);
        $empresa->clasificacion = array_search($empresa->clasificacion,$Clasificacion);
        $empresa->sector_economico = array_search($empresa->sector_economico,$Sector);
        $empresa->municipio = array_search($empresa->municipio_id, $municipios);

        $accion = array('route' => array('actualizarEmpresa', $id), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

            return View::make('clientes.empresas.creacion-paso-1', compact('empresa', 'accion', 
                'departamentos','municipios','id','pasoActual','pasoReal'));
    }

    public function actualizarEmpresa($id)
    {
        $empresa = Empresa::find($id);
        
        if(is_null($empresa)) 
            App::abort(404);
        
        $data = Input::all();
        
        if($empresa->guardar($data,'2')) 
            return Redirect::route('empresas.index');
        
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
            return Redirect::route('empresas.index');
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

            $departamentos = Departamento::all()->lists('departamento', 'id');
            $municipios = Municipio::all()->lists('municipio', 'id');

            $accion = array('route' => 'guardarEmpresa', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form');

            return View::make('clientes.empresas.creacion-paso-1', compact('empresa', 'accion', 
                'departamentos','municipios','id','pasoActual','pasoReal'));
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
                $empresa = empresa::find($idEmpresa);
                $empresaEmpresario = $empresa->empresarios;
                $pasoReal = $empresa->pasoReal;
                $id =$idEmpresa;

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

            $empresario = Empresario::find($idEmpresario);
            if(!is_null($empresario))
            {   

                $empresaEmpresario = new EmpresaEmpresario;
                $datos = Input::all();
                
                if($empresaEmpresario->guardar($datos,'1')) 
                    return Redirect::back();
                
                else 
                    return Redirect::back()->withInput()->withErrors($empresaEmpresario->errores);

            }
            
            return Redirect::back()->withInput()->withErrors(['no-existe' => 'El Empresario no ha sido encontrado']);

        }


/* indicadores */
        public function indicadores($id){

            $empresa = empresa::with('indicador')
                                ->find($id);

            if($empresa->indicador)
                return Redirect::route('empresaPasoIndicadorE', $id);            

            $mercados = array('Local', 'Regional', 'Nacional', 'Internacional');
            $indicador = new indicador;
            $pasoReal = 3;
            $pasoActual = $empresa->pasoReal;
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
                    $product = new productos;
                    $product->nombre = $producto;
                    $product->indicador_id = $indicador->id;
                    $product->save();
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
            $empresa = empresa::with('indicador')
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
            $indicador->empleadosHombreFijo = 2;
            $imprimir = 'si';
            return View::make('clientes.empresas/creacion-paso-indicadores', 
                        compact('id', 'pasoReal', 'pasoActual', 'indicador', 'accion', 'mercados', 'imprimir'));
        }

        public function indicadorEditar(){


             $data = Input::all();


             $empresa = empresa::with('indicador')
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

                return Redirect::route('empresaPasoIndicador', $indicador->empresa_id);
            }

            return Redirect::back()
                            ->withInput()
                            ->withErrors($indicador->errores);
        }


        public function f1($idEmpresa){

            $empresa = empresa::find($idEmpresa);

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
         $empresa = empresa::with('proyectos')
                                ->find($id);

            // if($empresa->proyectos)
            //     return Redirect::route('empresaPasoIndicadorE', $id);            

           // $mercados = array('Local', 'Regional', 'Nacional', 'Internacional');


        //$mercados = array('Formalización', '');

            $indicadores = proyectoIndicador::all()->lists('nombre', 'id');
            $proyecto = new proyecto;
            $pasoReal = 4;
            $pasoActual = $empresa->pasoReal;
            $accion = array('route' => 'empresaPasoProyectoGuardar', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form', 'id' => 'validar');
            $proyecto->empresa_id = $id;
            return View::make('clientes.empresas/creacion-paso-proyecto', 
                        compact('id', 'pasoReal', 'pasoActual', 'proyecto', 'accion', 'indicadores'));
     
    }


    public function proyectoGuardar(){
        $data = Input::only('empresa_id', 'nombre', 'descripcion', 'meta', 'fechaInicio', 'fechaFin');

        $proyecto = new proyecto;

        //return Input::get('activities');

        //return $data;
        if($proyecto->guardar($data,1)){
            $actividades = Input::get('activities');
            $encargado = Input::get('encargado');
            $fecha = Input::get('fecha');
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
                $indicadores = Input::get('indicadores');  
                foreach ($indicadores as $indicador) {
                    $indicator = new indicadoresProyecto;
                    $indicator->proyecto_id = $proyecto->id;
                    $indicator->indicadorproyecto_id = $indicador;
                    $indicator->save();
                }
            } 
        }

        //return $proyecto->errores;
        return Redirect::route('empresaPasoProyecto', $data['empresa_id'])
                        ->withInput()
                        ->withErrors($proyecto->errores);
    }



/* Fin paso proyecto */

    //Termino
        public function termino($idEmpresa)
        {

            $pasoActual = 3;
            $pasoReal = $empresa->pasoReal;
            $id =$idEmpresa;

            return View::make('clientes.empresas.creacion-paso-3', compact('idEmpresa','id','pasoActual','pasoReal'));

        }

}