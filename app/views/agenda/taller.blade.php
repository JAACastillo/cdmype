<br>
<div class="row">
   <div class="col-md-12">
      <div class="form-group">
          {{ Form::label('tipoTaller', 'Tipo de Actividad:', array('class' => 'control-label col-md-5')) }}
          <div class="col-md-4">
              {{ Form::select('tipoTaller', array('' => 'Seleccione el estado','1' => 'Mujer','2' => 'Hombre'), null, array('class' => 'form-control')) }}
          </div>
      </div>
   </div>
</div>
