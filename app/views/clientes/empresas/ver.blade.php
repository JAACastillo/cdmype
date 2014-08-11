@extends('plantillas.formulario')

@section('cabecera')
    Empresa
@stop
@section('nombre')
    {{$empresa->nombre}}
@stop

@section ('formulario')

<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->nombre}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('categoria', 'Categoria:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->categoria}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('municipio', 'Municipio:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p> {{$empresa->municipio->municipio}} </p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('registro_iva', 'Registro de Iva:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->registro_iva}}<p/>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('constitucion', 'Constitución:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->constitucion}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('clasificacion', 'Clasificación:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->clasificacion}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sector_economico', 'Sector Económico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->sector_economico}}<p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('actividad', 'Actividad Económica:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->actividad}}<p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresa->descripcion}}<p>
            </div>
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
        <a href="{{ route('editarEmpresa', array($empresa->id)) }}" tabindex="11" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop