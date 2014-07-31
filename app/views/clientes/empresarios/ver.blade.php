@extends('plantillas.formulario')

@section('cabecera')
    Empresario
@stop

@section ('formulario')

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nombre', $empresario->nombre) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sexo', 'Sexo:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('sexo', $empresario->sexo) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('nit', 'NIT:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('nit', $empresario->nit) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dui', 'DUI:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('dui', $empresario->dui) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('municipio_id', $empresario->municipio_id) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('direccion', $empresario->direccion) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('correo', 'Correo Eléctronico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('correo', $empresario->correo) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('telefono', 'Teléfono:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('telefono', $empresario->telefono) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                {{ Form::label('celular', $empresario->celular) }}
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
        <a href="{{ route('empresarios.edit', array($empresario->id)) }}" tabindex="11" class="btn btn-danger">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop