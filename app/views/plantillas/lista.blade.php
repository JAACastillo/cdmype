@extends('menu')

@section('escritorio')
<!-- Migas de Pan -->
<ol class="breadcrumb">
  <li><a href="/cdmype/public">CDMYPE</a></li>
  <li><a href="#"> @yield('cabecera', 'Inicia sesión') </a></li>
  <li class="active">Listado</li>
</ol>

<div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1">
            <!-- Izquierda -->
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10">
            <!-- Panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <!-- Cabecera -->
                            <div class="row">
                                <div class="col-xs-0 col-sm-1 col-md-2">
                                    @yield('boton')
                                </div>
                                <div class="col-xs-0 col-sm-1 col-md-8">
                                    <!-- Cabecera -->
                                    <center><h1 class="panel-title"> @yield('cabecera', 'Inicia sesión') </h1></center>
                                </div>
                            </div>
                            <!-- /Cabecera -->
                        </div>
                        <div class="panel-body">
                        
                        <br/>

                        @yield('lista')

                        </div>
                        
                    </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1">
            <!-- derecha -->
        </div>
</div>


@stop
