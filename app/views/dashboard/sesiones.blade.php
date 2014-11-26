
<table class="table table-bordered">
    <thead>
    <tr class="active">
        <th>Titulo</th>
        <th class="text-center">Empresa</th>
        <th class="text-center">Lugar</th>
        <th class="text-center">Fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($asesoria as $asesoria)
    <tr>
        <td>
            <a href="{{route('verAsesoria', $asesoria->id)}}">{{ substr($asesoria->titulo, 0, 30) }} ...
            </a>
        </td>
        <td class="text-center">
            <a href="{{route('editarEmpresa', $asesoria->empresa->id)}}">{{ $asesoria->empresa->nombre}}</td></a>
        <td class="text-center">{{ $asesoria->municipio->municipio }}</td>
        <td class="text-center">{{ date("d-m-Y", strtotime($asesoria->fecha_inicio)); }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
