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
         <a href="{{route('editarReunion', $reunion->id)}}" class="glyphicon glyphicon-pencil agregar btn btn-primary pull-left"></a>
           <h2>&nbsp;{{$reunion->titulo}}</h2>
       </div>
     </div>
   </div>
   <div class="row">
      <div class="col-xs-6">
         <div class="dl-vertical">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('municipio_id', 'Lugar:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$reunion->municipio->municipio}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('organizacion', 'Organización:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$reunion->organizacion}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-6">
         <div class="dl-vertical">
            <div class="form-group">
               <dt class="text-left">{{ Form::label('fecha_inicio', 'Fecha:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("d-m-Y", strtotime($reunion->fecha_inicio)); }} al {{date("d-m-Y", strtotime($reunion->fecha_fin));}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('hora_inicio', 'Hora:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("g:i a", strtotime($reunion->hora_inicio));}} a {{date("g:i a", strtotime($reunion->hora_fin));}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-12">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('detalle_reunion', 'Detalle:', array('class' => 'control-label')) }}</dt>

                  <dd><p class="text-justify">{{$reunion->detalle_reunion}}</p></dd>
           </div>
      </div>
   </div>
</div>
@stop
