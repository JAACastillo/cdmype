@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Contratos
@stop

@section('cabecera')
    Contratos
@stop

@section('boton')
    <a href="atcontratos.create" class="btn btn-default">
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

            @foreach ($atcontratos as $atcontrato)
            <tr>
                <td>{{ $atcontrato->atContratos->consultor->nombre }}</td>
                <td>{{ $atcontrato->duracion }}</td>
                <td>{{ $atcontrato->pago }}</td>
                <td>
                    <a href="{{ route('atcontratos.edit', array($atcontrato->id)) }}" data-content="Editar" class="glyphicon glyphicon-pencil"> </a>
                    <a href="{{ route('atcontratos.show', array($atcontrato->id)) }}" data-content="Ver" class="glyphicon glyphicon-book"> </a>
                    <a href="#" data-id="{{ $atcontrato->id }}" data-form="#form-usr" data-content="Eliminar" class="glyphicon glyphicon-remove"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $atcontratos->links() }}

    {{ Form::open(array('route' => array('atcontratos.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}

@stop