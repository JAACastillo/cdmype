<div class="chat-panel panel panel-warning">
    <div class="panel-heading">
        <i class="fa fa-briefcase fa-fw"></i>
        Asistencias Técnicas <i class="badge pull-right">@{{estadisticas.asistencias.length}} </i>
    </div>


    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="chat">
            <li class="left clearfix" ng-repeat="asistencia in estadisticas.asistencias">
                <!-- <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span> -->
                <div class="clearfix">
                    <div class="header">
                        <strong class="primary-font">@{{asistencia.tema}}</strong> 
                        <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> @{{asistencia.fecha}}
                        </small>
                    </div>
                    <p>
                        @{{asistencia.obj_general }}
                    </p>
                </div>
            </li>
        </ul>
	</div>
</div>