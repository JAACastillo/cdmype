@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')

@if(Session::has('msj'))
@section('script')
<script type="text/javascript">

    $.growl("No a cargado ningun archivo", {
        type: "danger",
        allow_dismiss: false,
        animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
        }                               
    });
</script>
@stop
@endif

<br/>
<div class="row animated fadeIn">
{{Form::open(  array('route' => array('capPasoGuardarOferta', $id), 'method' => 'POST', 'files' => 'true'))}}
		        			
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
			        Guardar &nbsp
			        <span class="glyphicon glyphicon glyphicon-floppy-disk"></span>
			        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
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