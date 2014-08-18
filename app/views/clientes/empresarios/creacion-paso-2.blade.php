@extends('menu')

@section('escritorio')

@include('clientes.empresarios/pasos')

<br/>
{{ Form::model($empresaEmpresario, array('route' => 'pasoGuardarEmpresa', 'method' => 'POST', 'id' => 'empr-form', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#" tabindex="11" class="btn btn-default busqueda" id="crearEmpresario">
			        <span class="glyphicon glyphicon-user"></span>
			        Crear				        
			    </a>		
			</div>
			<div class="panel-body">		
			<div class="row">
				<div class="row visible col-xs-12 buscar" >
				<br/>
					<div class="col-xs-12">
			        {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			        
			        <div class="form-group">
				        {{ Form::label('empresa_id', 'Nombre:', array('class' => 'control-label col-md-4')) }}
				        <div class="col-md-6">
				            {{ Form::text('empresa', null, array('placeholder' => 'Nombre de la Empresa o Grupo', 'class' => 'form-control getEmpresa', 'data-url' => 'empresa')) }}
				            {{ Form::hidden('empresa_id', null) }}
				        </div>
				    </div>
					
					{{ Form::close() }}

					<div class="form-group">
		                {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label col-md-4')) }}
		                <div class="col-md-6">
		                    {{ Form::select('tipo', array('' => '','1' => 'Empresario','2' => 'Empresaria','3' => 'Propietario','4' => 'Propietaria','5' => 'Representante'), null, array('class' => 'form-control', 'data-placeholder' => 'Seleccione un tipo')) }}  
		                </div>
		            </div>

		            	{{ Form::hidden('empresario_id', $empresaEmpresario->empresario_id) }}
	            	</div>

	            	<!-- Tabla de Socios -->
		            <div class="col-xs-1"></div>
		            <div class="col-xs-10">
		            	<?php
    		        		$empresas = EmpresaEmpresario::Where('empresario_id', '=', $id)->get();
                		?>
                		@if($empresas!="[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					            </tr>

					            @foreach ($empresas as $empresa)
					            <tr>
					                <td class="text-center">{{ $empresa->empresas->nombre}}</td>
					            </tr>
					            @endforeach

					        </table>
					    </div>
					    @endif

		            </div>
		            <div class="col-xs-1"></div>
            
            	</div>

	<div id="empresario" class="oculto empresario">
    	        <?php
    		       $empresa = new Empresa;

		            $departamentos = Departamento::all()->lists('departamento', 'id');
		            $municipios = Municipio::all()->lists('municipio', 'id');
                ?>
            	{{Form::open()}}

               	@include('clientes/empresas/form')

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
			<div class="row buscar">
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
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </button>
				        </center>
				    </div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="col-xs-1"></div>
</div>

@stop


@section('script')

<script type="text/javascript">
	
$('.busqueda').on('click', function(){
	$('#empresario').toggle("blind");
	$('.buscar').toggle("blind")
})

</script>
@stop