<div class="row">
   <div class="col-md-5 col-md-offset-1">
      <div class="form-group">
         {{ Form::text('titulo', null, array('placeholder' => 'Titulo de Actividad', 'class' => 'form-control', 'autofocus')) }}
      </div>
   </div>
   <div class="col-md-5">
      <div class="form-group">
          {{ Form::select('municipio_id', $municipios, $municipio, array('class' => 'form-control chosen-select')) }}
      </div>
   </div>
   <div class="form-group">
       <div class="col-md-3 col-md-offset-1">
           <input name="fecha_inicio" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$fecha_inicio}}" class="form-control" />
       </div>
   </div>
   <div class="form-group">
       <div class="col-md-2">
        <input name="hora_inicio" type="time" value="{{$hora_inicio}}" class="form-control" />
       </div>
   </div>
   <div class="form-group">
       <div class="col-md-2">
        <input name="hora_fin" type="time" value="{{$hora_fin}}" class="form-control" />
       </div>
   </div>
   <div class="form-group">
       <div class="col-md-3">
           <input name="fecha_fin" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$fecha_fin}}" class="form-control" />
       </div>
   </div>
</div>
