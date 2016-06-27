
      <table class="table table-bordered">
          <thead>
          <tr class="active">
              <th>Tema</th>
              <th>Empresa</th>
              <th class="text-center">fecha creación</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Opciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($AtFinalizar as $AtFinalizar)
          <tr>
              <td>
                  <a href="{{route('atPaso', $AtFinalizar->id)}}">{{ substr($AtFinalizar->tema, 0, 30) }} ...
                  </a>
              </td>
              <td><a href="{{ route('editarEmpresa', array($AtFinalizar->empresa->id)) }}">{{ substr($AtFinalizar->empresa->nombre, 0, 15) }} ...</a></td>
              <td class="text-center">{{ $AtFinalizar->fecha }}</td>
              <td class="text-center">{{ $AtFinalizar->estado }}</td>
              <td class="text-center">
                  <a href="{{ route('atPaso', array($AtFinalizar->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="Editar"> </a>

                  @if(Auth::user()->tipo == 'Administrador')
                  <a href="{{ route('eliminarAsistencia', array($AtFinalizar->id)) }}" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="right" title="Eliminar" onClick = "return confirm('¿Desea eliminar el TDR?');"> </a>
                  @endif
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
