<?php

class DashboardController extends BaseController {

    // dashboard

    public function dashboard(){




      $userID = 3; // Auth::user()->id;

        $ultimosAt = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('estado', 'contratada')
                                ->orderBy('fecha', 'asc')->get();
        $atFinalizadas = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('estado', 'finalizada')
                                ->orderBy('fecha', 'asc')->get();
        $AtFinalizar = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('estado', '!=', "contratada")
                                ->where('estado', '!=', "finalizada")
                                ->orderBy('fecha', 'desc')->take(4)->get();
         $materiales = asesorias::where('creador', '=', $userID)->count();
         $proyectos = proyecto::where('asesor', '=', $userID)->count();

         $today = date('Y-m-d');


        $eventos = Evento::where('fecha', '>=', $today)
                           ->get()
                           ->toArray(); //orderBy('fecha', 'desc')->take(10)->get();
        $capacitaciones = CapTermino::where('fecha', '>=', $today)
                                       ->get();
                                       //->toArray();



         foreach ($capacitaciones as $capacitacion) {
            # code...
            $eventos[] = array(
               'id' => $capacitacion->id,
               'fecha' => $capacitacion->fecha,
               'tipo'  => 'capacitacion',
               'nombre'=> $capacitacion->tema,
               'lugar' => $capacitacion->lugar
            );
         }
        // array_intersect($eventos, $capacitaciones);

         usort($eventos, function ($a, $b){
            $v1 = strtotime($a['fecha']);
            $v2 = strtotime($b['fecha']);
            return ($v1 > $v2);
         });

      // return Response::json($eventos);


        return View::make('dashboard.dashboard', compact('ultimosAt', 'AtFinalizar', 'atFinalizadas','materiales', 'proyectos', 'eventos'));
    }

}
