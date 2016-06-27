
         <div class="panel panel-info eventos tdr">

          <div class="page-header">
            <h2 class="text-center">Asistencia técnicas</h2>
          </div>
            <div class="panel-body">
               <div class="row col-md-12">
                  <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#ahora" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon-dashboard icono"></h6>
                        <span>Ahora</span></a></li>
                       <li role="presentation"><a href="#sesiones" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon glyphicon-tasks icono"></h6>
                        <span>Sesiones Atrazadas</span>
                       </a></li>
                       <li role="presentation"><a href="#atcontratadas" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon-cog icono"></h6>
                        <span>AT Contratadas</span>
                     </a></li>
                     <li role="presentation"><a href="#atproceso" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon-cog icono"></h6>
                        <span>AT en Proceso</span>
                     </a></li>
                     </ul>

                     <!-- Tab panes -->
                     <br>
                     <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="ahora">
                        <div class="table-responsive">
                        @include('dashboard.ahora')
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="sesiones">
                        <div class="table-responsive">
                        @include('dashboard.sesiones')
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="atcontratadas">
                        <div class="table-responsive">
                          @include('dashboard.atContratadas')
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="atproceso">
                        <div class="table-responsive">
                          @include('dashboard.atEnProceso')
                        </div>
                      </div>
                     </div>
               </div>
            </div>
         </div>
