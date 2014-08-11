@extends('menu')

@section('escritorio')

@include('asistencia-tecnica/pasos')
<br/>
<div class="row">
{{Form::open(  array('route' => array('atPasoOfertaGuardar', $id), 'method' => 'POST', 'files' => 'true'))}}
		        			
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive"><table class="table table-bordered table-hover">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					                <th class="text-center">Correo</th>
					                <th class="text-center">Telefonos</th>
					                <th class="text-center">Opciones</th>
					            </tr>

					            @foreach ($consultores as $consultor)
					            <tr>
					                <td>{{ $consultor->consultor->nombre }}</td>
					                <td class="text-center">{{ $consultor->consultor->correo }}</td>
					                <td class="text-center">{{ $consultor->consultor->telefono }}</td>
					                <td class="text-center">
					                	<input type="hidden" name="consultores[]" value="{{$consultor->id}}">
					                   <input type="file" id="{{$consultor->id}}" name="ofertas[]">
					                </td>
					            </tr>
					            @endforeach
		        			</table>
	        			{{Form::close()}}
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
			        <button type="submit" tabindex="2" class="btn btn-danger">
			        	Guardar
			       		<span class="glyphicon glyphicon-send"></span>
			        </button>
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