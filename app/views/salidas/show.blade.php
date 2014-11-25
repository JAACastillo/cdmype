@extends('plantillas.plantilla')
@section('contenido')

<style type="text/css">
   .page-header{
      margin: 30px 0px 10px 0px;
   }
   .cont{
      margin-top: -50px;
   }
</style>
<!-- Datos Cliente -->
<div class="row cont">
   <div class="row">
     <div class="col-xs-12">
       <div class="page-header">
          <a href="{{route('salidas.edit', $salida->id)}}" class="glyphicon glyphicon-pencil agregar btn btn-primary pull-left"></a>
          <h2>&nbsp;{{$salida->municipio->municipio}}</h2>
       </div>
     </div>
   </div>
   <div class="row">
      <div class="col-xs-6">
         <div class="dl-vertical">
            <div class="form-group">
               <dt class="text-left">{{ Form::label('fecha_inicio', 'Fecha:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("d-m-Y", strtotime($salida->fecha_inicio)); }}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('encargado', 'Encargado:', array('class' => 'control-label')) }}</dt>

                  <dd><p class="text-justify">{{$salida->responsable->nombre}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('justificacion', 'Justificación:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$salida->justificacion}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-6">
         <div class="dl-vertical">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('hora_inicio', 'Hora:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("g:i a", strtotime($salida->hora_salida));}} a {{date("g:i a", strtotime($salida->hora_regreso));}}</p></dd>
           </div>
            <div class="form-group">
               <dt class="text-left">{{ Form::label('fecha_inicio', 'Estado:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{ $salida->estado }}</p></dd>
           </div>
            <div class="form-group">
                <dt class="text-left">{{ Form::label('objetivo', 'Objetivo:', array('class' => 'control-label')) }}</dt>
                    <dd><p>{{$salida->objetivo}}</p></dd>
            </div>
            <div class="form-group">
                <dt class="text-left">{{ Form::label('observacion', 'Observación:', array('class' => 'control-label')) }}</dt>
                    <dd><p>{{$salida->observacion}}</p></dd>
            </div>
         </div>
      </div>
   </div>
</div>

@stop
