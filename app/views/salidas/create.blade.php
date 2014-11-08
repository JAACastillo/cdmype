@extends('plantillas.formulario')

@section('cabecera')
    Salidas
@stop

<?php
    if ($salida->exists):
        $formulario = array('route' => array('salidas.edit', $salida->id), 'method' => 'POST','id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Editar';

    else:
        $formulario = array('route' => 'salidas.store', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Crear';
        $nombre = 'Creación';
    endif;
?>

@section('url')
    <li><a href="{{ url('salidas') }}">Salidas</a></li>
@stop

@section('formulario')

{{ Form::model($salida, $formulario, array('role' => 'form')) }}

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              {{ Form::label('lugar_destino', 'Lugar:', array('class' => 'control-label col-md-4')) }}
              <div class="col-md-6">
                  {{ Form::text('lugar_destino', null, array('placeholder' => 'Tema de Capacitación', 'class' => 'form-control')) }}
              </div>
            </div>
            <div class="form-group ">
                <div class="col-md-2 col-md-offset-3">
                    <input name="fecha_inicio" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$salida->fecha_inicio}}" class="form-control" />
                </div>
                <div class="col-md-2">
                  {{ Form::time('hora_salida', $salida->hora_salida, array('class' => 'form-control hora')) }}
                </div>
                <div class="col-md-2">
                    {{ Form::time('hora_regreso', $salida->hora_regreso, array('class' => 'form-control hora')) }}
                </div>
                <div class="col-md-2"> 
                    <input name="fecha_final" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$salida->fecha_final}}" class="form-control" />
                </div>
            </div>
            
            <div class="form-group">
               {{ Form::label('encargado', 'Encargado:', array('class' => 'control-label col-md-4')) }}
               <div class="col-md-6">
                {{ Form::select('encargado', array('' => 'Seleccione una opción') + $asesores, $salida->encargado, array('class' => 'form-control')) }}
               </div>
            </div>
            <div class="form-group">
                {{ Form::label('participantes', 'Participantes:', array('class' => 'control-label col-md-4')) }}
                <div class="col-md-6">
                {{ Form::select('participantes[]', $asesores, $salida->participantes, array('class' => 'chosen-select form-control ', 'multiple' => 'true', 'data-placeholder' => '  Participantes' )) }}
                </div>
            </div>
            <div class="form-group">
                 {{ Form::label('objetivo', 'Objetivo:', array('class' => 'control-label col-md-4')) }}
                 <div class="col-md-6">
                     {{ Form::textarea('objetivo', null, array('placeholder' => 'Objetivo', 'rows' => '2', 'class' => 'form-control previsualizar')) }}
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label('justificacion', 'Justificacion:', array('class' => 'control-label col-md-4')) }}
                 <div class="col-md-6">
                     {{ Form::textarea('justificacion', null, array('placeholder' => 'Justificacion', 'rows' => '2', 'class' => 'form-control previsualizar')) }}
                 </div>
             </div>
             <div class="form-group">
              {{ Form::label('observacion', 'Observacion:', array('class' => 'control-label col-md-4')) }}
              <div class="col-md-6">
                  {{ Form::text('observacion', null, array('placeholder' => 'Observacion', 'class' => 'form-control')) }}
              </div>
            </div>
        </div>
    </div>
    <br/>
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


@section("script")

@include('validaciones.salidas')

@stop

@stop
