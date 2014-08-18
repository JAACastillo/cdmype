@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')

<br/>
{{ Form::model($asistencia, array('route' => 'capPasoGuardarAsistencia', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="#" class="btn btn-primary {{$oculto}} agregar cambiar"><span class="glyphicon glyphicon-plus"></span> &nbsp Convocar</a>
				<a href="#" class="btn btn-primary {{$visible}} agregar cambiar"><span class="glyphicon glyphicon-list"></span></span> &nbsp Convocados</a>
				<a href="{{route('capAsistenciaPdf', $id)}}" target="_blank" class="btn btn-primary pull-right {{$oculto}} ver" style="margin-top:-6px"><span class="glyphicon glyphicon-print"></span> &nbsp PDF</a>
			    <a  href="#" class="btn btn-primary btn1 {{$visible}} pull-right agregar" style="margin-top:-6px">
	        	<span class="glyphicon glyphicon glyphicon-plus"></span>
	        	</a>
			</div>
			<div class="panel-body">

			<div class="{{$visible}} agregar">
				<div class="row">
					
				        <div class="form-group">
				        	{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
					        {{ Form::label('empresario_id', 'Empresario:', array('class' => 'control-label col-md-4')) }}
					        <div class="col-md-6 inner">
					            {{ Form::text('empresario', null, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario', 'autofocus')) }}
					            {{ Form::hidden('empresario_id[]', null, array('class' => 'empresario_id')) }}
					        </div>
					        {{ Form::close() }}
					    </div>
			            {{ Form::hidden('captermino_id', $id) }}
	    		</div>
	    			<br/>
	    			<br/>
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
			        	Agregar
			        	<span class="glyphicon glyphicon-chevron-right"></span>
			        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
			        	</button>
				        </center>
				    </div>
				</div>
				<br/>
{{ Form::close() }}	
			</div>
		
			<div class="{{$oculto}} ver">
{{ Form::model($asistencia, array('route' => 'capPasoActualizarAsistencia', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
				<!-- Tabla de Socios -->
		            <div class="col-xs-1"></div>
		            <div class="col-xs-10">
		            	<?php
    		        		$asistencias = Asistencia::Where('captermino_id', '=', $id)->get();
                		?>
                		@if ($asistencias != "[]")
		            	<div class="table-responsive">
					        <table class="table table-bordered">
					            <tr class="active">
					                <th class="text-center">Nombre</th>
					                <th class="text-center">Empresa</th>
					                <th class="text-center">Teléfono</th>
					                <th class="text-center">Asistio</th>
					            </tr>

					            @foreach ($asistencias as $asistencia)
					            <tr>
					                <td>{{ $asistencia->empresario->nombre}}</td>
					                <td class="text-center">
										@foreach($asistencia->empresario->empresa as $empresario)
                    					{{ $empresario->empresas->nombre }}
                						@endforeach
					                </td>
					                <td class="text-center">{{ $asistencia->empresario->telefono}}</td>
					                <td class="text-center">
								@if ($asistencia->asistio == "Si")
									<input name="asistencias[]" type="checkbox" data-content="Seleccionar" value="{{$asistencia->id}}" checked >
								@else
									<input name="asistencias[]" type="checkbox" data-content="Seleccionar" value="{{$asistencia->id}}" >
								@endif
				                    
				                	</td>
					            </tr>
					            @endforeach

					        </table>
					    </div>

					    <br/>
					    <div class="row">
						    <div class="col-xs-6">
						        
						    </div>
						    <div class="col-xs-6">
						        <center>
						        <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
					        	Guardar
					        	<span class="glyphicon glyphicon-chevron-right"></span>
					        	<span class="ladda-spinner"></span><span class="ladda-spinner"></span>
					        	</button>
						        </center>
						    </div>
						</div>
						@else
					    <div class="col-xs-12"><h4 class="text-center">Ningun empresario convocado</h4></div>
					    @endif
						<br/>


		            </div>
		            <div class="col-xs-1"></div>
{{ Form::close() }}
			</div>

		</div>
	</div>

	<div class="col-xs-1"></div>
</div>

@stop


@section('script')

	<script>

	$(document).ready(function(){

	var servidor = "http://localhost/atcdmype";
    var _servidor1 = servidor + '/api/';
    var idNum = 1;

  	$(".btn1").click(function(){

  	  var html = "<input type='text' style='margin-bottom:5px' name='empresario' class='form-control getEmpresario" + idNum + "' data-url = 'empresario'>"
  	  	  html += "<input type='hidden' name='empresario_id[]' class='idEmpresario" + idNum + "'>" 

    $(".inner").prepend(html);

   	idEmpresarios = ($('.idEmpresario' + idNum))

    idsEmpresarios = ($(".empresario_id" + idNum))
    $('.getEmpresario'+ idNum).autocompletar(
                { 
                    hd: $(idEmpresarios) ,
                    sv: _servidor1
                });

  	idNum++;
   
  	});

    idsEmpresarios = ($('.empresario_id'))
    $('.getEmpresario').autocompletar(
                { 
                    hd: $(idsEmpresarios[0]) ,
                    sv: _servidor1
                });
	});

	$('.cambiar').on('click', function(){
		$('.agregar').toggle();
		$('.ver').toggle();
		$('#btn1').toggle();
	})

	</script>

@stop