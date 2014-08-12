@extends('menu')

@section('escritorio')

@include('clientes.empresarios/pasos')

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
					        <a  href="{{ route('empresarios.index') }}" tabindex="11" class="btn btn-danger">
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