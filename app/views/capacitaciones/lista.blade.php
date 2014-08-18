@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Capacitaciones
@stop

@section('cabecera')
    Capacitaciones
@stop

@section('boton')
    <a href="{{route('capCrearTermino') }}" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Crear Capacitación">
    <span class="glyphicon glyphicon-book"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="active">
                <th class="text-center">ID</th>
                <th class="text-center">Tema</th>
                <th class="text-center">Encargado</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
            </tr>

            @foreach ($capterminos as $captermino)
            <tr>
                <td>
                    {{ $captermino->id }}</td>
                <td>
                    <a href="{{route('capPaso', $captermino->id)}}">{{ $captermino->tema }}
                    </a>
                </td>
                <td>{{ $captermino->usuario->nombre }}</td>
                <td class="text-center">{{ $captermino->estado }}</td>
                <td class="text-center">
                    <a href="{{ route('capModificarTermino', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('capMostrarTermino', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarCapacitacion', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el TDR?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $capterminos->links() }}

@stop