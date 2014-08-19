<?php 
	$pasos  = array(
				    array(
				        "label"  => "Empresa",
				        "enlace" => "atPasoTermino",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "TDR",
				        "enlace" => "atPasoTermino",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Consultores",
				        "enlace" => "atPasoConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Enviado",
				        "enlace" => "atPasoOferta",
				        "rows"   => 1
				    ),
				    array(
				        "label" => "Ofertantes",
				        "enlace" => "atPasoSeleccionarConsultor",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Contrato",
				        "enlace" => "atPasoContrato",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Acta",
				        "enlace" => "atPasoActa",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Finalizada",
				        "enlace" => "asistencia-tecnica.index",
				        "rows"   => 1
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