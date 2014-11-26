<?php

class DashboardController extends BaseController {

    // dashboard

    public function dashboard(){

        $userID = 1; // Auth::user()->id;
        $today = date('Y-m-d');

        $ultimosAt = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('estado', 'contratada')
                                ->orderBy('fecha', 'asc')->get();

        $asesoria = Asesoria::where('estado', '=', 'Programada')
                                ->where('fecha_inicio', '<', $today)
                                ->orderBy('fecha_inicio', 'asc')->get();

        $materiales = asesorias::where('creador', '=', $userID)->count();

        $proyectos = proyecto::where('asesor', '=', $userID)->count();

        // $atFinalizadas = AtTermino::with('contrato', 'empresa')
        //                         ->where('usuario_id', '=', $userID)
        //                         ->where('estado', 'finalizada')
        //                         ->orderBy('fecha', 'asc')->get();
        // $AtFinalizar = AtTermino::with('contrato', 'empresa')
        //                         ->where('usuario_id', '=', $userID)
        //                         ->where('estado', '!=', "contratada")
        //                         ->where('estado', '!=', "finalizada")
        //                         ->orderBy('fecha', 'desc')->take(4)->get();

        $ahora = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('fecha','=',$today)
                                ->orderBy('fecha', 'asc')->get()->toArray();

        $as = Asesoria::where('fecha_inicio', $today)->orderBy('fecha_inicio', 'asc')->get();

        foreach ($as as $ase) {
            $ahora[] = array(
                'id' => $ase->id,
                'informe'  => 'asesoria',
                'tema' => $ase->titulo,
                'fecha' => $ase->fecha_inicio
            );
        }

        $eventos = Evento::where('fecha', '>=', $today)
                           ->get()
                           ->toArray(); //orderBy('fecha', 'desc')->take(10)->get();
        $capacitaciones = CapTermino::where('fecha', '>=', $today)
                                       ->get();
                                       //->toArray();

        foreach ($capacitaciones as $capacitacion) {
            $eventos[] = array(
               'id' => $capacitacion->id,
               'fecha' => $capacitacion->fecha,
               'tipo'  => 'capacitacion',
               'nombre'=> $capacitacion->tema,
               'lugar' => $capacitacion->lugar
            );
        }

        usort($eventos, function ($a, $b){
            $v1 = strtotime($a['fecha']);
            $v2 = strtotime($b['fecha']);
            return ($v1 > $v2);
        });

      // return Response::json($eventos);


        return View::make('dashboard.dashboard', compact('ultimosAt', 'asesoria', 'ahora' ,'materiales', 'proyectos', 'eventos'));
    }

}
