@extends('plantillas.formulario')

@section('cabecera')
    Usuario
@stop

@section('nombre')
    {{$usuario->nombre}}
@stop

@section('formulario')

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nombre', $usuario->nombre) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Correo Eléctronico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('email', $usuario->email) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('tipo', 'Tipo de Usuario:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('tipo', $usuario->tipo) }}
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-7">
        <br/>
        <center>
        <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Volver
        </a>
        </center>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-5">
        <br/>
        <center>
        <a href="{{ route('usuarios.edit', array($usuario->id)) }}" tabindex="11" class="btn btn-danger">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

    </div>

@stop