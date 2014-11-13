
<br>
<div class="row" ng-controller="asesoriaController">
   <div class="col-md-6">
      <div class="form-group">
          {{ Form::label('estado', 'Estado:', array('class' => 'control-label col-md-4')) }}
          <div class="col-md-8">
              {{ Form::select('estado', array('1' => 'Programada','2' => 'Completada', '3' => 'Cancelada'), $asesoria->estado, array('class' => 'form-control')) }}
          </div>
      </div>
      <div class="form-group">
          {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label col-md-4')) }}
          <div class="col-md-8">
              {{ Form::select('tipo', array(1 => 'Seguimiento', 2 => 'Inicial'), $asesoria->tipo, array('class' => 'form-control')) }}
          </div>
      </div>

      <div class="form-group">
          {{ Form::label('especialidad', 'Especialidad:', array('class' => 'control-label col-md-4 ')) }}
          <div class="col-md-8">
              {{ Form::select('especialidad', $especialidades, $asesoria->especialidad, array('class' => 'form-control')) }}
          </div>
      </div>
   </div>
   <div class="col-md-6">

      <div class="form-group">
            {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}

                  {{ Form::label('empresa_id', 'Empresa:', array('class' => 'control-label col-md-3')) }}
                  <div class="col-md-7">
                    {{ Form::text('empresa', null, array('placeholder' => 'Nombre de la empresa', 'class' => 'form-control getEmpresa', 'id' => 'empresa', 'data-url' => 'empresa', 'ng-model' => 'empresarios', 'ng-blur' => 'loadProyectos()')) }}

                      {{ Form::hidden('empresa_id', null, array('ng-change' => 'loadProyectos()', 'ng-model' => 'empresarioID')) }}
                  </div>
                  {{Form::hidden('pr',$asesoria->proyecto_id, array('id' => 'proyecto', 'ng-model' => 'proyectoID'))}}
                  {{Form::hidden('ir',$asesoria->actividad, array('id' => 'activity'))}}
            {{ Form::close() }}

      </div>

      <div class="form-group">

          {{ Form::label('proyecto', 'Proyecto:', array('class' => 'control-label col-md-3')) }}
          <div class="col-md-7">
              <select name="proyecto_id" class="form-control" ng-change="loadActividades()" ng-model ="proyectoID" ng-selected="true">
                <option value="@{{proyecto.id}}" ng-repeat="proyecto in proyectos" class="selected" >
                    @{{proyecto.name}}
                </option>
              </select>
          </div>
      </div>
      <div class="form-group">
          {{ Form::label('actividad', 'Actividad:', array('class' => 'control-label col-md-3')) }}
          <div class="col-md-7">
               <select name="actividad" class="form-control">
                <option value="@{{actividad.id}}" ng-repeat="actividad in actividades" ng-selected="true">
                    @{{actividad.name}}
                </option>
              </select>
          </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
        {{ Form::label('detalle', 'Detalle:', array('class' => 'control-label col-md-2')) }}
        <div class="col-md-9">
            {{ Form::textarea('detalle', $asesoria->detalle, array('placeholder' => 'Detalle', 'rows' => '3', 'class' => 'form-control previsualizar')) }}
        </div>
       </div>
   </div>
</div>
