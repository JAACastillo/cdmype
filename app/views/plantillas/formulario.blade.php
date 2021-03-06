@extends('menu')

@section('escritorio')

<!-- Migas de Pan -->
<ol class="breadcrumb">
  <li><a href="{{url('/')}}">CDMYPE</a></li>
  @yield('url')
  <li class="active"> @yield('nombre', 'Creación') </li>
</ol>
@include('errores', array('errors' => $errors))
    <div class="row animated fadeIn">
        <div class="col-xs-0 col-sm-1 col-md-1">
            <!-- Izquierda -->
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10">
            <!-- Panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center><h1 class="panel-title"> @yield('cabecera', 'Inicia sesión') </h1></center>
                        </div>
                        <div class="panel-body">
                            @yield('formulario')
                        </div>
                    </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1">
            <!-- derecha -->
        </div>
    </div>

@stop
