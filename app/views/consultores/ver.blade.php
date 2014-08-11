@extends('plantillas.formulario')

@section('cabecera')
    Consultor
@stop

@section('formulario')

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nombre', $consultor->nombre) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('nit', 'NIT:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nit', $consultor->nit) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dui', 'DUI:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('dui', $consultor->dui) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('correo', 'Correo Eléctronico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('correo', $consultor->correo) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('direccion', $consultor->direccion) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sexo', 'Sexo:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('sexo', $consultor->sexo) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('telefono', 'Telefono:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('telefono', $consultor->telefono) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('celular', $consultor->celular) }}
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="{{ route('consultores.index') }}">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Volver
        </a>
        </center>
    </div>
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="{{ route('consultores.edit', array($consultor->id)) }}" tabindex="11" class="btn btn-danger">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop