@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresarios
@stop

@section('cabecera')
    Empresarios
@stop

@section('boton')
    <a href="{{ route('crearEmpresario') }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Crear una Empresa">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo Eléctronico</th>
                <th class="text-center">Municipio</th>
                <th class="text-center">Opciones</th>
            </tr>

            @foreach ($empresarios as $empresario)
            <tr>
                <td>{{ $empresario->nombre }}</td>
                <td class="text-center">{{ $empresario->correo }}</td>
                <td class="text-center">{{ $empresario->municipio->municipio}}</td>
                <td class="text-center">
                    <a href="{{ route('editarEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    <a href="{{ route('eliminarEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"
> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $empresarios->links() }}

@stop