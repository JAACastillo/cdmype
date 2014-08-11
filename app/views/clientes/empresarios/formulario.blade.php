@extends('plantillas.formulario')

@section('cabecera')
    Empresario
@stop

@section ('formulario')

{{ Form::model($empresario, array('route' => array('empresarios.update', $empresario->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('nombre', '* Nombre:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('sexo', '* Sexo:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::select('sexo', array('' => '','1' => 'Mujer','2' => 'Hombre'), null, array('class' => 'form-control')) }} 
                        </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nit', '* NIT:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('nit', null, array('placeholder' => 'NIT', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('dui', '* DUI:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('dui', null, array('placeholder' => 'DUI', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('departamento', '* Departamento:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::select('departamento', $departamentos, null, array('class' => 'form-control')) }} 
                        </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('municipio', '* Municipio:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('municipio',$municipios, null, array('class' => 'form-control')) }}
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
                            {{ Form::label('direccion', '* Dirección:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '2', 'class' => 'form-control')) }}
                            </div>
                        </div>
                    <div class="form-group">
                         {{ Form::label('correo', 'Correo Electrónico:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::email('correo', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                         {{ Form::label('telefono', 'Teléfono:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                        </div>
                    </div>
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
                        <br/>
                        <center>
                        <a href="{{ route('empresarios.index') }}">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                         Cancelar
                        </a>
                        </center>
                    </div>
                    <div class="col-xs-6">
                        <br/>
                        <center>
                        <button type="submit" tabindex="11" class="btn btn-danger">
                        <span class="glyphicon glyphicon-floppy-disk"></span>
                        Guardar
                        </button>
                        </center>
                    </div>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop