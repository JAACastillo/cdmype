
@extends('menu')

@section('titulo')
	Creación de un nuevo evento
@stop
@section('escritorio')
	@include('eventos/pasos')

<br/>

{{ Form::model($evento, $accion) }}
@include('errores', array('errors' => $errors))
<div class="row animated fadeIn">
    <div class="col-xs-12 col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
		                <div class="form-group">
		                    {{ Form::label('tipo', 'Organizador:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::select('tipo', array(
		                                              '' => 'Seleccione una opción',
		                                              'CDMYPE' => 'CDMYPE',
		                                              'CONAMYPE' => 'CONAMYPE'), null, array('class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                     {{ Form::label('nombre', 'Nombre Evento:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('nombre', null, array('placeholder' => 'Nombre del evento', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripción del evento', 'rows' => '3', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('lugar', 'Lugar:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('lugar', null, array('placeholder' => 'Lugar', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
	                    {{ Form::label('fecha', 'Fecha:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        <input name="fecha" type="date" value="{{$evento->fecha}}" class="form-control" />
	                    </div>
	                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
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

            </div>
        </div>
    </div>
</div>
   {{ Form::close() }}

@stop
