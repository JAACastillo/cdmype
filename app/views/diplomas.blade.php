@extends('plantillas.lista')

@section('titulo')
    Lista de empresarios para diploma
@stop

@section('cabecera')
    Empresarios para diploma
@stop


@section('lista')
    <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($empresarios as $empresario)
            <tr>
                <td>{{ $empresario->nombre }}</td>
                <td>{{ $empresario->tipo }}</td>
                <td class="text-center">
                    
                    <a href="{{ route('diploma', array($empresario->id)) }}" target="_blank"class="btn btn-default btn-xs glyphicon glyphicon-print" data-toggle="tooltip" data-placement="top" title="Imprimir"> </a>
                  
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop