<div class="row animated pulse">
         <div class="panel panel-info eventos">
            <div class="panel-body" style="padding: 0px 15px 0px 15px;">
               <div class="table-responsive">
                 <table class="table-condensed dataeventos">
                     <thead>
                     <tr>
                        <th>
                        <div class="page-header">
                          <h2 class="text-center">Próximos Eventos.</h2>
                        </div>
                        </th>
                     </tr>
                     </thead>
                     <tbody class="list-group">
                     @foreach ($eventos as $evento)
                     <tr>
                         <td>
                           <a href="{{ route($evento['tipo'] == 'capacitacion'?'capModificarTermino':'eventos.edit', array($evento['id'])) }}" class="list-group-item list-group-item-primary">
                              {{ $evento['nombre']}} en {{ $evento['lugar']}} <small> - {{ $evento['tipo']}}.</small>
                           <span class="badge alert-info">{{ $evento['fecha'] }}</span>
                           </a>
                         </td>
                     </tr>
                     @endforeach
                     </tbody>
                 </table>
               </div>
            </div>
         </div>
      </div>
