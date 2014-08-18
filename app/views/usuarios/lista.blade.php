@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Usuarios
@stop

@section('cabecera')
    Usuarios
@stop

@section('boton')
    <a href="{{ route('crearUsuario') }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Crear usuario">
    <span class="glyphicon glyphicon-user"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo Electrónico</th>
                <th class="text-center">Tipo de usuario</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td class="text-center">{{ $usuario->tipo }}</td>
                <td class="text-center">
                    <a href="{{ route('editarUsuario', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verUsuario', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarUsuario', array($usuario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $usuarios->links() }}

@stop