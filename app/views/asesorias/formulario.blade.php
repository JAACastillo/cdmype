@extends('plantillas.formulario')

@section('cabecera')
    Material Asesoría
@stop

<style type="text/css">
.bootstrap-filestyle{
    margin-top:5px;
}
</style>
<?php
    if ($asesoria->exists):
        $formulario = array('route' => array('asesorias.update', $asesoria->id), 'id' => 'validar', 'method' => 'PATCH', 'class' => 'form-horizontal', 'files' => 'true');
        $action = 'Editar';

    else:
        $formulario = array('route' => 'asesorias.store', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal', 'files' => 'true');
        $action = 'Crear';
    endif;
?>

@section('url')
    <li><a href="{{ route('asesorias') }}">Material Asesoría</a></li>
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
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 ">
                                {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripcion', 'class' => 'form-control', 'rows' => '2')) }}
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
                    <div class="col-xs-10">
                        <div class="form-group">
                            {{ Form::label('material', 'Material:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9 " id="another">
                                {{ Form::file('material[]') }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xs-2"><a href="#" id="addAnother" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Agregar otro material">+</a></div>
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

@include('validaciones.materiales')
    <script type="text/javascript">
    $('#addAnother').on('click', function(){
        $('#another').append("<input type='file' name='material[]'> ");
        $(":file").filestyle({buttonText: "Buscar"});
    })
    </script>
@stop


