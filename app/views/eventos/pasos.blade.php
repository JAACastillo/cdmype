<?php 
// $id = $evento->id;
	$pasos  = array(
				    array(
				        "label"  => "Datos de Evento",
				        "enlace" => "eventos.edit",
				        "rows"   => 4
				    ),
				    array(
				        "label" => "Participantes",
				        "enlace" => "eventosParticipantes",
				        "rows"   => 4
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