<?php


class panelController extends BaseController {

	public function index(){

		$asesorias 		= Asesoria::where('estado', 'Completada')->get();
		$asesores = User::where('tipo', 'Asesor')->get();
		return View::make('panel.index', compact('asesores'));
	}


//estadisticas de los asesores, solicitados por AJAX con AngularJS
	public function estadisticasAsesor($id){
		$from = Input::get('from') - 21600; //restando 6 horas para que se 
		$to = Input::get('to') - 21600;     //ajuste a nuestro lufar en la tierra
	    $from = date("Y-m-d", $from);
	    $to = date("Y-m-d", $to);

	    // return $to;

	    
		$estadisticas = [];
		if($id == 0)
			$estadisticas = $this->asesores($from, $to);
		else 
			$estadisticas = $this->asesor($id, $from, $to);

		return Response::json($estadisticas, 200);
	}

	private function asesor($id, $from, $to){
		$asesor = User::find($id);
		$asesorias 		= Asesoria::where('estado', 'Completada')
								  ->where('user_id', $id)
								  ->whereBetween('fecha_inicio', array($from, $to))
								  ->get();
		$AT 			= AtTermino::where('usuario_id', $id)
									->whereBetween('fecha', array($from, $to))->get();
		$capacitaciones = CapTermino::where('usuario_id', $id)
									->whereBetween('fecha', array($from, $to))->get();


		$estadisticas = [
			'asesor' 		=> $asesor,
			'asesorias'		=> $asesorias,
			'asistencias'	=> $AT,
			'capacitaciones'=> $capacitaciones

		];

		return $estadisticas;
	}
	private function asesores($from, $to){
		$asesor = array(
			'nombre' => 'Todos los asesores'
		);

		$asesorias 		= Asesoria//::where('estado', 'Completada')
								  ::whereBetween('fecha_inicio', array($from, $to))
								  ->get();
		$AT 			= AtTermino::whereBetween('fecha', array($from, $to))->get();
		$capacitaciones = CapTermino::whereBetween('fecha', array($from, $to))->get();


		$estadisticas = [
			'asesor' 		=> $asesor,
			'asesorias'		=> $asesorias,
			'asistencias'	=> $AT,
			'capacitaciones'=> $capacitaciones

		];
		return $estadisticas;

	}

//fin estadisticas de los asesores, solicitados por AJAX con AngularJS


//jSON para las gráficas.

	public function grafica($id){
		$from = Input::get('from') - 21600; //restando 6 horas para que se 
		$to = Input::get('to') - 21600;     //ajuste a nuestro lufar en la tierra


		$monthFrom = date('m', $from);
		$monthTo = date('m', $to);
	    $from = date("Y-m-d", $from);
	    $to = date("Y-m-d", $to);




		$actividades = [];
		if ($id == 0)
			$actividades = $this->actividadesTodos($from, $to, $monthFrom, $monthTo);
		else 
			$actividades = $this->actividadesAsesor($id, $from, $to, $monthFrom, $monthTo);
		return Response::json($actividades, 200);
	}

	private function actividadesTodos($from, $to, $monthFrom, $monthTo){
		$asesorias = DB::select(DB::raw("SELECT count(*) as asesorias, month(created_at) as mes FROM asesoria  where fecha_inicio between '$from' and '$to' group by mes "));
		$ats = DB::select(DB::raw("SELECT count(*) as ats, month(fecha) as mes FROM atterminos where fecha between '$from' and '$to' group by mes "));
		$capacitaciones = DB::select(DB::raw("SELECT count(*) as capacitaciones, month(fecha) as mes FROM capterminos where fecha between '$from' and '$to' group by mes "));
		return $this->crearJson($asesorias, $ats, $capacitaciones, $monthFrom, $monthTo);
	}

	private function actividadesAsesor($id, $from, $to, $monthFrom, $monthTo){
		$asesorias = DB::select(DB::raw("SELECT count(*) as asesorias, month(fecha_inicio) as mes FROM asesoria where user_id = " . $id . " and fecha_inicio between '$from' and '$to' group by mes "));
		$ats = DB::select(DB::raw("SELECT count(*) as ats, month(fecha) as mes FROM atterminos where usuario_id = " . $id . " and fecha between '$from' and '$to' group by mes "));
		$capacitaciones = DB::select(DB::raw("SELECT count(*) as capacitaciones, month(fecha) as mes FROM capterminos  where usuario_id = " . $id . " and fecha between '$from' and '$to' group by mes "));
		return $this->crearJson($asesorias, $ats, $capacitaciones, $monthFrom, $monthTo);
	}

	private function crearJson($asesorias, $ats, $capacitaciones, $monthFrom, $monthTo){
		$actividades = [];
		$actividad = [];

		$meses = array('Ene.', 'Feb.', 'Mar.', 'Abril', 'Mayo', 'Jun.', 'Jul.','Agos.','Sept.', 'Oct.', 'Nov.', 'Dic.');
		$total = 0;

		for ($mes = $monthFrom; $mes <= $monthTo; $mes++) {
			$actividad[] = array('v' => $meses[$mes - 1]);
			foreach ($asesorias as $asesoria) {
				if($asesoria->mes == $mes){
					$total = $asesoria->asesorias;
				}
			}
			$actividad[] = array('v'=>$total);
			$total = 0;
			$actividad[] = array('v'=>0);
			// $total = 0;

			foreach ($capacitaciones as $capacitacion) {
				if($capacitacion->mes == $mes){
					$total = $capacitacion->capacitaciones;
				}
			}
			$actividad[] = array('v'=>$total);
			$total = 0;


			foreach ($ats as $at) {
				if($at->mes == $mes){
					$total = $at->ats;
				}
			}
			$actividad[] = array('v'=>$total);
			$total = 0;

			// if(count($actividad) > 1)
			$actividades[] = array('c' => $actividad);
			$actividad = [];
		}

		return $actividades;
	}
//fin jSON para las gráficas











}