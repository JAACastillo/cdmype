@extends('plantillas.plantilla')

<?php
    $Nombre = explode(" ", Auth::user()->nombre);
    $Nombre = $Nombre[0]. ' '.end($Nombre). '    ';
?>

@section('contenido')

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Dispositivos Moviles -->
    <div class="navbar-header">
      <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="active navbar-brand hidden-sm hidden-md" href="{{url('/')}}">CDMYPE</a>
      <!-- <a class="active navbar-brand visible-sm visible-md" href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span></a> -->
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('empresas') }}"><span class="glyphicon glyphicon-briefcase"></span>  Empresas</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('empresarios') }}"><span class="glyphicon glyphicon-user"></span>  Empresarios</a></li>
          </ul>
        </li>
        <li><a href="{{ route('asesorias') }}">Materiales</a></li>
        <li><a href="{{ route('consultores') }}">Consultores</a></li>
        <li><a href="{{ route('asistencia-tecnica') }}">Asistencia Técnica</a></li>
        <li><a href="{{ route('capacitaciones') }}">Capacitación</a></li>
        <li><a href="{{ route('eventos.index') }}">Eventos</a></li>
      </ul>

      <!-- Buscador -->
      <div class=" hidden-xs hidden-sm hidden-md animated fadeIn">
          @include('buscador')
      </div>

      <!-- Menu Derecho -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $Nombre }}<span class="caret">  </span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-home"></span>  Inicio</a></li>
            <li><a href="{{ url('salidas') }}"><span class="glyphicon glyphicon-calendar"></span>  Calendario</a></li>
            <li><a href="{{ route('editarUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-pencil"></span>  Editar</a></li>
              @if(Auth::user()->tipo == 'Administrador')
                <li><a href="{{ route('usuarios') }}"><span class="glyphicon glyphicon-user"></span>  Usuarios</a></li>
              @else
                <li><a href="{{ route('verUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-user"></span>  Mi Perfil</a></li>
              @endif
            <li><a href="{{ route('configuraciones') }}"><span class="glyphicon glyphicon-wrench"></span>  Configuración</a></li>
            <li class="divider"></li>
            <li><a href="/cdmype/sistema/logout"><span class="glyphicon glyphicon-off"></span>  Cerrar Sessión</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div>
    <div id="fondoLoader"></div>
    <div id="loader"></div>
    <!-- Buscador -->
    <a class="visible-xs visible-sm visible-md pull-right" id="opcionBuscar" style="font-size:16px;cursor:pointer;z-index:1000;position:absolute;top:60px;right:15px;" data-toggle="tooltip" data-placement="bottom" title="Buscador"><span class="glyphicon glyphicon-search"></span></a>
    <div class="row opcionBuscar oculto">
        <div class="row visible-xs visible-sm animated bounceInDown">
          <br><br>
        @include("buscador2")
        <br><br>
        </div>
        <br><br>
    </div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="titulo"></h4>
      </div>
      <div class="modal-body">
        {{ Form::hidden('bandera', null, array('id' => 'myModalBandera')) }}
        <div class="row">
          <div class="col-xs-12">
          {{ Form::textarea('texto', null, array('placeholder' => 'Introdusca el texto...', 'rows' => '12', 'class' => 'form-control', 'id' => 'texto', 'autofocus')) }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" data-dismiss="modal" style="cursor: pointer">Cancelar</a>  &nbsp  &nbsp
        <a type="button" class="btn btn-primary ocultarModal" >Guardar</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    @yield('escritorio')
  </div>

@section('script')

<script type="text/javascript">

//Validar buscador
$("#validador").submit(function () {
    if($(".buscador").val().length < 1) {
        $.growl("No ha ingresado el texto a buscar!", {
            type: "danger",
            allow_dismiss: false,
            animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
            }
        });
        return false;
    }
    return true;
});

$("#validador2").submit(function () {
    if($(".buscador2").val().length < 1) {
        $.growl("No ha ingresado el texto a buscar!", {
            type: "danger",
            allow_dismiss: false,
            animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
            }
        });
        return false;
    }
    return true;
});

$('#opcionBuscar').on('click', function(){
    $('.opcionBuscar').toggle("fadeIn");
})

</script>

@stop

@stop
