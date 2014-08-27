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
                <th class="text-center">ID</th>
                <th>Tema</th>
                <th>Empresa</th>
                <th>Area</th>
                <th>Encargado</th>
                <th class="text-center">Inicio</th>
                <th class="text-center">Finalización</th>
                <th>Consultor</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($atterminos as $attermino)
            <tr>
                <td class="text-center" style="width:25px">{{ $attermino->id }}</td>
                <td>
                    <a href="{{route('atPaso', $attermino->id)}}">{{ $attermino->tema }}
                    </a>
                </td>
                <td>{{ $attermino->empresa->nombre }}</td>
                <td>{{ $attermino->especialidad->sub_especialidad }}</td>
                <td>{{ $attermino->usuario->nombre }}</td>
                <td class="text-center">@if($attermino->pasoReal > 6) {{ $attermino->contrato->Inicio}} @endif</td>
                <td class="text-center">@if($attermino->pasoReal > 6){{ $attermino->contrato->final }} @endif</td>
                <td>@if($attermino->pasoReal > 5){{ $attermino->consultorSeleccionado->consultor->nombre }} @endif</td>
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