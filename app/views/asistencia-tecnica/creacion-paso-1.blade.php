
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
				        {{ Form::label('empresario', '* Empresario:', array('class' => 'control-label col-md-4')) }}
                		<div class="col-md-8">
                    	{{ Form::text('empresario', $idEmpresa, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario', 'data-cod' => 'idEmpresario')) }}
                		</div>
				    </div>
	            </div>
            </div>
<br/>
<br/>
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
    			        Siguiente
    			        <span class="glyphicon glyphicon-chevron-right"></span>
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