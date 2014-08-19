@extends('plantillas.formulario')

@section('cabecera')
    Material Asesoría
@stop

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
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
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
                            <div class="col-md-9 " id="another">
                                {{ Form::file('material[]') }}
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

@include('validaciones.materiales')
    <script type="text/javascript">
    $('#addAnother').on('click', function(){
        //<input id="filestyle-0" class="filestyle" type="file" name="material[]" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1"></input>
        // html = "<input type='file' class='filestyle' id='filestyle' name='material[]' style='position: absolute; clip: rect(0px, 0px, 0px, 0px);' tabindex='-1' > ";

        // html += "<input class='form-control ' type='text' disabled=''></input>"
        // html += "<span class='group-span-filestyle input-group-btn' tabindex='0'>"
        // html += "<label class='btn btn-default ' for='filestyle-0'>"
        // html += "<span class='glyphicon glyphicon-folder-open'></span>"
        // html += " Buscar"
        // html += "</label>"
        // html += "</span>"
        // html += "</div>"

        $('#another').append("<input type='file' name='material[]'> ");
        $(":file").filestyle({buttonText: "Buscar"});
    })
    </script>
@stop


