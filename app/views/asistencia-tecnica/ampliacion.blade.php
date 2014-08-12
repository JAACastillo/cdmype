<br>
{{ Form::model($ampliacion, array('route' => array('atAmpliacion', $id), 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading"> <a href="#" class="btn btn-primary ampliacion" id="cambiar"> Cancelar </a></div>
        
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('fecha', 'fecha:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="date" class="form-control" value="{{$ampliacion->fecha}}" name="fecha" >
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('solicitante', 'Solicitante:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('solicitante', array('1' => 'Consultor','2' => 'Empresario'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tiempo_ampliacion', 'Tiempo:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::number('tiempo_ampliacion', $ampliacion->tiempo_ampliacion, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('periodo', 'Periodo:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::select('periodo', array('1' => 'Días','2' => 'Semanas', '3' => 'Meses'), null, array('class' => 'form-control')) }} 
                        </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('razonamiento', 'Razonamiento:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('razonamiento', $ampliacion->razonamiento, array('placeholder' => 'Razonamiento', 'class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                    <div class="col-xs-6">
                       
                    </div>
                    <div class="col-xs-6">
                        <br/>
                        <center>
                        <button type="submit" tabindex="11" class="btn btn-danger">
                            Guardar
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                        </center>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>


{{Form::close()}}