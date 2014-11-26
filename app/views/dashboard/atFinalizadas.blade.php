
      <table class="table table-bordered">
          <thead>
          <tr class="active">
              <th>Tema</th>
              <th>Empresa</th>
              <th class="text-center">Inicio</th>
              <th class="text-center">Fin</th>
              <th class="text-center">Estado</th>

          </tr>
          </thead>
          <tbody>
          @foreach ($atFinalizadas as $atFinalizada)
          <tr>
              <td>
                  <a href="{{route('atPaso', $atFinalizada->id)}}">{{ substr($atFinalizada->tema, 0, 30) }} ...
                  </a>
              </td>
              <td><a href="{{ route('editarEmpresa', array($atFinalizada->empresa->id)) }}">{{ substr($atFinalizada->empresa->nombre, 0, 15) }} ...</a></td>
              <td class="text-center">{{ $atFinalizada->fecha }}</td>
              <td class="text-center">{{ $atFinalizada->contrato->fecha_final }}</td>
              <td class="text-center">{{ $atFinalizada->estado }}</td>

          </tr>
          @endforeach
          </tbody>
      </table>
