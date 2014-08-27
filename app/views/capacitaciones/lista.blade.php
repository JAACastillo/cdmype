@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Capacitaciones
@stop

@section('cabecera')
    Capacitaciones
@stop

@section('boton')
    <a href="{{route('capCrearTermino') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear Capacitación">
    <span class="glyphicon glyphicon-plus"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th class="text-center">ID</th>
                <th class="text-center">Tema</th>
                <th class="text-center">Area</th>
                <th class="text-center">Encargado</th>
                <th class="text-center">Consultor</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($capterminos as $captermino)
            <tr>
                <td class="text-center" style="width:25px">{{ $captermino->id }}</td><td>
                    <a href="{{route('capPaso', $captermino->id)}}">{{ $captermino->tema }}
                    </a>
                </td>
                <td>{{ $captermino->especialidad->sub_especialidad }}</td>
                <td>{{ $captermino->usuario->nombre }}</td>
                <td> @if($captermino->pasoReal > 6){{ $captermino->consultorSeleccionado->consultor->nombre }} @endif </td>
                <td class="text-center">{{ $captermino->estado }}</td>
                <td class="text-center">
                    <a href="{{ route('capModificarTermino', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    @if($captermino->pasoReal > 7)
                    <a href="{{route('capContradoPdf', $captermino->contratos->id)}}" target="_blank" class="btn btn-default btn-xs glyphicon glyphicon glyphicon-print" data-toggle="tooltip" data-placement="bottom" title="Contrato"> </a>
                    @endif
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarCapacitacion', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el TDR?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{-- $capterminos->links() --}}

@stop