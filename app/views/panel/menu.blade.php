<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse " style="background-color: #ECEAEA;">
        <ul class="nav" id="side-menu">
            <li>
                <a class="active" href=""> <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#" ng-click="asesor(0)"><i class="fa fa-group fa-fw"></i> Asesores<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    @foreach($asesores as $asesor)
                        <li> 
                          <a href="#" ng-click="asesor({{$asesor->id}})">  {{$asesor->nombre}} </a>
                        </li>
                    @endforeach
                </ul>
                <!-- /.nav-second-level -->
            </li> 
            <!-- <li>
                <a href="#"><i class="fa fa-building fa-fw"></i> Empresas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                        <li>
                          <a href="#">  Empresa </a>
                        </li>
                </ul>
            </li> -->
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>