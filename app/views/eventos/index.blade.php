@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de eventos
@stop

@section('cabecera')
    Eventos
@stop

@section('boton')
    <a href="{{ url('eventos/create') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo consultor">
    <span class="glyphicon glyphicon-plus"></span>
    Nuevo
    </a>
@stop

@section('lista')

<div class="table-responsive">
    <table class="table table-bordered datatable">
        <thead>
        <tr class="active">
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripcion</th>
            <th class="text-center">Lugar</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Organizador</th>
            <th class="text-center">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eventos as $evento)
        <tr>
            <td>{{ $evento->nombre  }}</td>
            <td class="text-center">{{ $evento->descripcion }}</td>
            <td class="text-center">{{ $evento->lugar }}</td>
            <td class="text-center">{{ $evento->fecha }}</td>
            <td class="text-center">{{ $evento->tipo }}</td>
            <td class="text-center">
            <!-- <a class="btn btn-default btn-xs glyphicon glyphicon-th-list" data-toggle="modal" id="especialidades" href='#modal-id' data-id="{{ $evento->id }}" data-placement="top" title="Ver Especialidades"></a> -->
            <a href="{{ route('eventos.edit', array($evento->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"> </a>
            <a href="{{route('eventosParticipantesPdf', $evento->id)}}" target="_blank" class="btn btn-default btn-xs glyphicon glyphicon-print" data-toggle="tooltip" data-placement="right" title="Partipantes"></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{-- $eventos->links() --}}
    
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