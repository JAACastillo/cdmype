<br>
{{ Form::model($ampliacion, array('route' => array('atAmpliacion', $id), 'method' => 'POST', 'id' => 'validar2', 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading"> <a href="#" class="btn btn-primary ampliacion" id="cambiar"><span class="glyphicon glyphicon-chevron-left"></span> &nbsp Cancelar </a></div>
        
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('fecha', 'Fecha:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-6">
                                <input type="date" class="form-control" value="{{$ampliacion->fecha}}" name="fecha" >
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('solicitante', 'Solicitante:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-6">
                                {{ Form::select('solicitante', array('' => 'Seleccione una opción', '1' => 'Consultor','2' => 'Empresario'), $ampliacion->solicitante, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('razonamiento', 'Razonamiento:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-6">
                                {{ Form::textarea('razonamiento', $ampliacion->razonamiento, array('placeholder' => 'Razonamiento', 'class' => 'form-control', 'rows' => '3')) }}
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('periodo', 'Periodo:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-6">
                            {{ Form::select('periodo', array('' => 'Seleccione una opción', '1' => 'Días','2' => 'Semanas', '3' => 'Meses'), $ampliacion->periodo, array('class' => 'form-control text-center')) }} 
                        </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tiempo_ampliacion', 'Tiempo:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                {{ Form::number('tiempo_ampliacion', $ampliacion->tiempo_ampliacion, array('class' => 'form-control text-center')) }}
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
                        <button type="submit"class="btn btn-primary ladda-button" data-style="expand-right">
                        <span class="glyphicon glyphicon-floppy-disk">&nbsp</span>
                         Guardar
                        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                        </button>
                        </center>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>


{{Form::close()}}
