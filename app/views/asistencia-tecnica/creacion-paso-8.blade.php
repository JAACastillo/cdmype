@extends('menu')

@section('escritorio')

@include('asistencia-tecnica/pasos')
<br/>

<div class="row {{$oculto}} imprimir" >
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-heading"> <a href="#" class="btn btn-primary cambiar" id="cambiar"><span class="glyphicon glyphicon-pencil"></span> &nbsp  Modificar acta </a></div>
			<div class="panel-body">
				<div class="form-group">
				<div class="col-xs-12">
					<br>
					<center>
					<a class="btn btn-success" href="{{route('atPasoActaImprimir', $id)}}" target="_blank">
						<span class="glyphicon glyphicon glyphicon-print"></span>&nbsp
						Imprimir Acta 						
					</a>
					</center>
					<br>
				</div>
				</div>
			</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>


<div class="{{$visible}}" id="formulario">
{{ Form::model($acta, array('method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<br/>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
		<div class="panel-heading"> <a href="#" class="btn btn-primary cambiar {{$oculto}}" id="cambiar"><span class="glyphicon glyphicon-chevron-left"></span> &nbsp Cancelar </a></div>
			<div class="panel-body">
			<br/>		
			<div class="row">
				<div class="col-xs-11">
					{{Form::hidden('attermino_id')}}
					<div class="form-group">
		                {{ Form::label('estado', 'Estado:', array('class' => 'control-label col-md-4')) }}
		                <div class="col-md-7">
		                    {{ Form::select('estado', array('' => 'Seleccione una opción', '1' => 'Conformidad','2' => 'Rechazo'), $acta->estado, array('class' => 'form-control')) }} 
		                </div>
		            </div>
					<div class="form-group">
		                {{ Form::label('fecha', 'Fecha:', array('class' => 'control-label col-md-4')) }}
		                <div class="col-md-7">
		                    <input type="date" name="fecha" value='{{$acta->fecha}}'class="form-control" data-date='{"startView": 2, "openOnFocus": true}'/ > 
		                </div>
		            </div>

	            </div>
            </div>
			<br/>
			<br/>
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
			        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
			        Guardar
			        <span class="glyphicon glyphicon-chevron-right"></span>
			        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        </button>
			        </center>
			    </div>
			</div>
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>
</div>
{{ Form::close() }}

@stop

@section('script')
@include('validaciones.acta')
	<script type="text/javascript">
	$('.cambiar').on('click', function(){
		$('#formulario').toggle();
		$('.imprimir').toggle();
	})
	</script>
@stop