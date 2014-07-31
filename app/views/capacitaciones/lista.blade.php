@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de TDR
@stop

@section('cabecera')
    Términos de Referencias
@stop

@section('boton')
    <a href="captermino-empresa" class="btn btn-default">
    <span class="glyphicon glyphicon-book"></span>
    Nuevo
    </a>
@stop

@section('lista')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="active">
                <th>Tema</th>
                <th>Empresa</th>
                <th>Opciones</th>
            </tr>

            @foreach ($capterminos as $captermino)
            <tr>
                <td>{{ $captermino->nombre }}</td>
                <td>{{ $captermino->email }}</td>
                <td>{{ $captermino->tipo }}</td>
                <td>
                    <a href="{{ route('capterminos.edit', array($captermino->id)) }}" data-content="Editar" class="glyphicon glyphicon-pencil"> </a>
                    <a href="{{ route('capterminos.show', array($captermino->id)) }}" data-content="Ver" class="glyphicon glyphicon-book"> </a>
                    <a href="#" data-id="{{ $captermino->id }}" data-form="#form-usr" data-content="Eliminar" class="glyphicon glyphicon-remove"> </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    {{ $capterminos->links() }}

    {{ Form::open(array('route' => array('capterminos.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}

@stop