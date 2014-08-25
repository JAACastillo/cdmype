@extends('plantillas.formulario')

@section('cabecera')
    Consultor
@stop

<?php
    if ($consultor->exists):
        $formulario = array('route' => array('actualizarConsultor', $consultor->id), 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Editar';
        $nombre = $consultor->nombre;

    else:
        $formulario = array('route' => 'guardarConsultor', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Crear';
        $nombre = 'Creación';
    endif;
?>

@section('url')
    <li><a href="{{ route('consultores') }}">Consultores</a></li>
@stop
@section('nombre')
    {{$nombre}}
@stop

@section('formulario')

{{ Form::model($consultor, $formulario, array('role' => 'form')) }}

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">       
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control', 'autofocus')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('sexo', 'Sexo:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::select('sexo', array('' => 'Seleccione el sexo','1' => 'Mujer','2' => 'Hombre'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nit', 'NIT:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 ">
                                {{ Form::text('nit', null, array('placeholder' => 'XXXX-XXXXXX-XXX-X', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('dui', 'DUI:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::text('dui', null, array('placeholder' => 'XXXXXXXX-X', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                             {{ Form::label('correo', 'Correo:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::email('correo', null, array('placeholder' => 'ejemplo@ejemplo.com', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('departamento', 'Departamento:', array('class' => 'control-label col-md-3')) }}
                        <div class="col-md-9">
                            {{ Form::select('departamento', $departamentos, null, array('class' => 'form-control select1')) }} 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::select('municipio_id',$municipios, null, array('class' => 'form-control select2')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::textarea('direccion', $consultor->direccion, array('placeholder' => 'Dirección', 'rows' => '2', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                            {{ Form::select('especialidad_id[]', $especialidades, $consultor->especialidades, array('class' => 'chosen-select form-control ', 'multiple' => 'true', 'data-placeholder' => '  Especialidades' )) }}
                            </div>
                        </div>
                        <div class="form-group">
                             {{ Form::label('telefono', 'Teléfono: ', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-6">
                                {{ Form::text('telefono', null, array('placeholder' => 'xxxx-xxxx', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('celular', 'Celular: ', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-6">
                                {{ Form::text('celular', null, array('placeholder' => 'xxxx-xxxx', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <center>
                        <a href="javascript:history.back()">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                         Cancelar
                        </a>
                        </center>
                    </div>
                    <div class="col-xs-6">
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
            </div>
        </div>
    </div>
</div>

@section("script")
@include("validaciones.consultores")
@stop

@stop