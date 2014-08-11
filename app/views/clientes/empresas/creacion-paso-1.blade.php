@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" class="active btn btn-primary col-xs-4">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 2<br/> <strong>Empresario</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 3<br/> <strong>TDR</strong></button>
	</div>
</div>

<br/>
{{ Form::model($empresa, $accion) }}
@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
					    <div class="form-group">
					        {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('registro_iva', 'Registro de IVA:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::text('registro_iva', null, array('placeholder' => 'Registro de Iva', 'class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('categoria', 'Categoría:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::select('categoria', array('' => '','1' => 'Empresa','2' => 'Grupo'), null, array('class' => 'form-control')) }} 
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('constitucion', 'Constitución:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::select('constitucion', array('' => '','1' => 'Informal Natural','2' => 'Formal Natural','3' => 'Formal Jurídica'), null, array('class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('clasificacion', 'Clasificacion:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::select('clasificacion', array('' => '','1' => 'Emprendedor','2' => 'Micro-empresa','3' => 'Micro-empresa de Subsistencia','4' => 'Grupo Asociativo Empresas','5' => 'No Definido'), null, array('class' => 'form-control')) }} 
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('sectorEconomico', 'Sector Económico:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::select('sectorEconomico', array('' => '','1' => 'Artesanias','2' => 'Agroindustrias Alimentaria','3' => 'Calzado','4' => 'Comercio','5' => 'Construcción','5' => 'Química Farmaceutica','6' => 'Tecnología de Información y Comunicación','7' => 'Textiles y Confección','8' => 'Turismo','9' => 'Otros'), null, array('class' => 'form-control')) }} 
					        </div>
					    </div>
					    <br/>
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
	                        {{ Form::label('departamento', 'Departamento:', array('class' => 'control-label col-md-4')) }}
	                        <div class="col-md-8">
	                            {{ Form::select('departamento', $departamentos, null, array('class' => 'form-control')) }} 
	                        </div>
                        </div>
					    <div class="form-group">
					        {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::select('municipio_id', $municipios, null, array('class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '1', 'class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('actividad', 'Actividad Económica:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::textarea('actividad', null, array('placeholder' => 'Actividad Económica', 'rows' => '2', 'class' => 'form-control')) }}
					        </div>
					    </div>
					    <div class="form-group">
					        {{ Form::label('descripcion', 'Descripción de la Empresa:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-8">
					            {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripción de la Empresa', 'rows' => '2', 'class' => 'form-control')) }}
					        </div>
					    </div>
					    <br/>
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
				         Cancelar
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				    	<br/>
				        <center>
				        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
				        Siguiente
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </button>
				        </center>
				    </div>
				</div>
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@stop