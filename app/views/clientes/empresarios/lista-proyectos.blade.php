@extends('menu')

@section('escritorio')

@include('clientes.empresas/pasos')

<div>
<br/>

    <a href="{{ route('empresaPasoProyecto', $id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Nuevo Proyecto">
    <span class="glyphicon glyphicon-briefcase"></span>
    Nuevo
    </a>


    <div class="table-responsive">
        <table class="table table-bordered">
            <tr class="active">
                <th class="text-center">Nombre</th>
                <th class="text-center">Meta</th>
                <th class="text-center">Indicadores</th>
                <th class="text-center">Actividades</th>
                <th class="text-center">Fecha Inicio</th>
                <th class="text-center">Fecha Fin</th>
                <th class="text-center">Opciones</th>
            </tr>

            @foreach ($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->meta }}</td>
                <td >
                	<ul>
	                    @foreach($proyecto->indicadores as $indicador)
	                    	<li>{{ $indicador->definicion->nombre }} </li>
	                    @endforeach
                    </ul>
                </td>
                <td >
                	<ul>
	                    @foreach($proyecto->actividades as $actividad)
	                    	<li>{{ $actividad->nombre }} </li>
	                    @endforeach
                    </ul>
                </td>
                <td class="text-center">{{ $proyecto->fechaInicio }}</td>
                <td class="text-center">{{ $proyecto->fechaFin}}</td>
                <td>
                	<a href="{{route('empresaF2', $proyecto->id)}}" target="_blank" class="btn btn-default"> F2</a>
                    <a href="{{ route('empresaPasoProyectoEditar', $proyecto->id) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                </td>
                
            </tr>
            @endforeach

        </table>
    </div>
    {{-- Paginar Con el valor Puesto en Modelo en la variable perPage--}}
    

@stop