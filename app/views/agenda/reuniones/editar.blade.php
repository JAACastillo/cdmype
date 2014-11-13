@extends('plantillas.plantilla')
@section('contenido')

@include('errores', array('errors' => $errors))

{{Form::model($reunion, array('route' => array('editarReunion', $reunion->id), 'method' => 'POST'))}}

<div class="row" >
   @include('agenda.cabecera')
   <div class="form-horizontal">
   @include('agenda.reunion')
   </div>

<div class="row">
        <div class="col-xs-6">
        <center>
        <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Anterior
        </a>
        </center>
    </div>
    <div class="col-xs-6">
        <center>
        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
        Guardar
        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
        </button>
        </center>
    </div>
</div>
</div>

{{Form::close()}}

@stop
