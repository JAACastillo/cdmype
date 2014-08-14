<?php 
	$pasos  = array(
				    array(
				        "label"  => "TDR",
				        "enlace" => "capModificarTermino",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Consultores",
				        "enlace" => "capPasoConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Enviado",
				        "enlace" => "capPasoOferta",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Ofertantes",
				        "enlace" => "capPasoSeleccionarConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Asistencia",
				        "enlace" => "capPasoAsistencia",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Contrato",
				        "enlace" => "capPasoConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Finalizada",
				        "enlace" => "capCrearTermino",
				        "rows"   => 2
				    )
				);
	$step = 1;

?>

<div class="row">
	<div class="btn-group col-xs-12">
	 	@foreach($pasos as $paso)

		  	<a href="{{route($paso['enlace'], $id)}}" type="button"  
		  		{{($step > $pasoReal ? 'disabled' : '')}} 
		  		class="{{($pasoActual == $step ? 'active btn btn-primary' : 'btn btn-default')}}  
		  		col-xs-{{$paso['rows']}}">
		  		Paso {{$step++}}<br/> 
		  		<strong> {{$paso['label']}} </strong>
		  	</a>
		@endforeach

	</div>
</div>