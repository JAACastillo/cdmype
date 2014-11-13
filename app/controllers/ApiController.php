<?php

class ApiController extends BaseController {

 /* AUTOCOMPLEMENTAR */

    //EMPRESARIO
    public function getEmpresario()
    {
    		$term =  Input::get('term');

            $empresarios = Empresario::where('nombre', 'LIKE', "%" . $term . "%")
                ->get();

            $results[] = array();
            array_shift($results);
            foreach ($empresarios as $empresario)
            {
    		    $results[] = array('label' => $empresario->nombre, 'value' => $empresario->id);
    		}

           return Response::json( $results, 200, array('content-type' => 'application/json', 'Access-Control-Allow-Origin' => '*'));
    }

    //EMPRESA
    public function getEmpresa()
    {
		$term =  Input::get('term');

        $empresas = Empresa::where('nombre', 'LIKE', "%" . $term . "%")
            ->get();

        $results = array();
        foreach ($empresas as $empresa)
        {
		    $results[] = array('label' => $empresa->nombre, 'value' => $empresa->id);
		}

        return Response::json( $results, 200, array('content-type' => 'application/json', 'Access-Control-Allow-Origin' => '*'));
    }

    //EMPRESA
    public function getMunicipios($id)
    {
        if (!empty($id)) {
            $opciones = "<option value=''> Seleccione una opción</option>";
            $municipios = Municipio::where('departamento_id', '=', $id )->get();

            foreach ($municipios as $fila) {
               $opciones .= "<option value=' $fila->id '> $fila->municipio</option>";
            }


             return Response::make($opciones, 200,  array('content-type' => 'text/html', 'Access-Control-Allow-Origin' => '*')) ;//->header('Accces-Control-Allow-Origin: *');
         }

    }

    //BUSCAR

        public function postBuscar() {
            $nombre = Input::get('buscar');
            $tabla = Input::get('tabla');

            switch ($tabla) {
                case 'usuarios':
                    return Redirect::to('buscar/usuarios/'.$nombre);
                    break;
                case 'capacitaciones':
                    return Redirect::to('buscar/capacitaciones/'.$nombre);
                    break;
                case 'empresas':
                    return Redirect::to('buscar/empresas/'.$nombre);
                    break;
                case 'consultores':
                    return Redirect::to('buscar/consultores/'.$nombre);
                    break;
                case 'terminos':
                    return Redirect::to('buscar/atecnicas/'.$nombre);
                case 'material':
                    return Redirect::to('buscar/material/'.$nombre);
                    break;
                default:
                    return "There was an error";
                    break;
            }
        }

        public function getUsuarios($nombre) {
            $usuarios = User::where('nombre','LIKE',"%".$nombre."%")
                ->orderBy('nombre','asc')
                ->paginate();
            return View::make('usuarios.lista', compact('usuarios'));
        }

        public function getCapacitaciones($nombre) {
            $capterminos = CapTermino::where('tema','LIKE',"%".$nombre."%")
                ->orderBy('tema','asc')
                ->paginate();
            return View::make('capacitaciones.lista', compact('capterminos'));
        }

        public function getEmpresas($nombre) {
            $empresas = Empresa::where('nombre','LIKE',"%".$nombre."%")
                ->orderBy('nombre','asc')
                ->paginate();
            return View::make('clientes.empresas.lista', compact('empresas'));
        }

        public function getConsultores($nombre) {
            $consultores = Consultor::where('nombre','LIKE',"%".$nombre."%")
                ->orderBy('nombre','asc')
                ->paginate();
            return View::make('consultores.lista', compact('consultores'));
        }

        public function getATecnicas($nombre) {
            $atterminos = AtTermino::where('tema','LIKE',"%".$nombre."%")
                ->orderBy('tema','asc')
                ->paginate();
            return View::make('asistencia-tecnica.lista', compact('atterminos'));
        }

        public function getMaterial($nombre){
            $asesorias = asesorias::where('nombre','LIKE',"%".$nombre."%")
                ->orderBy('nombre','asc')
                ->paginate();
            return View::make('asesorias.lista', compact('asesorias'));
        }





//proyectos

        public function getProyectos($id){
            $proyectos = proyecto::where('empresa_id', $id)
                                 ->get(array('id', 'nombre as name'));

            return Response::json($proyectos, 200);
        }

        public function getActividades($id){
            $actividades = actividadesProyecto::where('proyecto_id', $id)
                                              ->get(array('id', 'nombre as name'));

            return Response::json($actividades, 200);
        }


}
