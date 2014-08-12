@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Consultores
@stop

@section('cabecera')
    Consultores
@stop

@section('boton')
    <a href="{{ route('crearConsultor') }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Crear Consultor">
    <span class="glyphicon glyphicon-user"></span>
    Nuevo
    </a>
@stop

@section('lista')

<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="active">
            <th class="text-center">Nombre</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Correo Electrónico</th>
            <th class="text-center">Opciones</th>
        </tr>
        @foreach ($consultores as $consultor)
        <tr>
            <td>{{ $consultor->nombre  }}</td>
            <td class="text-center">{{ $consultor->municipio->municipio }}</td>
            <td class="text-center">{{ $consultor->correo }}</td>
            <td class="text-center">
                @if(Auth::user()->tipo == 'Administrador' || Auth::user()->tipo == 'Compras')
                    <a class="btn btn-default btn-xs glyphicon glyphicon-th-list" data-toggle="modal" href='#modal-id' data-id="{{ $consultor->id }}"></a>

                    <a href="{{ route('editarConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"> </a>
                    <a href="{{ route('verConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
                    <a href="{{ route('eliminarConsultor', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    {{ $consultores->links() }}
    
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
                <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop