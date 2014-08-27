@extends('menu')

@section('escritorio')

@include('asistencia-tecnica/pasos')

@if(Session::has('msj'))
@section('script')
<script type="text/javascript">

    $.growl("Seleccione un consultor", {
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
<div class="row">
	{{Form::open()}}
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
	        			<table class="table table-bordered">
				            <tr class="active">
				                <th class="text-center">Nombre</th>
				                <th class="text-center">Correo</th>
				                <th class="text-center">Telefonos</th>
				                <th class="text-center">Oferta</th>
				                <th class="text-center">Opciones</th>
				            </tr>

				            @foreach ($consultores as $consultor)
				            <tr>
				                <td>{{ $consultor->consultor->nombre }}</td>
				                <td class="text-center">{{ $consultor->consultor->correo }}</td>
				                <td class="text-center" style="width:100px">{{ $consultor->consultor->telefono }}</td>
				                <td class="text-center"> 
				                	<a href="{{route('atOferta', $consultor->doc_oferta)}}" target="_blank">
				                		{{ $consultor->doc_oferta}}
				                	</a>
				                </td>
				                <td class="text-center" style="width:70px">
				                    <input type="radio" name="consultor" value="{{$consultor->id}}" data-content="Seleccionar" data-toggle="tooltip" data-placement="bottom" title="Seleccionar">
				                </td>
				            </tr>
				            @endforeach
	        			</table>
	    			</div>
    			</div>
			</div>
			<br>
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
			        Siguiente
			        <span class="glyphicon glyphicon-chevron-right"></span>
			        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        </button>
			        </center>
			    </div>
			</div>
		</div>
		{{Form::close()}}
	</div>
	</div>
	<div class="col-xs-1"></div>
</div>


@stop