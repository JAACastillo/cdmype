@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')
<br/>
@include('errores', array('errors' => $errors))

<div class="row {{$oculto}} imprimir" >
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-heading"> 
			<a href="#" class="btn btn-primary cambiar" id="cambiar"><span class="glyphicon glyphicon glyphicon-pencil"></span>&nbsp Modificar </a>
		</div>
			<div class="panel-body">
				<div class="form-group">
				<div class="col-xs-6">
					<a class="btn btn-success" href="{{route('capContradoPdf', $capcontrato->id)}}" target="_blank">
						Imprimir Contrato &nbsp
					    <span class="glyphicon glyphicon glyphicon-print"></span>	
					</a>
				</div>
				</div>
			</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>
<br>
<div class="{{$visible}}" id="formulario">

{{ Form::model($capcontrato, $action) }}

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
		<div class="panel-heading"> <a href="#" class="btn btn-primary cambiar {{$oculto}}" id="cambiar"> Cancelar </a></div>
		
			<div class="panel-body">		
			<div class="row">
				<div class="col-xs-11">
						{{Form::hidden('capconsultor_id', null)}}
					<div class="form-group">
                     	{{ Form::label('lugar_firma', 'Lugar:', array('class' => 'control-label col-md-4')) }}
                    	<div class="col-md-8">
                        	{{ Form::text('lugar_firma', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
	                	</div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('pago', 'Pago:', array('class' => 'control-label col-md-4')) }}
	                   <div class="col-md-4">
						    <div class="input-group">
						    	<div class="input-group-addon">$</div>
	                        	{{ Form::number('pago', null, array('class' => 'form-control text-center', 'min' => '1', 'max' => '100', 'step' => 'any', 'placeholder' =>'%')) }}
	                    	</div>
	                    </div>
	                </div>
	                <div class="form-group">
                            {{ Form::label('firma', 'Firma:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('firma', array('' => '','1' => 'Director','2' => 'Directora'), null, array('class' => 'form-control')) }} 
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
	<script type="text/javascript">
	$('.cambiar').on('click', function(){
		$('#formulario').toggle();
		$('.imprimir').toggle();
	})
	</script>
@stop