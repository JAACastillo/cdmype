@extends('menu')

@section('escritorio')

<div class="row">
	<div class="btn-group col-xs-12">
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 1<br/> <strong>Empresa</strong></button>
		  <button type="button" class="active btn btn-primary col-xs-4">Paso 2<br/> <strong>Empresario</strong></button>
		  <button type="button" disabled="disabled" class="btn btn-default  col-xs-4">Paso 3<br/> <strong>TDR</strong></button>
	</div>
</div>

<div>
<br/>
{{ Form::model($empresaEmpresario, array('route' => 'pasoEmpresariosGuardar', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
		<div class="panel-heading">
			
					<a href="#" tabindex="11" class="btn btn-default busqueda" id="crearEmpresario">
				        <span class="glyphicon glyphicon-user"></span>
				        Crear				        
				    </a>		
		</div>
			<div class="panel-body">	

			<div class="row visible col-xs-11 buscar" >
				<div class="col-xs-11">
				    <br/>
				    <br/>
			        {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			        
			        <div class="form-group">
				        {{ Form::label('empresario_id', 'Nombre:', array('class' => 'control-label col-md-3')) }}
				        <div class="col-md-9">
				        	{{ Form::text('empresario', null, array('placeholder' => 'Nombre del Empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario')) }}

				            {{ Form::hidden('empresario_id', null) }}
				        </div>
				    </div>
					
					{{ Form::close() }}

					<div class="form-group">
		                {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label col-md-3')) }}
		                <div class="col-md-9">
		                    {{ Form::select('tipo', array('' => '','1' => 'Empresario','2' => 'Empresaria','3' => 'Propietario','4' => 'Propietaria','5' => 'Representante'), null, array('class' => 'form-control', 'data-placeholder' => 'Seleccione un tipo')) }} 
		                </div>
		            </div>

	                	{{ Form::hidden('empresa_id', $empresaEmpresario->empresa_id) }}

	            </div>
            </div>

    <div id="empresario" class="oculto empresario">
    	              <?php
    		        $empresario = new Empresario;
    		        
    		        $sexos = array(1 => 'Mujer', 2 => 'Hombre');
    		        $tipos = array(1 => 'Empresaria', 2 => 'Propietaria', 3 => 'Representante', 4 => 'Empresario', 5 => 'Propietario');
    		        $departamentos = Departamento::all()->lists('departamento', 'id');
    		        $municipios = Municipio::all()->lists('municipio', 'id');

    		        $empresario->sexo = array_search($empresario->sexo,$sexos);
    		        $empresario->tipo = array_search($empresario->tipo,$tipos);
    		        $empresario->municipio = array_search($empresario->municipio_id, $municipios);
                ?>
                {{Form::open()}}
               		@include('clientes/empresarios/form')
<br/>
<br/>
			<div class="row empresario">
				    <div class="col-xs-6">
				        <center>
				        <a href="{{ route('empresas.index') }}">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				         Anterior
				        </a>
				        </center>
				    </div>
				    <div class="col-xs-6">
				        <center>
				        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
				        	Guardar
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </button>
				        </center>
				    </div>
			</div>
			{{ Form::close() }}
		</div>
                {{Form::close()}}
    </div>

<br/>
<br/>
			<div class="row buscar">
				    <div class="col-xs-6">
				        <center>
				        <a href="{{ route('empresas.index') }}">
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
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </button>
				        </center>
				    </div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>

@stop


@section('script')

<script type="text/javascript">
	
$('.busqueda').on('click', function(){
	$('#empresario').toggle("swing");
	$('.buscar').toggle("swing")
})

</script>
@stop