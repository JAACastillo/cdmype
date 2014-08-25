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
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="active navbar-brand" href="{{url('/')}}">CDMYPE</a>
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
      </ul>

      <!-- Buscador -->
      <div class="hidden-sm hidden-xs">
          {{ Form::open(array('url' => '/buscar/buscar', 'method' => 'post', 'id' => 'validador', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-search"></span>
              {{ Form::text('buscar', null, array('placeholder' => 'Buscar', 'class' => 'form-control buscador')) }}
            </div> 
                <div class="btn-group">
                  <button type="submit"class="btn btn-primary ladda-button" data-style="expand-right">
                  Buscar
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                  </button>
                  <a type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                  </a>
                  <div class="dropdown-menu" role="menu">
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="usuarios" checked>
                        &nbsp Usuario
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="empresarios">
                        &nbsp Empresario
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="empresas">
                        &nbsp Empresa
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="consultores">
                        &nbsp Consultor
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="terminos">
                        &nbsp Asistencia Técnica
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        &nbsp<input type="radio" name="tabla" value="material">
                        &nbsp Material de Asesoría
                      </label>
                    </div>
                  </div>
                </div>
          {{ Form::close() }}
      </div>

      <!-- Menu Derecho -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $Nombre }}<span class="caret">  </span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('editarUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-pencil"></span>  Editar</a></li>
              @if(Auth::user()->tipo == 'Administrador')
                <li><a href="{{ route('usuarios') }}"><span class="glyphicon glyphicon-user"></span>  Usuarios</a></li>
              @else
                <li><a href="{{ route('verUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-user"></span>  Mi Perfil</a></li>
              @endif
            <li><a href="{{ route('configuraciones') }}"><span class="glyphicon glyphicon-wrench"></span>  Configuración</a></li>
            <li class="divider"></li>
            <li><a href="/atcdmype/logout"><span class="glyphicon glyphicon-off"></span>  Cerrar Sessión</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div>
    <br/>
    <br/>
    <div id="fondoLoader"></div>
    <div id="loader"></div>
    @yield('escritorio')
  </div>

@section('script')

<script type="text/javascript">
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

</script>

@stop

@stop