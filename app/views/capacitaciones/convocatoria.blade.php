@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')

<br/>
{{ Form::model($asistencia, array('route' => 'capPasoGuardarConvocatoria', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form')) }}

@if(Session::has('msj'))
@section('script')

<script type="text/javascript">

    $.growl("No se encontro al empresario.", {
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
@include('errores', array('errors' => $errors))
<div class="row animated fadeIn">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="{{route('capAsistenciaPdf', $id)}}" target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Imprimir convocatoria"><span class="glyphicon glyphicon-print"></span> &nbsp PDF</a>
			</div>
			<div class="panel-body">
				<button type="submit" tabindex="11" class="btn btn-primary ladda-button pull-right" data-style="expand-right" data-toggle="tooltip" data-placement="right" title="Guardar empresario">
	        	<span class="glyphicon glyphicon-plus"></span>
	        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
	        	</button>

				<div class="row col-xs-12">
				        <div class="form-group">
				        	{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
					        {{ Form::label('empresario_id', 'Empresario:', array('class' => 'control-label col-md-3')) }}
					        <div class="col-md-5	">
					            {{ Form::text('empresario', null, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario', 'autofocus')) }}
					            {{ Form::hidden('empresario_id', null) }}
					        </div>
					        {{ Form::close() }}

					        {{ Form::label('asistio', 'Asistira:', array('class' => 'control-label col-md-1')) }}
					    	 <div class="col-md-2">
					    	<input name="asistio" type="checkbox" data-content="Seleccionar" checked >
					    	</div>
			            	{{ Form::hidden('captermino_id', $id) }}
					    </div>
	    				<br/>
	    		</div>
	    			

	    			<!-- Tabla de Asistencia -->
		            <div class="col-xs-1"></div>
		            <div class="col-xs-10">
		            	<legend></legend>
		            	<?php
    		        		$asistencias = Asistencia::Where('captermino_id', '=', $id)->get();
                		?>
                		@if ($asistencias != "[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					                <th class="text-center">Empresa/s</th>
					                <th class="text-center">Teléfono</th>
					                <th class="text-center">Asistirá</th>
					            </tr>

					            @foreach ($asistencias as $asistencia)
					            <tr>
					                <td>{{ $asistencia->empresario->nombre}}</td>
					                <td class="text-center">
										@foreach($asistencia->empresario->empresa as $empresario)
                    					<h5 style="margin:0px">{{ $empresario->empresas->nombre }}</h5>
                						@endforeach
					                </td>
					                <td class="text-center">{{ $asistencia->empresario->telefono}}</td>
					                <td class="text-center">{{ $asistencia->asistira }}</td>
					            </tr>
					            @endforeach

					        </table>
					    </div>
					    @endif
						
						<br/>
					    <br/>
					    
						
		            </div>
		            <div class="col-xs-1"></div>

				<div class="row">
				    <div class="col-xs-6">
				        <center>
				        <a href="javascript:history.back()">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				         Anterior
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				        <center>
				        <a href="{{route('capPasoOferta', $id)}}" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
			        	Siguiente
			        	<span class="glyphicon glyphicon-chevron-right"></span>
			        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        	</a>
				        </center>
				    </div>
				</div>

{{ Form::close() }}
			</div>

		</div>
	</div>

	<div class="col-xs-1"></div>
</div>

@stop


@section('script')

	<script>

	//Validar
	$('#validar').bootstrapValidator({
        message: 'Valor no valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            empresario: {
                validators: {
                    notEmpty: {
                        message: 'Faltan campos.'
                    }
                }
            }
        }
    });

	</script>

@stop