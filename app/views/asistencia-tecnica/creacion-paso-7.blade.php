@extends('menu')

@section('escritorio')


@include('asistencia-tecnica/pasos')
<br/>
@include('errores', array('errors' => $errors))

{{ Form::model($atcontrato, $action) }}

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">		
			<div class="row">
					<div class="pull-right">  
						<a href="{{route('atContradoPdf', $atcontrato->id)}}" target ="_blank"class="btn btn-success">
							PDF
					        <span class="glyphicon glyphicon-play-circle"></span>							
						</a>
					</div>
				<div class="col-xs-11">
						{{Form::hidden('attermino_id', null)}}
					<div class="form-group">
                     	{{ Form::label('lugar_firma', '* Lugar:', array('class' => 'control-label col-md-4')) }}
                    	<div class="col-md-8">
                        	{{ Form::text('lugar_firma', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
	                	</div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('fecha_inicio', '* Fecha de inicio:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
	                        <input name="fecha_inicio" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$atcontrato->fecha_inicio}}" class="form-control" />
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('fecha_final', '* Fecha de finalización:', array('class' => 'control-label col-md-4', "data-date"=>'{"startView": 2, "openOnMouseFocus": true}', "placeholder"=>"yyyy-mm-dd")) }}
	                    <div class="col-md-4">
	                        <input name="fecha_final" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$atcontrato->fecha_final}}" class="form-control" />
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('duracion', '* Duración:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                    	{{ Form::number('duracion', $atcontrato->duracion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'Semanas')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('pago', 'Pago al Consultor/a:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                        {{ Form::number('pago', $atcontrato->pago, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'$')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('aporte', 'Aporte de CDMYPE:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                        {{ Form::number('aporte', $atcontrato->aporte, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => 'any', 'placeholder' =>'%')) }}
	                    </div>
	                </div>
	            </div>
            </div>

			<div class="row">
				    <div class="col-xs-6">
				    	<br/>
				        <center>
				        <a href="javascript:history.back()">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				         Anterior
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				    	<br/>
				        <center>
				        <button type="submit" tabindex="11" class="btn btn-danger">
					        Continuar
					        <span class="glyphicon glyphicon-chevron-right"></span>
				        </button>
				        </center>
				    </div>
			</div>
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>
			{{ Form::close() }}

@stop