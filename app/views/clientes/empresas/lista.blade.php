@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresas
@stop

@section('cabecera')
    Empresas
@stop

@section('boton')
    <a href="{{ route('pasoEmpresa') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
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
                    <a href="{{ route('empresas.edit', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" title="Editar"> </a>
                    <a href="{{ route('empresas.show', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" title="Ver"> </a>
                    <a href="{{ route('empresas.destroy', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $empresas->links() }}

@stop