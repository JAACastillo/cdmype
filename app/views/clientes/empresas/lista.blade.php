@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Empresas
@stop

@section('cabecera')
    Empresas
@stop

@section('boton')
    <a href="{{ route('crearEmpresa') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear una Empresa">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Propietario</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Municipio</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>

                <td >
                @foreach($empresa->empresarios as $empresario)
                 
                    <h5>{{ $empresario->empresarios->nombre }} <small>{{$empresario->tipo}}</small></h5>
                    
                @endforeach
                </td>


                <td class="text-center">{{ $empresa->categoria }}</td>
                <td class="text-center">{{ $empresa->municipio->municipio }}</td>
                <td class="text-center">
                    <a href="{{ route('editarEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarEmpresa', array($empresa->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar la Empresa?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{-- $empresas->links() --}}

@stop