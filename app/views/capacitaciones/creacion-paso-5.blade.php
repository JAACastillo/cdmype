@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')

<br/>

@if(Session::has('msj'))
@section('script')

<script type="text/javascript">

    $.growl("No se realizo la operacion. Por favor no deje campos vacios", {
        type: "danger",
        allow_dismiss: false,
        animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
        }                               
    });
</script>
@stop
@endif
{{ Form::model($asistencia, array('route' => array('capPasoActualizarAsistencia', $id), 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
<div class="row animated fadeIn">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="{{route('capAsistenciaPdf', $id)}}" target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Imprimir convocatoria"><span class="glyphicon glyphicon-print"></span> &nbsp PDF</a>
			</div>
			<div class="panel-body">
				<!-- Tabla de Asistencia -->
		            <div class="col-md-12"></div>
		            	<?php
    		        		$asistencias = Asistencia::Where('captermino_id', '=', $id)->Where('asistira', '=', 'Si')->get();
                		?>
                		@if ($asistencias != "[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center" style="width: 350px;">Nombre</th>
					                <th class="text-center hidden-xs">Empresa/s</th>
					                <th class="text-center hidden-xs hidden-sm">Teléfono</th>
					                <th class="text-center">Asistio</th>
					            </tr>

					            @foreach ($asistencias as $asistencia)
					            <tr>
					                <td>{{ $asistencia->empresario->nombre}}</td>
					                <td class="text-center hidden-xs">
										@foreach($asistencia->empresario->empresa as $empresario)
                    					<h5 style="margin:0px">{{ $empresario->empresas->nombre }}</h5>
                						@endforeach
					                </td>
					                <td class="text-center hidden-xs hidden-sm" style="width: 100px;">{{ $asistencia->empresario->telefono}}</td>
					                <td class="text-center">
								@if ($asistencia->asistio == "Si")
									<input name="asistencias[]" type="checkbox" data-content="Seleccionar" value="{{$asistencia->id}}" checked >
								@else
									<input name="asistencias[]" type="checkbox" data-content="Seleccionar" value="{{$asistencia->id}}" >
								@endif
				                    
				                	</td>
					            </tr>
					            @endforeach

					        </table>
					    </div>

					    <br/>
					    <div class="row">
						    <div class="col-xs-6">
						        
						    </div>
						    <div class="col-xs-6">
						    	<center>
						        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
					        	Guardar
					        	<span class="glyphicon glyphicon-chevron-right"></span>
					        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
					        	</button>
					        	</center>
						    </div>
						</div>
						@else
					    <div class="col-xs-12"><h4 class="text-center">Ningun empresario convocado</h4></div>
					    @endif
						<br/>


		            </div>

			</div>
		</div>
	</div>
	</div>
	<div class="col-md-1"></div>
	</div>
</div>
{{ Form::close() }}
@stop


@section('script')


@stop