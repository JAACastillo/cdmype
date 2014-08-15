@extends('menu')

@section('titulo')
Capacitaciones
@stop
@section('escritorio')
@include('capacitaciones.pasos')

<br/>

@include('errores', array('errors' => $errors))
<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="panel panel-default">
			<div class="panel-body">		
			<div class="row">
				<div class="col-xs-11">
		           	<a href="#" id="btn1" class="btn btn-primary pull-right btn1"><span class="glyphicon glyphicon-plus"></span></a>
				</div>

		{{ Form::model($asistencia, array('route' => 'capPasoGuardarAsistencia', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
			

			        <div class="form-group">
			        	{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
				        {{ Form::label('empresario_id', 'Empresario:', array('class' => 'control-label col-md-4')) }}
				        <div class="col-md-6 inner">
				            {{ Form::text('empresario', null, array('placeholder' => 'Nombre del empresario', 'class' => 'form-control getEmpresario', 'data-url' => 'empresario')) }}
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
				        <a href="{{ route('capPasoContrato', array($id)) }}" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
				        Siguiente
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
				        </a>
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

<script>

$(document).ready(function(){

	var servidor = "http://localhost/atcdmype";
    var _servidor1 = servidor + '/api/';
    var idNum = 1;

  $(".btn1").click(function(){

  	  var html = "<input type='text' name='empresario' class='form-control getEmpresario" + idNum + "' data-url = 'empresario'>"
  	  	  html += "<input type='hidden' name='empresario_id[]' class='idEmpresario" + idNum + "'>" 

    $(".inner").append(html);

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

</script>

@stop