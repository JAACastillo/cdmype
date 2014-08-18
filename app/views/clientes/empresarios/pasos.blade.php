<?php 
	$pasos  = array(
				    array(
				        "label"  => "Empresario",
				        "enlace" => "editarEmpresario",
				        "rows"   => 3
				    ),
				    array(
				        "label" => "Empresa",
				        "enlace" => "pasoEmpresa",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Socios",
				        "enlace" => "pasoSocios",
				        "rows"   => 2
				    ),
				    array(
				        "label" => "Terminos",
				        "enlace" => "pasoTerminoEmpresario",
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