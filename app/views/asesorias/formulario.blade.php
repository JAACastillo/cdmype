@extends('plantillas.formulario')

@section('cabecera')
    Material Asesoría
@stop

<?php
    if ($asesoria->exists):
        $formulario = array('route' => array('asesorias.update', $asesoria->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'files' => 'true');
        $action = 'Editar';

    else:
        $formulario = array('route' => 'asesorias.store', 'method' => 'POST', 'id' => 'usr-form', 'class' => 'form-horizontal', 'files' => 'true');
        $action = 'Crear';
    endif;
?>

@section('url')
    <li><a href="{{ route('asesorias.index') }}">Material Asesoría</a></li>
@stop

@section('formulario')
{{ Form::model($asesoria, $formulario, array('role' => 'form')) }}

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">       
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre de asesoría:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                                {{ Form::text('nombre de asesoría', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 ">
                                {{ Form::text('descripcion', null, array('placeholder' => 'Descripcion', 'class' => 'form-control')) }}
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
                    <a href="#" id="addAnother" class="btn btn-primary pull-right">+</a>
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('material', 'Material:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 ">
                                {{ Form::file('material[]', array('class' => 'filestyle')) }}
                                <div id="another"></div>
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

@stop

@section('script')
    <script type="text/javascript">
    $('#addAnother').on('click', function(){
        $('#another').append("<input type='file' name='material[]'> ");
    })
    </script>
@stop


