
@extends('menu')

@section('titulo')
AT Paso empresa
@stop
@section('escritorio')
@include('asistencia-tecnica/pasos')
<br/>
{{ Form::open(array('route' => 'atPasoEmpresa', 'id' => 'validar', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')) }}

@if(Session::has('msj'))
@section('script')

<script type="text/javascript">

    $.growl("La Empresa no pudo ser encontrada", {
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

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">
			<br/>		
			<div class="row">
				<div class="col-xs-11">
			        <div class="form-group">
				        {{ Form::label('empresa_id', 'Empresa:', array('class' => 'control-label col-md-4')) }}
                		<div class="col-md-7">
                    	{{ Form::hidden('empresa_id',null) }}                		
                    	{{ Form::text('empresa', null, array('placeholder' => 'Nombre de la empresa', 'class' => 'form-control getEmpresa', 'data-url' => 'empresa', 'autofocus')) }}
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
			        Siguiente
			        <span class="glyphicon glyphicon-chevron-right"></span>
			        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        </button>
			        </center>
			    </div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>
{{Form::close()}}

@section('script')
<script type="text/javascript">

$(document).ready(function() {

	$('#validar').bootstrapValidator({
        message: 'Valor no valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            empresa: {
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido.'
                    }
                }
            }
        }
    });

});

</script>
@stop

@stop