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

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->nombre}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('nit', 'NIT:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->nit}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dui', 'DUI:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->dui}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('correo', 'Correo Eléctronico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->correo}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->municipio->municipio}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->direccion}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sexo', 'Sexo:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->sexo}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('telefono', 'Telefono:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->telefono}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$consultor->celular}}</p>
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
        <a href="{{ route('editarConsultor', array($consultor->id)) }}" tabindex="11" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop