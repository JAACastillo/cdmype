@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Asistencias Técnicas
@stop

@section('cabecera')
    Asistencias Técnicas
@stop

@section('boton')
    <a href="{{route('atPasoEmpresa') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-book"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
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

            @foreach ($atterminos as $attermino)
            <tr>
                <td>
                    {{ $attermino->id }}</td>
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
                    <a href="{{ route('asistencia-tecnica.edit', array($attermino->id)) }}" class="btn btn-success btn-xs glyphicon glyphicon-pencil" title="Editar"> </a>
                    <a href="{{ route('asistencia-tecnica.show', array($attermino->id)) }}" class="btn btn-primary btn-xs glyphicon glyphicon-user" title="Ver"> </a>
                    <a href="{{ route('asistencia-tecnica.destroy', array($attermino->id)) }}" class="btn btn-danger btn-xs glyphicon glyphicon-remove" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $atterminos->links() }}

    {{ Form::open(array('route' => array('asistencia-tecnica.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}

@stop