<?php
	$pasos  = array(
				    array(
				        "label"  => "TDR",
				        "enlace" => "capModificarTermino",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Consultores",
				        "enlace" => "capPasoConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Convocatoria",
				        "enlace" => "capPasoConvocatoria",
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
				        "enlace" => "capPasoContrato",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Finalizada",
				        "enlace" => "capPasoInforme",
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
		  		col-md-{{$paso['rows']}}">
		  		Paso {{$step++}}<br/>
		  		<strong> {{$paso['label']}} </strong>
		  	</a>
		@endforeach

	</div>
</div>
