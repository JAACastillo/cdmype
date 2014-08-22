@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresarios
@stop

@section('cabecera')
    Empresarios
@stop

@section('boton')
    <a href="{{ route('crearEmpresario') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear una Empresa">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Empresa</th>
                <th class="text-center">Correo Eléctronico</th>
                <th class="text-center">Municipio</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($empresarios as $empresario)
            <tr>
                <td>{{ $empresario->nombre }}</td>
                <td class="text-center">
                    @foreach($empresario->empresa as $empresa)
                    {{ $empresa->empresas->nombre }}
                    @endforeach
                </td>
                <td class="text-center">{{ $empresario->correo }}</td>
                <td class="text-center">{{ $empresario->municipio->municipio}}</td>
                <td class="text-center">
                    <a href="{{ route('editarEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarEmpresario', array($empresario->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Empresario?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{-- $empresarios->links() --}}

@stop