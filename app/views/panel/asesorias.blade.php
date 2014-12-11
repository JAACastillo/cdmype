<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-clock-o fa-fw"></i> Asesorías
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="timeline">
            <li ng-repeat="asesoria in estadisticas.asesorias" ng-class="{'timeline-inverted': $index % 2 == 0 }">
                <div class="timeline-badge primary"><i class="fa fa-archive"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">@{{asesoria.titulo}}</h4>
                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> @{{asesoria.fecha_inicio}}</small>
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p>
                        @{{asesoria.detalle}}
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- /.panel-body -->
</div>