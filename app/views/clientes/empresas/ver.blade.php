@extends('plantillas.formulario')

@section('cabecera')
    Empresa
@stop

@section ('formulario')

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nombre', $empresa->nombre) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('categoria', 'Categoria:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('categoria', $empresa->categoria) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('departamento', 'Departamento:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('departamento', $empresa->departamento) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('municipio', 'Municipio:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('municipio', $empresa->municipio->municipio) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('registro_iva', 'Registro de Iva:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('registro_iva', $empresa->registro_iva) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('constitucion', 'Constitución:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('constitucion', $empresa->constitucion) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('clasificacion', 'Clasificación:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('clasificacion', $empresa->clasificacion) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sector_economico', 'Sector Económico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('sector_economico', $empresa->sector_economico) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('actividad', 'Actividad Económica:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('actividad', $empresa->actividad) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('descripcion', $empresa->descripcion) }}
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Volver
        </a>
        </center>
    </div>
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="{{ route('empresas.edit', array($empresa->id)) }}" tabindex="11" class="btn btn-danger">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop