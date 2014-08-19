@extends('menu')

@section('escritorio')

@include('clientes.empresarios/pasos')

<br/>
{{ Form::model($empresaEmpresario, array('route' => 'pasoGuardarSocios', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal','role' => 'form')) }}

@include('errores', array('errors' => $errors))

<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" tabindex="11" class="btn btn-default busqueda resetBtn" id="crearEmpresario">
		        <span class="glyphicon glyphicon-user"></span>
		        Crear				        
		    </a>		
		</div>
			<div class="panel-body">	

				<div class="row visible col-xs-12 buscar" >
					<div class="col-xs-12">
					    <br/>
				        {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
				        
				        <div class="form-group">
					        {{ Form::label('empresario_id', 'Nombre:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-6">
					        	{{ Form::text('empresario', null, array('placeholder' => 'Nombre del Empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario')) }}

					            {{ Form::hidden('empresario_id', null) }}
					        </div>
					    </div>
						
						{{ Form::close() }}

						<div class="form-group">
			                {{ Form::label('tipo', 'Tipo:', array('class' => 'control-label col-md-4')) }}
			                <div class="col-md-6">
			                    {{ Form::select('tipo', array('' => '','1' => 'Empresario','2' => 'Empresaria','3' => 'Propietario','4' => 'Propietaria','5' => 'Representante'), null, array('class' => 'form-control', 'data-placeholder' => 'Seleccione un tipo')) }} 
			                </div>
			            </div>

		                	{{ Form::hidden('empresa_id', $empresaEmpresario->empresa_id) }}

		            </div>

		            <!-- Tabla de Socios -->
		            <div class="col-xs-1"></div>
		            <div class="col-xs-10">
		            	<?php
    		        		$empleados = EmpresaEmpresario::Where('empresa_id', '=', $empresaEmpresario->empresa_id)->get();
                		?>
                		@if($empleados!="[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					                <th class="text-center">Tipo</th>
					            </tr>

					            @foreach ($empleados as $empleado)
					            <tr>
					                <td class="text-center">{{ $empleado->empresarios->nombre}}</td>
					                <td class="text-center">{{ $empleado->tipo }}</td>
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

			<div class="row empresario">
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
			<br/>
			{{ Form::close() }}
		</div>
	</div>
	<div class="col-xs-1"></div>
</div>

@stop


@section('script')
@include('validaciones.empresasEmpresarios')
<script type="text/javascript">
	
$('.busqueda').on('click', function(){
	$('#empresario').toggle("blind");
	$('.buscar').toggle("blind")
});
$('.resetBtn').click(function() {
        $('#validar').data('bootstrapValidator').resetForm(true);
});

</script>
@stop