<br>
<div class="row">
   <div class="col-md-12">
      <div class="form-group">
          {{ Form::label('organizacion', 'Organización:', array('class' => 'control-label col-md-5')) }}
          <div class="col-md-4">
              {{ Form::select('organizacion', array('1' => 'CDMYPE','2' => 'CONAMYPE', '3' => 'Capacitación'), $reunion->organizacion, array('class' => 'form-control')) }}
          </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
        {{ Form::label('detalle_reunion', 'Detalle:', array('class' => 'control-label col-md-3')) }}
        <div class="col-md-7">
            {{ Form::textarea('detalle_reunion', $reunion->detalle, array('placeholder' => 'Detalle', 'rows' => '5', 'class' => 'form-control previsualizar')) }}
        </div>
       </div>
   </div>
</div>
