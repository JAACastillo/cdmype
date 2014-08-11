@extends('plantillas.formulario')

@section('cabecera')
    Consultor
@stop

<?php
    if ($consultor->exists):
        $form_data = array('route' => array('consultores.update', $consultor->id), 'method' => 'PATCH', 'class' => 'form-horizontal');
    else:
        $form_data = array('route' => 'consultores.store', 'method' => 'POST', 'id' => 'cns-form', 'class' => 'form-horizontal');
    endif;
?>

@section('formulario')

{{ Form::model($consultor, $form_data, array('role' => 'form')) }}

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">       
                        <div class="form-group">
                            {{ Form::label('nombre', '* Nombre:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('sexo', '* Sexo:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::select('sexo', array('' => '','1' => 'Mujer','2' => 'Hombre'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nit', '* NIT:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 ">
                                {{ Form::text('nit', null, array('placeholder' => 'NIT', 'class' => 'form-control', 'data-mask' =>'9999-999999-999-9')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('dui', '*DUI:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::text('dui', null, array('placeholder' => 'DUI', 'class' => 'form-control', 'data-mask' =>'99999999-9')) }}
                            </div>
                        </div>
                        <div class="form-group">
                             {{ Form::label('correo', '* Correo Electrónico:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::email('correo', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
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
                            {{ Form::label('direccion', '*Dirección:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '2', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                             {{ Form::label('telefono', 'Teléfono: ', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-6">
                                {{ Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control', 'data-mask' =>'9999-9999')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('celular', 'Celular: ', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-6">
                                {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control', 'data-mask' =>'9999-9999')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-6">
                            {{ Form::select('especialidad_id[]', $especialidades, $consultor->especialidad_id, array('class' => 'form-control', 'multiple' => 'true')) }} 
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
                            <!-- Izquierda -->
                        <br/>
                        <center>
                        <a href="javascript:history.back()">
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