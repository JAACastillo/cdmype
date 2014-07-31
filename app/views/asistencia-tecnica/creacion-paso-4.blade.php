@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 2<br/> <strong>TDR</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 3<br/> <strong>Consultor</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-2">Paso 4<br/> <strong>Envio de Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 5<br/> <strong>Agregar Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 6<br/> <strong>Selección del Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 7<br/> <strong>Contrato</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 8<br/> <strong>Acta</strong></button>
	</div>
</div>

<br/>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
				            <tr class="active">
				                <th class="text-center">Nombre</th>
				                <th class="text-center">Correo</th>
				                <th class="text-center">Telefonos</th>
				                <th class="text-center">Opciones</th>
				            </tr>

				            @foreach ($consultores as $consultor)
				            <tr>
				                <td>{{ $consultor->nombre }}</td>
				                <td class="text-center">{{ $consultor->correo }}</td>
				                <td class="text-center">{{ $consultor->telefono }}</td>
				                <td class="text-center">
				                    <input type="checkbox" data-content="Seleccionar" >
				                </td>
				            </tr>
				            @endforeach
	        			</table>
	    			</div>
    			</div>
			</div>
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
			        <a href="attermino-agregar-oferta" tabindex="2" class="btn btn-danger">
			        Enviar
			        <span class="glyphicon glyphicon-send"></span>
			        </a>
			        </center>
			    </div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-xs-2"></div>
</div>

{{ $consultores->links() }}

@stop