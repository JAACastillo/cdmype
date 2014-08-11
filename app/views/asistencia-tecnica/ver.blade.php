@extends('plantillas.formulario')

@section('cabecera')
    Términos de Referencia
@stop

@section('formulario')

<div class="row col-xs-12">
        <div class="form-group">
            {{ Form::label('tema', '* Tema:', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
            {{ Form::label('tema', $attermino->tema) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('obj_general', '* Objetivo General:', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::label('obj_general', $attermino->obj_general) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('obj_especifico', '* Objetivo Especifico:', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::label('obj_especifico', $attermino->obj_especifico) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('productos', '* Productos:', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::label('productos', $attermino->productos) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
            {{ Form::label('especialidad_id', $attermino->subespecialidad->Especialidad->especialidad) }} 
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-7">
        <br/>
        <center>
        <a href="{{ route('usuarios.index') }}">
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