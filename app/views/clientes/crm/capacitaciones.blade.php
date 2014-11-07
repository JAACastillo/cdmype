<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <a class="glyphicon glyphicon-plus l-agregar btn btn-primary pull-left"></a>
    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dos" aria-expanded="false" aria-controls="dos">
    <h4 class="panel-title">
        Capacitaciones
        <span class="glyphicon glyphicon-chevron-down pull-right"></span>
        <span class="pull-right">&nbsp;&nbsp;</span>
        <span class="pull-right badge alert-danger">{{ $capacitaciones->count() }}</span>
    </h4>
    </a>
  </div>
  <div id="dos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr class="active">
                <th class="text-center">Tema</th>
                <th class="text-center">Area</th>
                <th class="text-center hidden-xs">Consultor</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($capacitaciones as $capacitacion)
            <tr>
                <td>
                    <a href="{{route('capPaso', 2)}}">{{ $capacitacion->tema }}
                    </a>
                </td>
                <td>{{ $capacitacion->especialidad->sub_especialidad }}</td>
                <td class="hidden-xs">
                    @if($capacitacion->pasoReal > 6)
                    <a href="{{ route('editarConsultor', array($capacitacion->consultorSeleccionado->consultor->id)) }}">
                    {{ $capacitacion->consultorSeleccionado->consultor->nombre }}
                    </a>
                    @endif
                </td>
                <td class="text-center">{{ $capacitacion->estado }}</td>
                <td class="text-center">
                    <a href="{{ route('capModificarTermino', array(2)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                    @if($capacitacion->pasoReal > 7)
                    <a href="{{route('capContradoPdf', $capacitacion->contratos->id)}}" target="_blank" class="btn btn-default btn-xs glyphicon glyphicon glyphicon-print" data-toggle="tooltip" data-placement="bottom" title="Contrato"> </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
