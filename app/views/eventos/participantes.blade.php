@extends('menu')

@section('titulo')
Participantes al evento
@stop
@section('escritorio')
@include('eventos.pasos')

<br/>

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
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="{{route('eventosParticipantesPdf', $id)}}" target="_blank" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Imprimir convocatoria"><span class="glyphicon glyphicon-print"></span> &nbsp PDF</a>
				<a class="btn btn-primary pull-right" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-envelope"></span></a>
			</div>
			<div class="panel-body">

				<div class="row col-xs-12">
				        <div class="form-group">
				        	{{ Form::open(array( 'method' => 'post', 'role' => 'search')) }}
					        	{{ Form::label('empresario_id', 'Empresario:', array('class' => 'control-label col-md-3')) }}
						        <div class="col-md-5	">
						            {{ Form::text('empresario', null, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario', 'autofocus')) }}
						            {{ Form::hidden('empresario_id', null) }}
						        </div>

	    				<div class="form-group">
	    					<button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right" data-toggle="tooltip" data-placement="right" title="Guardar empresario">
				        	<span class="glyphicon glyphicon-save"></span>
				        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        	</button>
	    				</div>
					        {{ Form::close() }}
					    </div>
	    		</div>


	    			<!-- Tabla de Asistencia -->
		            <div class="col-xs-1"></div>
		            <div class="col-xs-10">
                		@if ($asistencias != "[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					                <th class="text-center">Empresa/s</th>
					                <th class="text-center">Teléfono</th>
					            </tr>

					            @foreach ($asistencias as $asistencia)
					            <tr>
					                <td>{{ $asistencia->empresario->nombre}}</td>
					                <td class="text-center">
										@foreach($asistencia->empresario->empresa as $empresario)
                    					<h5 style="margin:0px">{{ $empresario->empresas->nombre }}</h5>
                						@endforeach
					                </td>
					                <td class="text-center">{{ $asistencia->empresario->telefono}} / {{$asistencia->empresario->celular}}</td>
					            </tr>
					            @endforeach

					        </table>
					    </div>
					    @endif

						<br/>
					    <br/>


		            </div>
		            <div class="col-xs-1"></div>

				<!-- <div class="row">
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
				</div> -->
			</div>
		</div>
	</div>

	<div class="col-xs-1"></div>
</div>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
			{{Form::open(array('route' => array('eventosParticipantesCorreo', $id), 'method' => 'POST'))}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Correo</h4>
			</div>
			<div class="modal-body">
				{{ Form::text('asunto', null, array('placeholder' => 'Asunto', 'required', 'class' => 'form-control','autofocus')) }}
				<br>
				{{ Form::textarea('nota', null, array('placeholder' => 'Nota del correo', 'required', 'rows' => '6', 'class' => 'form-control')) }}
			</div>
			<div class="modal-footer">
				<a href=""#  data-dismiss="modal">Cancelar</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div><!-- /.modal-content -->
		{{Form::close()}}
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop


@section('script')

	<script>

	//Validar
	// $('#validar').bootstrapValidator({
 //        message: 'Valor no valido',
 //        feedbackIcons: {
 //            valid: 'glyphicon glyphicon-ok',
 //            invalid: 'glyphicon glyphicon-remove',
 //            validating: 'glyphicon glyphicon-refresh'
 //        },
 //        fields: {
 //            empresario: {
 //                validators: {
 //                    notEmpty: {
 //                        message: 'Faltan campos.'
 //                    }
 //                }
 //            }
 //        }
 //    });

	</script>

@stop
