
@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones/pasos')

<br/>

{{ Form::model($captermino, $accion) }}
@include('errores', array('errors' => $errors))
<div class="row animated fadeIn">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"> 
                        <div class="form-group">
		                     {{ Form::label('encabezado', 'Encabezado:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('encabezado', null, array('placeholder' => 'Encabezado', 'class' => 'form-control','autofocus')) }}        
		                    </div>
		                </div>
		                <div class="form-group">
		                     {{ Form::label('tema', 'Tema:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('tema', null, array('placeholder' => 'Tema de Capacitación', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('categoria', 'Categoria:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::select('categoria', array(
		                                              '' => '',
		                                              '1' => 'Emprendedoras y empresarias de los Departamentos de Cabañas, Cuscatlán y San Vicente.',
		                                              '2' => 'Empresarios de los departamentos de Cabañas, Cuscatlán y San Vicente.'), null, array('class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripción de la Empresa/Grupo', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('obj_eneral', 'Objetivo General:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('obj_general', null, array('placeholder' => 'Objetivo General', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('obj_especifico', 'Objetivo Especifico:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('obj_especifico', null, array('placeholder' => 'Objetivo Especifico', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('lugar', 'Lugar:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('lugar', null, array('placeholder' => 'Lugar de  la  capacitación', 'class' => 'form-control')) }}
		                    </div>                
		                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="col-xs-12 col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                	<div class="form-group">
		                    {{ Form::label('productos', 'Productos Esperados:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('productos', null, array('placeholder' => 'Productos Esperados', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>                
		            </div>
                    
	                <div class="form-group">
	                    {{ Form::label('fecha', 'Fecha:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        <input name="fecha" type="date" value="{{$captermino->fecha}}" class="form-control" />
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('fecha_lim', 'Fecha limite:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        <input name="fecha_lim" type="date" value="{{$captermino->fecha_lim}}" class="form-control" />
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('hora_ini', 'Hora de inicio:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::time('hora_ini', $captermino->hora_ini, array('class' => 'form-control hora')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('hora_fin', 'Hora de finalización:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::time('hora_fin', $captermino->hora_fin, array('class' => 'form-control hora')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('nota', 'Nota:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::textarea('nota', null, array('placeholder' => 'Nota (opcional)', 'rows' => '2', 'class' => 'form-control')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
		                {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
                            {{ Form::select('especialidad_id', $especialidades, $captermino->especialidad_id, array('class' => 'form-control')) }} 
                        	</div>
		            </div>
                </div>
            </div>
        </div>
    </div>
	</div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
				        <center>
				        <a href="javascript:history.back()">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				         Anterior
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				        <center>
				        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
				        Siguiente
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </button>
				        </center>
				    </div>    		
    		</div>
        </div>
    </div>
</div>

{{ Form::close() }}


@section("script")
@include('validaciones.capacitaciones')
@stop
@stop