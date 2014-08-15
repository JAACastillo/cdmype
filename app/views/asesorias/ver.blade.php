@extends('plantillas.formulario')

@section('cabecera')
    Consultor
@stop

@section('url')
    <li><a href="{{ route('consultores.index') }}">Consultores</a></li>
@stop
@section('nombre')
    {{$consultor->nombre}}
@stop

@section('formulario')
<div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-8">
    <div class="dl-horizontal">
        <div class="form-group">
            <dt class="text-left">{{ Form::label('nombre', 'Nombre:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->nombre}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('nit', 'NIT:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->nit}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('dui', 'DUI:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->dui}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('correo', 'Correo Eléctronico:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->correo}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->municipio->municipio}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('direccion', 'Dirección:', array('class' => 'control-label')) }}</dt>
                <dd><p>{{$consultor->direccion}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('sexo', 'Sexo:', array('class' => 'control-label')) }}<dt>
                <dd><p>{{$consultor->sexo}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('telefono', 'Telefono:', array('class' => 'control-label')) }}<dt>
                <dd><p>{{$consultor->telefono}}</p></dd>
        </div>
        <div class="form-group">
            <dt class="text-left">{{ Form::label('celular', 'Celular:', array('class' => 'control-label')) }}<dt>
                <dd><p>{{$consultor->celular}}</p></dd>
        </div>
    </div>
</div>
<div class="col-xs-2"></div>
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
        <a href="{{ route('editarConsultor', array($consultor->id)) }}" tabindex="11" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop