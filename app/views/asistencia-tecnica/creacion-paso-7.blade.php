@extends('menu')

@section('escritorio')


@include('asistencia-tecnica/pasos')
<br/>
@include('errores', array('errors' => $errors))



<div class="row {{$oculto}} imprimir" >
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-heading"> 
			<a href="#" class="btn btn-primary cambiar" id="cambiar"><span class="glyphicon glyphicon glyphicon-pencil"></span>&nbsp Modificar </a>
			<a href="#" class="btn btn-primary ampliacion pull-right"><span class="glyphicon glyphicon glyphicon-resize-full"></span>&nbsp  Ampliación </a>
		</div>
			<div class="panel-body">
				<div class="form-group">
				<div class="col-xs-12">
					<center>
					<a class="btn btn-success" href="{{route('atContradoPdf', $atcontrato->id)}}" target="_blank">
						<span class="glyphicon glyphicon glyphicon-print"></span>&nbsp
						Imprimir Contrato	
					</a>
					<br />
					<br />
					@if($atcontrato->terminos->ampliacion)
					<a class="btn btn-warning" href="{{route('atAmpliacionPdf', $id)}}" target="_blank">
						<span class="glyphicon glyphicon glyphicon-print"></span>&nbsp
						Imprimir Ampliación	
					</a>
					@endif
				</center>
				</div>
				</div>
			</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>

<div class="row oculto" id="ampliacion">
<div class="col-xs-2"></div>
<div class="col-xs-8">
	@include('asistencia-tecnica/ampliacion')
</div>
<div class="col-xs-2"></div>
</div>
<br>
<div class="{{$visible}}" id="formulario">

{{ Form::model($atcontrato, $action) }}

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
		<div class="panel-heading"> <a href="#" class="btn btn-primary cambiar {{$oculto}}" id="cambiar"><span class="glyphicon glyphicon-chevron-left"></span> &nbsp Cancelar </a></div>
		
			<div class="panel-body">		
			<div class="row">
				<div class="col-xs-11">
						{{Form::hidden('attermino_id', null)}}
					<div class="form-group">
                     	{{ Form::label('lugar_firma', 'Lugar:', array('class' => 'control-label col-md-4')) }}
                    	<div class="col-md-8">
                        	{{ Form::text('lugar_firma', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
	                	</div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('fecha_inicio', 'Fecha de inicio:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
	                        <input name="fecha_inicio" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$atcontrato->fecha_inicio}}" class="form-control" />
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('fecha_final', 'Fecha de finalización:', array('class' => 'control-label col-md-4', "data-date"=>'{"startView": 2, "openOnMouseFocus": true}', "placeholder"=>"yyyy-mm-dd")) }}
	                    <div class="col-md-4">
	                        <input name="fecha_final" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$atcontrato->fecha_final}}" class="form-control" />
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('duracion', 'Duración:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
	                    	<div class="input-group"> 
	                    	{{ Form::number('duracion', $atcontrato->duracion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0')) }}
	                    	<div class="input-group-addon">Semanas</div>
	                    	</div>
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('pago', 'Pago al Consultor/a:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                    	<div class="input-group"> 
	                    		<div class="input-group-addon">$</div>
	                        {{ Form::number('pago', $atcontrato->pago, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0')) }}
	                    	</div>
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('aporte', 'Aporte de CDMYPE:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                    	<div class="input-group"> 
	                        {{ Form::number('aporte', $atcontrato->aporte, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => 'any')) }}
	                        <div class="input-group-addon">%</div>
	                    	</div>
	                    </div>
	                </div>
	            </div>
            </div>
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
			        Siguiente
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
			{{ Form::close() }}
</div>


@stop



@section('script')
@include('validaciones.atcontratos')
@include('validaciones.ampliaciones')
	<script type="text/javascript">
	$('.cambiar').on('click', function(){
		$('#formulario').toggle();
		$('.imprimir').toggle();
	})

	$('.ampliacion').on('click', function(){
		$('#ampliacion').toggle();
		$('.imprimir').toggle();
	})
	</script>
@stop