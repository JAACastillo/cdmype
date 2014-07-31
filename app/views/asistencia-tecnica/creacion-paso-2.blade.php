@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-1">Paso 2<br/> <strong>TDR</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 3<br/> <strong>Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 4<br/> <strong>Envio de Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-2">Paso 5<br/> <strong>Agregar Oferta</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 6<br/> <strong>Selección del Consultor</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 7<br/> <strong>Contrato</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default col-xs-1">Paso 8<br/> <strong>Acta</strong></button>
	</div>
</div>

<br/>



@include('errores', array('errors' => $errors))


{{ Form::model($attermino, $accion) }}

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"> 
                        <div class="form-group">
                     		{{ Form::label('tema', '* Tema:', array('class' => 'control-label col-md-4')) }}
                    		<div class="col-md-8">
                        	{{ Form::text('tema', null, array('placeholder' => 'Tema de la Asistencia Técnica', 'class' => 'form-control')) }}
	                		</div>
	                	</div>
		                <div class="form-group">
		                    {{ Form::label('obj_general', '* Objetivo General:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('obj_general', null, array('placeholder' => 'Objetivo General', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('obj_especifico', '* Objetivo Especifico:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('obj_especifico', null, array('placeholder' => 'Objetivo Especifico', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('productos', '* Productos:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
		                        {{ Form::textarea('productos', null, array('placeholder' => 'Productos Esperados', 'rows' => '2', 'class' => 'form-control')) }}
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-8">
                            {{ Form::select('especialidad_id', $especialidades, $attermino->especialidad_id, array('class' => 'form-control')) }} 
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
	                    {{ Form::label('fecha', '* Fecha límite de oferta:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-6">
	                        {{ Form::date('fecha', $attermino->fecha,  array('class' => 'form-control', 'today' => 'true')) }}
	                        {{$attermino->fecha}}
	                    </div>
	                </div>
	                <div class="form-group">
	                    {{ Form::label('trabajo_local', '* Trabajo Local:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
						    <div class="input-group">
	                        	{{ Form::number('trabajo_local', $attermino->trabajo_local, array('class' => 'form-control text-center', 'min' => '1', 'max' => '100', 'step' => '1.0', 'placeholder' =>'%')) }}
	                    		
						      <div class="input-group-addon">%</div>
	                    	</div>
	                    </div>
	                </div>
	                <div class="form-group">
                 		{{ Form::label('tiempo_ejecucion', 'Tiempo de Ejecucion:', array('class' => 'control-label col-md-4')) }}
                		<div class="col-md-4">
                			<div class="input-group"> 
                    			{{ Form::number('tiempo_ejecucion', $attermino->tiempo_ejecucion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'Horas')) }}
						      <div class="input-group-addon">Horas</div>
                			</div>
                		</div>
                	</div>
	                <div class="form-group">
	                    {{ Form::label('financiamiento', '* Financiamiento de CDMYPE:', array('class' => 'control-label col-md-4')) }}
	                    <div class="col-md-4">
						    <div class="input-group">
						    	<div class="input-group-addon">$</div>
                    			{{ Form::number('financiamiento', $attermino->financiamiento, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1.0', 'placeholder' =>'Horas')) }}
                			</div>
	                    </div>
	                </div>
	                <div class="form-group">
	                     {{ Form::label('aporte', '* Aporte del Empresario:', array('class' => 'control-label col-md-4')) }}
	                   <div class="col-md-4">
						    <div class="input-group">
	                        	{{ Form::number('aporte', $attermino->aporte, array('class' => 'form-control text-center', 'min' => '1', 'max' => '100', 'step' => '1.0', 'placeholder' =>'%')) }}
						      <div class="input-group-addon">%</div>
	                    	</div>
	                    </div>
	                </div>

	                {{ Form::text('empresa_id', null, array('id' => 'empresa_id')) }}
	                {{ Form::text('empresario_id', null, array('id' => 'empresario_id')) }}
					{{-- 
	                {{ Form::hidden('usuario_id', $usuario_id, array('id' => 'usuario_id')) }}
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