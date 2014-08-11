@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresarios
@stop

@section('cabecera')
    Empresarios
@stop

@section('boton')
    <a href="{{ route('empresarios.create') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo Eléctronico</th>
                <th class="text-center">Opciones</th>
            </tr>

            @foreach ($empresarios as $empresario)
            <tr>
                <td>{{ $empresario->nombre }}</td>
                <td class="text-center">{{ $empresario->correo }}</td>
                <td class="text-center">
                    <a href="{{ route('empresarios.edit', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" title="Editar"> </a>
                    <a href="{{ route('empresarios.show', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" title="Ver"> </a>
                    <a href="{{ route('empresarios.destroy', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $empresarios->links() }}

@stop