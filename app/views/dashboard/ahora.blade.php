
      <table class="table table-bordered">
          <thead>
          <tr class="active">
              <th>Titulo</th>
              <th>Fecha</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($ahora as $hoy)
          <tr>
              <td>
              <a href="{{ route($hoy['informe'] == 'asesoria'?'editarAsesoria':'atPasoTermino', array($hoy['id'])) }}">
                {{ $hoy['tema'] }}
              </a>
              </td>
              <td>{{ date("d-m-Y", strtotime($hoy['fecha'])); }}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
