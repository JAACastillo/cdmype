<?php 
	$pasos  = array(
				    array(
				        "label"  => "Empresa",
				        "enlace" => "editarEmpresa",
				        "rows"   => 4
				    ),
				    array(
				        "label" => "Empresario",
				        "enlace" => "pasoEmpresarios",
				        "rows"   => 4
				    ),
				    array(
				        "label" => "Terminos",
				        "enlace" => "pasoTerminoEmpresa",
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