
@extends('menu')

@section('titulo')
AT Paso empresa
@stop
@section('escritorio')
@include('asistencia-tecnica/pasos')
<br/>
{{ Form::open(array('route' => 'atPasoEmpresa', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')) }}
@include('errores', array('errors' => $errors))
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
                    	{{ Form::text('empresa', null, array('placeholder' => 'Nombre de la empresa', 'class' => 'form-control getEmpresa', 'data-url' => 'empresa')) }}
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
@stop