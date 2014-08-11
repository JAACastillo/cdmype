@extends('plantillas.lista')

@section('titulo')
    CDMYPE - Lista de Consultores
@stop

@section('cabecera')
    Consultores
@stop

@section('boton')
    <a href="{{ route('consultores.create') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-user"></span>
    Nuevo
    </a>
@stop

@section('lista')

        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Nombre</th>
                    <th>NIT</th>
                    <th>DUI</th>
                    <th>Correo Electrónico</th>
                    <th>Opciones</th>
                </tr>
                @foreach ($consultores as $consultor)
                <tr>
                    <td>{{ $consultor->nombre  }}</td>
                    <td>{{ $consultor->nit }}</td>
                    <td>{{ $consultor->dui }}</td>
                    <td>{{ $consultor->correo }}</td>
                    <td>
                        @if(Auth::user()->tipo == 'Administrador' || Auth::user()->tipo == 'Compras')
                            <a href="{{ route('consultores.edit', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" title="Editar"> </a>
                            <a href="{{ route('consultores.show', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-user" title="Ver"> </a>
                            <a href="{{ route('consultores.destroy', array($consultor->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" title="Eliminar" onClick = "return confirm('¿Desea eliminar el Usuario?');"> </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $consultores->links() }}
            
        </div>
    </div>
</div>
@stop