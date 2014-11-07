<div role="tabpanel" class="tab-pane fade in active" id="ultimosAT">
    <div class="table-responsive">
      <table class="table table-bordered">
          <thead>
          <tr class="active">
              <th>Tema</th>
              <th>Empresa</th>
              <th class="text-center">Finalizacion</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Opciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($ultimosAt as $ultimosAt)
          <tr class="{{$ultimosAt->contrato->vencida > 0? 'danger':'' }}">
              <td>
                  <a href="{{route('atPaso', $ultimosAt->id)}}">{{ substr($ultimosAt->tema, 0, 30) }} ...
                  </a>
              </td>
              <td><a href="{{ route('editarEmpresa', array($ultimosAt->empresa->id)) }}">{{ substr($ultimosAt->empresa->nombre, 0, 15) }} ...</a></td>
              <td class="text-center">{{ $ultimosAt->contrato->fecha_final }}</td>
              <td class="text-center">{{ $ultimosAt->estado }}</td>
              <td class="text-center">
                  <a href="{{ route('atPaso', array($ultimosAt->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>
                  @if($ultimosAt->pasoReal > 6)
                  <a href="{{route('atContradoPdf', $ultimosAt->contrato->id)}}" target="_blank" class="btn btn-default btn-xs glyphicon glyphicon glyphicon-print" data-toggle="tooltip" data-placement="bottom" title="Contrato"> </a>
                  @endif
                  @if(Auth::user()->tipo == 'Administrador')
                  <a href="{{ route('eliminarAsistencia', array($ultimosAt->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el TDR?');"> </a>
                  @endif
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>
</div>
