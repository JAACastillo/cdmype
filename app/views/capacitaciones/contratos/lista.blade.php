@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Contratos
@stop

@section('cabecera')
    Contratos
@stop

@section('boton')
    <a href="capcontrato.create" class="btn btn-default">
    <span class="glyphicon glyphicon-book"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="active">
                <th>Consultor</th>
                <th>Duracion</th>
                <th>Pago</th>
                <th>Opciones</th>
            </tr>

            @foreach ($capcontratos as $capcontrato)
            <tr>
                <td>{{ $capcontrato->capcontratos->consultor->nombre }}</td>
                <td>{{ $capcontrato->duracion }}</td>
                <td>{{ $capcontrato->pago }}</td>
                <td>
                    <a href="{{ route('capcontratos.edit', array($capcontrato->id)) }}" data-content="Editar" class="glyphicon glyphicon-pencil"> </a>
                    <a href="{{ route('capcontratos.show', array($capcontrato->id)) }}" data-content="Ver" class="glyphicon glyphicon-book"> </a>
                    <a href="#" data-id="{{ $capcontrato->id }}" data-form="#form-usr" data-content="Eliminar" class="glyphicon glyphicon-remove"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $capcontratos->links() }}

    {{ Form::open(array('route' => array('capcontratos.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}

@stop