@extends('plantillas.formulario')

@section('cabecera')
    Configuraciones
@stop

@section('nombre')
    Configuraciones
@stop

@section('formulario')

{{ Form::model($configuraciones, array('route' => array('configuraciones.update', $configuraciones->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                {{ Form::label('num_bancario', 'Numero Bancario:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::text('num_bancario', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('institucion', 'Institución:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::text('institucion', null, array('placeholder' => 'Institución', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('correo', 'Correo:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                    {{ Form::text('correo', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="row">
    <div class="col-xs-6">
            <!-- Izquierda -->
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

@stop
               