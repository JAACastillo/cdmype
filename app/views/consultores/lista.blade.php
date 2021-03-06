@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Consultores
@stop

@section('cabecera')
    Consultores
@stop

@section('boton')
    <a href="{{ route('crearConsultor') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo consultor">
    <span class="glyphicon glyphicon-plus"></span>
    Nuevo
    </a>
@stop

@section('lista')

<div class="table-responsive">
    <table class="table table-bordered datatable">
        <thead>
        <tr class="active">
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Municipio</th>
            <th class="text-center hidden-xs hidden-sm">Correo Electrónico</th>
            <th class="text-center">Teléfono</th>
            <th class="text-center">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($consultores as $consultor)
        <tr>
            <td class="text-center">{{ $consultor->id }}</td>
            <td><a href="{{route('editarConsultor', array($consultor->id))}}">{{ $consultor->nombre  }}</a></td>
            <td class="text-center">{{ $consultor->municipio->municipio }}</td>
            <td class="text-center hidden-xs hidden-sm">{{ $consultor->correo }}</td>
            <td class="text-center">{{ $consultor->telefono }}</td>
            <td class="text-center">
            <a class="btn btn-default btn-xs glyphicon glyphicon-th-list" data-toggle="modal" id="especialidades" href='#modal-id' data-id="{{ $consultor->id }}" data-placement="top" title="Ver Especialidades"></a>
            <a href="{{ route('editarConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"> </a>
            <a href="{{ route('verConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
            @if(Auth::user()->tipo == 'Administrador')
                <a href="{{ route('eliminarConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Consultor?');"> </a>
            @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{-- $consultores->links() --}}

</div>


<!-- Modal -->
<div class="modal fade" id="modal-id" role="dialog" data-keyboard="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" id ="respuesta">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <div id="tabla"></div>
                    </div>
                    <div class="col-xs-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop
