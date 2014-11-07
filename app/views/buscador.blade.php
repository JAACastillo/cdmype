{{ Form::open(array('url' => '/buscar/buscar', 'method' => 'post', 'id' => 'validador', 'class' => 'navbar-form navbar-left validador', 'role' => 'search')) }}
  <div class="input-group">
    <span class="input-group-addon glyphicon glyphicon-search"></span>
    {{ Form::text('buscar', null, array('placeholder' => 'Buscar', 'class' => 'form-control buscador')) }}
  </div> 
      <div class="btn-group">
        <button type="submit"class="btn btn-primary ladda-button" data-style="expand-right">
        Buscar
        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
        </button>
        <a type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </a>
        <div class="dropdown-menu" role="menu">
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="usuarios" checked>
              &nbsp Usuario
            </label>
          </div>
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="empresas">
              &nbsp Empresa
            </label>
          </div>
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="material">
              &nbsp Material de Asesoría
            </label>
          </div>
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="consultores">
              &nbsp Consultor
            </label>
          </div>
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="terminos">
              &nbsp Asistencia Técnica
            </label>
          </div>
          <div class="radio">
            <label>
              &nbsp &nbsp <input type="radio" name="tabla" value="capacitaciones">
              &nbsp Capacitaciones
            </label>
          </div>
        </div>
      </div>
{{ Form::close() }}