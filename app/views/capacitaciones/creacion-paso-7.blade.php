@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones/pasos')

<div>
<br/>
{{ Form::model($capcontrato, array('route' => 'capcontratos.store', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form')) }}

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">		
			<div class="row">
				<div class="col-xs-11">
					<div class="form-group">
                     		{{ Form::label('lugar_firma', '* Lugar:', array('class' => 'control-label col-md-4')) }}
                    		<div class="col-md-8">
                        	{{ Form::text('lugar_firma', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
	                		</div>
	                	</div>
	                <div class="form-group">
	                     {{ Form::label('fecha_inicio', '* Fecha de inicio:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
	                        {{ Form::text('fecha_inicio', null, array('placeholder' => 'Fecha de inicio', 'class' => 'form-control fecha')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('fecha_final', '* Fecha de finalización:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
	                        {{ Form::text('fecha_final', null, array('placeholder' => 'Fecha de Finalización', 'class' => 'form-control fecha')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('duracion', '* Duración:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                    	{{ Form::number('duracion', null, array('placeholder' => 'Semanas', 'class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.00')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('pago', 'Pago al Consultor/a:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                        {{ Form::number('pago', null, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'$')) }}
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('aporte', 'Aporte de CDMYPE:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-3">
	                        {{ Form::number('aporte', null, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'%')) }}
	                    </div>
	                </div>
	                	{{-- 
	                	{{ Form::hidden('atconsultor_id', $consultor_id, array('id' => 'consultor_id')) }}
						--}}
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
				        Finalizar
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </button>
				        </center>
				    </div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>

@stop