@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-2">Paso 2<br/> <strong>TDR</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 3<br/> <strong>Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 4<br/> <strong>Envio de Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 5<br/> <strong>Agregar Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 6<br/> <strong>Selección del Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 7<br/> <strong>Contrato</strong></button>
	</div>
</div>

<br/>

{{ Form::model($captermino, array('route' => 'capterminos.store', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form')) }}

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"> 
                        <div class="form-group">
		                     {{ Form::label('encabezado', 'Encabezado:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::text('encabezado', null, array('placeholder' => 'Encabezado', 'class' => 'form-control')) }}        
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
		                                              'Emprendedoras y empresarias de los Departamentos de Cabañas, Cuscatlán y San Vicente.
		                                              ' => 'Emprendedoras y empresarias de los Departamentos de Cabañas, Cuscatlán y San Vicente.',
		                                              'Empresarios de los departamentos de Cabañas, Cuscatlán y San Vicente.
		                                              ' => 'Empresarios de los departamentos de Cabañas, Cuscatlán y San Vicente.'), null, array('class' => 'form-control')) }}
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
	                    {{ Form::label('fecha', 'Fecha de la capacitación *', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::date('fecha', null, array('placeholder' => 'Fecha de la capacitación', 'class' => 'form-control fecha')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('fecha_lim', 'Fecha limite *', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::date('fecha_lim', null, array('placeholder' => 'Fecha limite', 'class' => 'form-control fecha')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('hora_ini', 'Hora de inicio *', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::time('hora_ini', null, array('class' => 'form-control hora')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('hora_fin', 'Hora de finalización *', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::time('hora_fin', null, array('class' => 'form-control hora')) }}
	                    </div>                
	                </div>
	                <div class="form-group">
	                    {{ Form::label('nota', 'Nota', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-8">
	                        {{ Form::textarea('nota', null, array('placeholder' => 'Nota (opcional)', 'rows' => '2', 'class' => 'form-control')) }}
	                    </div>                
	                </div>

					{{-- 
	                {{ Form::hidden('estado', $estado, array('id' => 'estado')) }}
                	{{ Form::hidden('usuario_id', $usuario_id, array('id' => 'usuario_id')) }}
                	{{ Form::hidden('consultor_id', $consultor_id, array('id' => 'consultor_id')) }}
					--}}
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
    			        <br/>
    			        <center>
    			        <a href="javascript:history.back()">
    			        <span class="glyphicon glyphicon-chevron-left"></span>
    			         Anterior
    			        </a>
    			        </center>
    			    </div>
    			    <div class="col-xs-6">
                        <br/>
    			        <center>
    			        <button type="submit" tabindex="11" class="btn btn-danger">
    			        Siguiente
    			        <span class="glyphicon glyphicon-chevron-right"></span>
    			        </button>
    			        </center>
    			    </div>
    			</div>
    		
    		</div>
        </div>
    </div>
</div>

{{ Form::close() }}

@stop