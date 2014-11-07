<br><br>
<div class="row ">
  <div class="alert alert-info col-xs-12">
{{ Form::open(array('url' => '/buscar/buscar', 'method' => 'post', 'id' => 'validador2', 'class' => 'form-horizontal', 'role' => 'search')) }}

<div class="col-md-7">
        {{ Form::text('buscar', null, array('placeholder' => 'Ingrese lo que esta buscando', 'class' => 'form-control buscador2')) }}

</div>
<br>
<div class="col-md-2">
      <select name="tabla" id="inputTabla" class="form-control" required="required">
        <option class="text-center" value="empresas">Seleccione una opción</option>
        <option class="text-center" value="usuarios">Usuario</option>
        <option class="text-center" value="empresas">Empresa</option>
        <option class="text-center" value="material">Material</option>
        <option class="text-center" value="consultores">Consultor</option>
        <option class="text-center" value="terminos">Asistencia Técnica</option>
        <option class="text-center" value="capacitaciones">Capacitación</option>
      </select>
</div>
<br>
<div class="col-md-3">
        <button type="submit"class="btn btn-primary btn-block ladda-button" data-style="zoom-in">
          Buscar
          </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
          </button>
        </div>
</div>       
</div>
{{ Form::close() }}
</div>