@extends('menu')

@section('escritorio')

@include('capacitaciones/pasos')

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
				                <th class="text-center">Opciones</th>
				            </tr>

				            @foreach ($consultores as $consultor)
				            <tr>
				                <td>{{ $consultor->nombre }}</td>
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
			        <a href="{{ route('capcontratos.create') }}" tabindex="2" class="btn btn-danger">
			        Siguiente
			        <span class="glyphicon glyphicon-chevron-right"></span>
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