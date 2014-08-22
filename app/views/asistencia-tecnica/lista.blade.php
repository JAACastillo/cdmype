@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Asistencias Técnicas
@stop

@section('cabecera')
    Asistencias Técnicas
@stop

@section('boton')
    <a href="{{route('atPasoEmpresa') }}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Crear Término de Referencia">
    <span class="glyphicon glyphicon-book"></span>
    Nueva
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th>ID</th>
                <th>Tema</th>
                <th>Empresa</th>
                <th>Area</th>
                <th>Encargado</th>
                <th>Inicio</th>
                <th>Finalización</th>
                <th>Consultor</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($atterminos as $attermino)
            <tr>
                <td class="text-center">{{ $attermino->id }}</td>
                <td>
                    <a href="{{route('atPaso', $attermino->id)}}">{{ $attermino->tema }}
                    </a>
                </td>
                <td>{{ $attermino->empresa->nombre }}</td>
                <td>{{ $attermino->especialidad->sub_especialidad }}</td>
                <td>{{ $attermino->usuario->nombre }}</td>
                <td>@if($attermino->pasoReal > 6) {{ $attermino->contrato->Inicio}} @endif</td>
                <td>@if($attermino->pasoReal > 6){{ $attermino->contrato->final }} @endif</td>
                <td>@if($attermino->pasoReal > 5){{ $attermino->consultorSeleccionado->consultor->nombre }} @endif</td>
                <td>{{ $attermino->estado }}</td>
                <td>
                    <a href="{{ route('atPaso', array($attermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    <a href="{{ route('verAsistencia', array($attermino->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" data-toggle="tooltip" data-placement="top" title="Ver"> </a>
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