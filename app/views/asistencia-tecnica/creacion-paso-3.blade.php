@extends('menu')

@section('escritorio')


@include('asistencia-tecnica/pasos')

<br/>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
<?php
		$accion = array('route' => 'atPasoConsultorGuardar', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form');
?>
		{{ Form::open($accion) }}

			{{Form::hidden('idEmpresa', $id)}}
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
				            <tr class="active">
				                <th class="text-center">Nombre</th>
				                <th class="text-center">Correo</th>
				                <th class="text-center">Telefonos</th>
				                <th class="text-center">Especialidad</th>
				                <th class="text-center">Opciones</th>
				            </tr>

				            @foreach ($consultores as $consultor)
				            <tr>
				                <td>{{ $consultor->consultor->nombre }}</td>
				                <td class="text-center">{{ $consultor->consultor->correo }}</td>
				                <td class="text-center">{{ $consultor->consultor->telefono }}</td>
				                <td> {{$consultor->especialidad->sub_especialidad}}</td>
				                <td class="text-center">
				                    <input name="consultores[]" type="checkbox" data-content="Seleccionar" value="{{$consultor->consultor->id}}" checked >
				                </td>
				            </tr>
				            @endforeach

	        			</table>
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
			        Siguiente &nbsp
			        <span class="glyphicon glyphicon glyphicon-send"></span>
			        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        </button>
			        </center>
				</div>
			</div>
		{{ Form::close() }}
		</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>

{{ $consultores->links() }}

@stop