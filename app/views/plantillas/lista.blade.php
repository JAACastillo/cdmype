@extends('menu')

@section('escritorio')
<!-- Migas de Pan -->
<ol class="breadcrumb">
  <li><a href="/atcdmype/public">CDMYPE</a></li>
  <li class="active"> @yield('cabecera', 'Inicia sesión') </li>
</ol>

<div class="row">
        <div class="col-xs-0 col-sm-0 col-md-1">
            <!-- Izquierda -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10">
            <!-- Panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <!-- Cabecera -->
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-2">
                                    @yield('boton')
                                </div>
                                <div class="col-xs-11 col-sm-11 col-md-8">
                                    <!-- Cabecera -->
                                    <h1 class="text-center panel-title"> @yield('cabecera', 'Inicia sesión') </h1>
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
        <div class="col-xs-1 col-sm-0 col-md-1">
            <!-- derecha -->
        </div>
</div>


@stop
