@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Asistencias Técnicas
@stop

@section('cabecera')
    Asistencias Técnicas
@stop

@section('boton')
    <a href="{{route('atPasoEmpresa') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear Término de Referencia">
    <span class="glyphicon glyphicon-plus"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th class="text-center hidden-xs hidden-sm">ID</th>
                <th>Tema</th>
                <th>Empresa</th>
                <th class="hidden-xs hidden-sm">Area</th>
                <th class="hidden-xs hidden-sm">Encargado</th>
                <th class="text-center hidden-xs hidden-sm">Inicio</th>
                <th class="text-center hidden-xs hidden-sm">Finalización</th>
                <th class="hidden-xs">Consultor</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($atterminos as $attermino)
            <tr>
                <td class="text-center hidden-xs hidden-sm" style="width:25px">{{ $attermino->id }}</td>
                <td>
                    <a href="{{route('atPaso', $attermino->id)}}">{{ $attermino->tema }}
                    </a>
                </td>
                <td><a href="{{ route('editarEmpresa', array($attermino->empresa->id)) }}">{{ $attermino->empresa->nombre }}</a></td>
                <td class="hidden-xs hidden-sm">{{ $attermino->especialidad->sub_especialidad }}</td>
                <td class="hidden-xs hidden-sm">{{ $attermino->usuario->nombre }}</td>
                <td class="text-center hidden-xs hidden-sm">@if($attermino->pasoReal > 6) {{ $attermino->contrato->Inicio}} @endif</td>
                <td class="text-center hidden-xs hidden-sm">@if($attermino->pasoReal > 6){{ $attermino->contrato->final }} @endif</td>
                <td class="hidden-xs">
                    @if($attermino->pasoReal > 5)
                    <a href="{{ route('editarConsultor', array($attermino->consultorSeleccionado->consultor->id)) }}">
                    {{ $attermino->consultorSeleccionado->consultor->nombre }}
                    </a>
                    @endif
                </td>
                <td class="text-center">{{ $attermino->estado }}</td>
                <td class="text-center">
                    <a href="{{ route('atPaso', array($attermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    @if($attermino->pasoReal > 6)
                    <a href="{{route('atContradoPdf', $attermino->contrato->id)}}" target="_blank" class="btn btn-default btn-xs glyphicon glyphicon glyphicon-print" data-toggle="tooltip" data-placement="bottom" title="Contrato"> </a>
                    @endif
                    @if(Auth::user()->tipo == 'Administrador')
                    <a href="{{ route('eliminarAsistencia', array($attermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el TDR?');"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{-- $atterminos->links() --}}

@stop
