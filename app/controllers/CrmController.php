<?php

class CrmController extends BaseController {

   public function crm($id)
   {
      $userId = 9;//Auth::user()->id;

      $anotacion = new Anotacion;
      $anotaciones = Anotacion::where('empresa_id', '=', $id)->get();
      $empresa = Empresa::with('empresarios', 'empresarios.empresarios', 'empresarios.empresarios.municipio' )
                        ->find($id);
      $idempresario = $empresa->empresarios;//->first();
      $empresario = $idempresario[0]->empresarios;//Empresario::find($idempresario->empresario_id);

      // return $empresario;
      $proyectos = proyecto::with('encargado')
                           ->where('empresa_id', $id)->get();
                           // ->where('empresa_id', '=', $id)

      // $capacitaciones = $empresario->asistencias()->first()->captermino;
                                 //CapTermino::where('usuario_id', '=', $userId)->get();

      // return $capacitaciones;



      return View::make('clientes.crm.crm', compact('empresa', 'empresario', 'proyectos', 'anotacion', 'anotaciones'));
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
