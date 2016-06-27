<?php

class DashboardController extends BaseController {

    // dashboard

    public function dashboard(){

        $userID = Auth::user()->id;
        $today = date('Y-m-d');

        // Seciones Atrazadas
        $asesoria = Asesoria::where('estado', '=', 'Programada')
                                ->where('fecha_inicio', '<', $today)
                                ->orderBy('fecha_inicio', 'asc')->get();

        // $atFinalizadas = AtTermino::with('contrato', 'empresa')
        //                         ->where('usuario_id', '=', $userID)
        //                         ->where('estado', 'finalizada')
        //                         ->orderBy('fecha', 'asc')->get();

        // Ahora
        $ahora = AtTermino::with('contrato', 'empresa')
                                ->where('usuario_id', '=', $userID)
                                ->where('fecha','=',$today)
                                ->orderBy('fecha', 'asc')->get()->toArray();
        $as = Asesoria::where('fecha_inicio', $today)->where('user_id', '=', $userID)->orderBy('fecha_inicio', 'asc')->get();
        $re = Reunione::where('fecha_inicio', $today)->where('user_id', '=', $userID)->orderBy('fecha_inicio', 'asc')->get();
        foreach ($as as $ase) {
            $ahora[] = array(
                'id' => $ase->id,
                'informe'  => 'asesoria',
                'tema' => $ase->titulo,
                'fecha' => $ase->fecha_inicio
            );
        }
        foreach ($re as $reu) {
            $ahora[] = array(
                'id' => $reu->id,
                'informe'  => 'reunion',
                'tema' => $reu->titulo,
                'fecha' => $reu->fecha_inicio
            );
        }


        if ($userID == 9)
        {
            // Contratadas
            $ultimosAt = AtTermino::with('contrato', 'empresa')
                                    ->where('estado', 'contratada')
                                    ->orderBy('fecha', 'asc')->take(10)->get();
            // En Proceso
            $AtFinalizar = AtTermino::with('contrato', 'empresa')
                                    ->where('estado', '!=', "finalizada")
                                    ->orderBy('fecha', 'desc')->take(10)->get();
        }else{
            // Contratadas
            $ultimosAt = AtTermino::with('contrato', 'empresa')
                                    ->where('usuario_id', '=', $userID)
                                    ->where('estado', 'contratada')
                                    ->orderBy('fecha', 'asc')->take(10)->get();
            // En Proceso
            $AtFinalizar = AtTermino::with('contrato', 'empresa')
                                    ->where('usuario_id', '=', $userID)
                                    ->where('estado', '!=', "finalizada")
                                    ->orderBy('fecha', 'desc')->take(10)->get();
        }


        $materiales = asesorias::where('creador', '=', $userID)->count();
        $proyectos = proyecto::where('asesor', '=', $userID)->count();

        // Eventos

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


        return View::make('dashboard.dashboard', compact('ultimosAt', 'asesoria', 'AtFinalizar', 'ahora' ,'materiales', 'proyectos', 'eventos'));
    }

}
