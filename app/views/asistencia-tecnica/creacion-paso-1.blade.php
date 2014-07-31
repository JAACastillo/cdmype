@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" class="active btn btn-primary col-xs-1">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 2<br/> <strong>TDR</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 3<br/> <strong>Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 4<br/> <strong>Envio de Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 5<br/> <strong>Agregar Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 6<br/> <strong>Selección del Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 7<br/> <strong>Contrato</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 8<br/> <strong>Acta</strong></button>
	</div>
</div>

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
                    	{{ Form::text('empresario', null, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario', 'data-cod' => 'idEmpresario')) }}
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