
         <div class="panel panel-info eventos notificaciones">
            <div class="panel-body" style="padding: 0px 15px 0px 15px;">
               <div class="table-responsive">
                 <table class="table table-hover table-condensed">
                     <thead>
                     <tr>
                        <th>
                        <div class="page-header">
                          <h2 class="text-center">Estadísticas.</h2>
                        </div>
                        </th>
                     </tr>
                     </thead>
                     <tbody class="list-group">
                     {{--@foreach ($usuarios as $usuario)--}}
                     <tr>
                         <td>
                            <h5>Asistencia Técnicas <span class="pull-right badge alert-danger">{{ $atFinalizadas->count() + $AtFinalizar->count() + $ultimosAt->count()}}</span></h5><br>
                            <span class="col-md-offset-3">Finalizadas
                                <span class="col-md-offset-3 badge alert-success">{{ $atFinalizadas->count() }}</span>
                            </span><br>
                            <span class="col-md-offset-3">en Proceso
                                <span class="col-md-offset-3 badge alert-info">{{ $AtFinalizar->count() }}</span>
                            </span><br>
                            <span class="col-md-offset-3">Contratada
                                <span class="col-md-offset-3 badge alert-warning">{{ $ultimosAt->count()}}</span>
                            </span><br>
                         </td>
                     </tr>
                     <tr>
                         <td>
                            <h5>Materiales Creados<span class="pull-right badge alert-danger">{{ $materiales }}</span></h5><br>
                         </td>
                     </tr>
                     <tr>
                        <td>
                            <h5>Proyectos con Empresas<span class="pull-right badge alert-danger">{{ $proyectos }}</span></h5>
                        </td>
                     </tr>
                     {{--@endforeach--}}
                     </tbody>
                 </table>
               </div>
            </div>
         </div>
