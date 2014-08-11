@extends('menu')

@section('escritorio')

<div class="row">
    <div class="btn-group col-xs-12">
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 1<br/> <strong>Empresario</strong></button>
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 2<br/> <strong>Empresa</strong></button>
          <button type="button" class="active btn btn-primary col-xs-3">Paso 3<br/> <strong>Socios</strong></button>
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 4<br/> <strong>TDR</strong></button>
    </div>
</div>

<br/>
{{ Form::model($empresaEmpresario, array('route' => 'pasoGuardarSocios', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form')) }}

@include('errores', array('errors' => $errors))

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">
			<br/>
			<br/>
				<div class="row">
				<div class="col-xs-11">
				{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			        
			        <div class="form-group">
				        {{ Form::label('empresario_id', 'Nombre:', array('class' => 'control-label col-md-3')) }}
				        <div class="col-md-9">
				            {{ Form::text('empresario', null, array('placeholder' => 'Nombre del Empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario')) }}
				            {{ Form::hidden('empresario_id', null) }}
				        </div>
				    </div>
					
				{{ Form::close() }}

					<div class="form-group">
		                {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label col-md-3')) }}
		                <div class="col-md-9">
		                    {{ Form::select('tipo', array('' => '','1' => 'Empresario','2' => 'Empresaria','3' => 'Propietario','4' => 'Propietaria','5' => 'Representante'), null, array('class' => 'form-control', 'data-placeholder' => 'Seleccione un tipo')) }} 
		                </div>
		            </div>
				</div>
				</div>
			<br/>
			<br/>
			<br/>
			<br/>

			{{ Form::hidden('empresa_id', $idEmpresa) }}


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
				        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
				        Siguiente
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
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