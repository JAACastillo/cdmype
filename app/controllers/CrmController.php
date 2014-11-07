<?php

class CrmController extends BaseController {

   public function crm($id)
   {
      $userId = 9;//Auth::user()->id;

      $anotacion = new Anotacion;
      $anotaciones = Anotacion::where('empresa_id', '=', $id)->get();
      $empresa = Empresa::with('empresarios', 'empresarios.empresarios', 'empresarios.empresarios.municipio', 'empresarios.empresarios.eventos', 'proyectos', 'proyectos.encargado', 'at' )
                        ->find($id);
      $empresarios = $empresa->empresarios;//->first();
      //$empresarios = $idempresario->empresarios;//Empresario::find($idempresario->empresario_id);
      $empresario = $empresarios[0]->empresarios;
      // return $empresario;

      $eventos = [];
      $capacitaciones = [];
      foreach ($empresarios as $cliente) {
         foreach ($cliente->empresarios->eventos as $evento) {
            $eventos[] = $evento->evento;
         }
         foreach ($cliente->empresarios->asistencias as $asistenciaCapacitacion) {
            $capacitacion = $asistenciaCapacitacion->captermino;
            $capacitacion['asistio'] = $asistenciaCapacitacion->asistio;
            $capacitaciones[] = $capacitacion;
         }
      }

      // return $capacitaciones;
// 
      $proyectos = $empresa->proyectos;//proyecto::with('encargado')
                     //      ->where('empresa_id', $id)->get();
                           // ->where('empresa_id', '=', $id)

      $at = $empresa->at;

      // $capacitaciones = $empresario->asistencias()->first()->captermino;
                                 //CapTermino::where('usuario_id', '=', $userId)->get();

      // return $capacitaciones;



      return View::make('clientes.crm.crm', compact('empresa', 'empresario', 'proyectos', 'anotacion', 'anotaciones', 'at', 'eventos', 'capacitaciones'));
   }


   public function anotaciones(){

      $datos = Input::all();
      $datos['usuario_id'] = Auth::user()->id;
      $anotacion = new Anotacion;
      if($anotacion->guardar($datos, 1))
         return Redirect::back();
      return Redirect::back()->withInput()->withErrors($anotacion->errores);
   }

}
