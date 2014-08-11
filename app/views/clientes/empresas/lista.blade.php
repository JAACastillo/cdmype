@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresas
@stop

@section('cabecera')
    Empresas
@stop

@section('boton')
    <a href="{{ route('crearEmpresa') }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Crear una Empresa">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Municipio</th>
                <th class="text-center">Opciones</th>
            </tr>

            @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td class="text-center">{{ $empresa->categoria }}</td>
                <td class="text-center">{{ $empresa->municipio->municipio }}</td>
                <td class="text-center">
                    <a href="{{ route('editarEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    <a href="{{ route('eliminarEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"
                    > </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $empresas->links() }}

@stop