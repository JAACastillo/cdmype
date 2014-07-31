@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-4">Paso 2<br/> <strong>Empresario</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 3<br/> <strong>TDR</strong></button>
	</div>
</div>

<div>
<br/>
{{ Form::model($empresaEmpresario, array('route' => 'pasoEmpresarioGuardar', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">			
			<div class="row">
				<div class="col-xs-11">
					<a href="#" tabindex="11" class="btn btn-default">
				        <span class="glyphicon glyphicon-user"></span>
				        Crear				        
				    </a>
				    <br/>
				    <br/>
			        {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			        
			        <div class="form-group">
				        {{ Form::label('empresario_id', 'Nombre:', array('class' => 'control-label col-md-3')) }}
				        <div class="col-md-9">
				            {{ Form::text('empresario_id', null, array('placeholder' => 'Nombre del Empresario', 'class' => 'form-control')) }}
				        </div>
				    </div>
					
					{{ Form::close() }}

					<div class="form-group">
		                {{ Form::label('tipo', '* Tipo:', array('class' => 'control-label col-md-3')) }}
		                <div class="col-md-9">
		                    {{ Form::select('tipo', array('' => '','1' => 'Empresaria','2' => 'Propietaria','3' => 'Representante','4' => 'Empresario','5' => 'Propietario'), null, array('class' => 'form-control')) }} 
		                </div>
		            </div>

	                	{{ Form::text('empresa_id', $empresaEmpresario->empresa_id, array('id' => 'empresa_id')) }}

	            </div>
            
            </div>
<br/>
<br/>
			<div class="row">
				    <div class="col-xs-6">
				        <center>
				        <a href="{{ route('empresas.index') }}">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				         Anterior
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				        <center>
				        <button type="submit" tabindex="11" class="btn btn-danger">
				        Siguiente
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