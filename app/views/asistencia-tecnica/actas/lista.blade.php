@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Actas
@stop

@section('cabecera')
    Actas
@stop

@section('boton')
    <a href="actas.create" class="btn btn-default">
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

            @foreach ($actas as $acta)
            <tr>
                <td>{{ $acta->actas->consultor->nombre }}</td>
                <td>{{ $acta->duracion }}</td>
                <td>{{ $acta->pago }}</td>
                <td>
                    <a href="{{ route('actas.edit', array($acta->id)) }}" data-content="Editar" class="glyphicon glyphicon-pencil"> </a>
                    <a href="{{ route('actas.show', array($acta->id)) }}" data-content="Ver" class="glyphicon glyphicon-book"> </a>
                    <a href="#" data-id="{{ $acta->id }}" data-form="#form-usr" data-content="Eliminar" class="glyphicon glyphicon-remove"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $actas->links() }}

    {{ Form::open(array('route' => array('capcontratos.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}

@stop