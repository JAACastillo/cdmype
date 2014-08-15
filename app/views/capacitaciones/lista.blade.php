@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Capacitaciones
@stop

@section('cabecera')
    Capacitaciones
@stop

@section('boton')
    <a href="{{route('capCrearTermino') }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Crear Término de Referencia">
    <span class="glyphicon glyphicon-book"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="active">
                <th>ID</th>
                <th>Tema</th>
                <th>Encargado</th>
                <th>Estado</th>
                <th>Opciones</th>
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
                <td>{{ $captermino->estado }}</td>
                <td>
                    <a href="{{ route('capModificarTermino', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('capacitaciones.show', array($captermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    <a href="{{ route('capacitaciones.destroy', array($captermino->id)) }}" data-form="#form-usr" class="btn btn-default btn-xs glyphicon glyphicon-remove delete" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"
> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $capterminos->links() }}

@stop