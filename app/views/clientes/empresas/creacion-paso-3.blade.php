@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 2<br/> <strong>Empresario</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-4">Paso 3<br/> <strong>TDR</strong></button>
	</div>
</div>

<br/>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
		   
		    <br/>
			<br/>
			{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			
			<div class="row">
			        <center>
			        <a href="{{ route('atPasoTerminos', $idEmpresa) }}" tabindex="1" class="btn btn-info">
			        <span class="glyphicon glyphicon-book"> </span>
			        Crear TDR
			        </a>
			        </center>
			</div>

			<br/>
			<br/>
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
			        <a  href="{{ route('empresas.index') }}" tabindex="11" class="btn btn-danger">
			        Finalizar
			        <span class="glyphicon glyphicon-chevron-right"></span>
			        </a>
			        </center>
			    </div>
				<div class="col-xs-2"></div>
			</div>
			{{ Form::close() }}
		
		</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>

@stop