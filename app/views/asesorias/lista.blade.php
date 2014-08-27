@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de asesorias
@stop

@section('cabecera')
    Material de Asesorías
@stop

@section('boton')
    <a href="{{ route('asesorias.create') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear nueva asesoria">
    <span class="glyphicon glyphicon-plus"></span>
    Nueva
    </a>
@stop

@section('lista')

<div class="table-responsive">
    <table class="table table-bordered datatable">
        <thead>
        <tr class="active">
            <th class="text-center">Asesoría</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Creador</th>
            <th class="text-center">Modificado</th>
            <th class="text-center">Material</th>
            <th class="text-center">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($asesorias as $asesoria)
        <tr>
            <td>{{ $asesoria->nombre  }}</td>
            <td class="text-center">{{ $asesoria->descripcion }}</td>
            <td class="text-center">{{ $asesoria->usuario->nombre }}</td>
            <td class="text-center">
                @if($asesoria->modificado)
                    {{$asesoria->editado->nombre}}
                @endif
            </td>
            <td >
                <ol>
                @foreach($asesoria->material as $material)
                    <li>
                        <a href="{{route('materialAsesoria', $material->material)}}" target="_blank">{{$material->material}}</a><br>
                    </li>
                @endforeach
                </ol>
            </td>
            <td class="text-center">
                <a href="{{ route('asesorias.edit', array($asesoria->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"> </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{-- $asesorias->links() --}}
    
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