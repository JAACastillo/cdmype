@extends('plantillas.formulario')

@section('cabecera')
    Configuraciones
@stop

@section('formulario')

{{ Form::model($Configuraciones, array('route' => array('configuraciones.update', $Configuraciones->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre Completo *', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::text('nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Correo Electrónico *', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Contraseña *', array('class' => 'control-label col-md-4')) }}
            <div class="col-md-8">
                {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
            </div>
        </div>
        
    </div>
    <br/>
    <div class="row">
    <div class="col-xs-0 col-sm-6 col-md-7">
            <!-- Izquierda -->
        <center>
        <a href="/cdmype/public/">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Cancelar
        </a>
        </center>
    </div>
    <div class="col-xs-0 col-sm-6 col-md-5">
        <center>
        <button type="submit" tabindex="11" class="btn btn-danger">
        <span class="glyphicon glyphicon-floppy-disk"></span>
         Guardar
        </button>
        </center>

    </div>

    </div>

{{ Form::close() }}

@stop
               