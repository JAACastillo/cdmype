@extends('plantillas.plantilla')
@section('contenido')

<!-- Cargando angular Js -->
{{ HTML::script('assets/js/angular.min.js') }}
{{ HTML::script('assets/js/calendarioAngular.js') }}

@include('errores', array('errors' => $errors))

{{Form::model($asesoria, array('route' => array('editarAsesoria', $asesoria->id), 'method' => 'POST'))}}

<div class="row" ng-app= "agenda" ng-init="actividadTipo=1" >
   @include('agenda.cabecera')
   <div class="form-horizontal">
   @include('agenda.asesoria')
   </div>
   <input type='hidden' id = "url" value="{{url('/')}}" />

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
