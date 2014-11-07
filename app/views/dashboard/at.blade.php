
         <div class="panel panel-info eventos tdr">

          <div class="page-header">
            <h2 class="text-center">Asistencia técnicas</h2>
          </div>
            <div class="panel-body">
               <div class="row col-md-12">
                  <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#ultimosAT" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon-th-list icono"></h6>
                        <span>AT Contratadas</span></a></li>
                       <li role="presentation"><a href="#AtFinalizar" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon glyphicon-tasks icono"></h6>
                        <span>AT en proceso</span>
                       </a></li>
                       <li role="presentation"><a href="#admonAt" role="tab" data-toggle="tab">
                        <h6 class="glyphicon glyphicon-cog icono"></h6>
                        <span>AT finalizadas</span>
                     </a></li>
                     </ul>

                     <!-- Tab panes -->
                     <br>
                     <div class="tab-content">

                       @include('dashboard.atContratadas')
                       @include('dashboard.atEnProceso')
                       @include('dashboard.atFinalizadas')
                     </div>
               </div>
            </div>
         </div>
