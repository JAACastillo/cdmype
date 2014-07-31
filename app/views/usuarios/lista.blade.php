@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Usuarios
@stop

@section('cabecera')
    Usuarios
@stop

@section('boton')
    <a href="{{ route('usuarios.create') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-user"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="active">
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Tipo de usuario</th>
                <th>Opciones</th>
            </tr>

            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->tipo }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" title="Editar"> </a>
                    <a href="{{ route('usuarios.show', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" title="Ver"> </a>
                    <a href="{{ route('usuarios.destroy', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>

    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $usuarios->links() }}

@stop