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
         <a href="{{route('editarAsesoria', $asesoria->id)}}" class="glyphicon glyphicon-pencil agregar btn btn-primary pull-left"></a>
           <h2>&nbsp;{{$asesoria->titulo}}</h2>
       </div>
     </div>
   </div>
   <div class="row">
      <div class="col-xs-4">
         <div class="dl-vertical">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('municipio_id', 'Lugar:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->municipio->municipio}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('organizacion', 'Tipo:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->tipo}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('proyecto', 'Empresa:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->empresa->nombre}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-4">
         <div class="dl-vertical">
            <div class="form-group">
               <dt class="text-left">{{ Form::label('fecha_inicio', 'Fecha:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("d-m-Y", strtotime($asesoria->fecha_inicio)); }} al {{date("d-m-Y", strtotime($asesoria->fecha_fin));}}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('organizacion', 'Especialidad:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->especialidades->especialidad}}</p></dd>
           </div>

           <div class="form-group">
               <dt class="text-left">{{ Form::label('actividad', 'Proyecto:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->proyecto->nombre}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-4">
         <div class="dl-vertical">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('hora_inicio', 'Hora:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{date("g:i a", strtotime($asesoria->hora_inicio));}} a {{date("g:i a", strtotime($asesoria->hora_fin));}}</p></dd>
           </div>
            <div class="form-group">
               <dt class="text-left">{{ Form::label('fecha_inicio', 'Estado:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{ $asesoria->estado }}</p></dd>
           </div>
           <div class="form-group">
               <dt class="text-left">{{ Form::label('organizacion', 'Actividad:', array('class' => 'control-label')) }}</dt>
                   <dd><p>{{$asesoria->actividad()->nombre}}</p></dd>
           </div>
         </div>
      </div>
      <div class="col-xs-12">
           <div class="form-group">
               <dt class="text-left">{{ Form::label('detalle_asesoria', 'Detalle:', array('class' => 'control-label')) }}</dt>

                  <dd><p class="text-justify">{{$asesoria->detalle}}</p></dd>
           </div>
      </div>
   </div>
</div>

@stop
