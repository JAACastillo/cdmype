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
      <a class="active navbar-brand" href="/cdmype/public/">CDMYPE</a>
    </div>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('empresas.index') }}"><span class="glyphicon glyphicon-briefcase"></span>  Empresas</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('empresarios.index') }}"><span class="glyphicon glyphicon-user"></span>  Empresarios</a></li>
          </ul>
        </li>
        <li><a href="{{ route('consultores.index') }}">Consultores</a></li>
        <li><a href="{{ route('asistencia-tecnica.index') }}">Asistencia Técnica</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Capacitación <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('asistencia-tecnica.index') }}"><span class="glyphicon glyphicon-book"></span>  Terminos de Referencia</a></li>
            <li><a href="{{ route('asistencia-tecnica.index') }}"><span class="glyphicon glyphicon-file"></span>  Contratos</a></li>
          </ul>
        </li>
      </ul>

      <!-- Buscador -->
      <form class="navbar-form navbar-left hidden-sm hidden-xs" role="search">
        <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-search"></span>
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

      <!-- Menu Derecho -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $Nombre }}<span class="caret">  </span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('editarUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-pencil"></span>  Editar</a></li>
              @if(Auth::user()->tipo == 'Administrador')
                <li><a href="{{ route('usuarios.index') }}"><span class="glyphicon glyphicon-user"></span>  Usuarios</a></li>
              @else
                <li><a href="{{ route('verUsuario', array(Auth::user()->id)) }}"><span class="glyphicon glyphicon-user"></span>  Usuarios</a></li>
               @endif
            <li><a href="{{ route('configuraciones.index') }}"><span class="glyphicon glyphicon-wrench"></span>  Configuración</a></li>
            <li class="divider"></li>
            <li><a href="/cdmype/public/logout"><span class="glyphicon glyphicon-off"></span>  Cerrar Sessión</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div>
    <br/>
    <br/>
    @yield('escritorio')
  </div>

@stop