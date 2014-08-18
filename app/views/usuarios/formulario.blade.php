@extends('plantillas.formulario')

@section('cabecera')
    Usuario
@stop

<?php
    if ($usuario->exists):
        $formulario = array('route' => array('actualizarUsuario', $usuario->id), 'method' => 'POST','id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Editar';
        $nombre = $usuario->nombre;

    else:
        $formulario = array('route' => 'guardarUsuario', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Crear';
        $nombre = 'Creación';
    endif;
?>

@section('url')
    <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
@stop
@section('nombre')
    {{$nombre}}
@stop

@section('formulario')

{{ Form::model($usuario, $formulario, array('role' => 'form')) }}

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                {{ Form::label('nombre', 'Nombre Completo:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::text('nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Correo Electrónico:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Contraseña:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Confirmar Contraseña:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Contraseña', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('tipo', 'Tipo de usuario:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::select('tipo', $tipos, null, array('class' => 'form-control')); }}
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Cancelar
        </a>
        </center>
    </div>
    <div class="col-xs-6">
        <br/>
        <center>
        <button type="submit"class="btn btn-primary ladda-button" data-style="expand-right">
        <span class="glyphicon glyphicon-floppy-disk">&nbsp</span>
         Guardar
        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
        </button>
        </center>

    </div>

    </div>

{{ Form::close() }}


@section("script")

@include('validaciones.usuarios')

@stop

@stop               