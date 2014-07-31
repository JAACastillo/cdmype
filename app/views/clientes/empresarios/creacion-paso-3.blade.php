@extends('menu')

@section('escritorio')

<div class="row">
    <div class="btn-group col-xs-12">
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 1<br/> <strong>Empresario</strong></button>
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 2<br/> <strong>Empresa</strong></button>
          <button type="button" class="active btn btn-primary col-xs-3">Paso 3<br/> <strong>Socios</strong></button>
          <button type="button" disabled="disabled" class="btn btn-default col-xs-3">Paso 4<br/> <strong>TDR</strong></button>
    </div>
</div>

<br/>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="panel panel-default">
			<div class="panel-body">
			<br/>
			<br/>
			{{ Form::open(array('url' => '/buscar', 'method' => 'post', 'role' => 'search')) }}
			
			<div class="row">
		        <div class="form-group">
			        <label for="empresario" class="control-label col-xs-12 col-sm-12 col-md-3 text-right">* Empresario: </label>
			        <div class="col-md-8">
			            <input name="empresario" type="text" class="form-control" value="" autofocus="autofocus" tabindex="1" placeholder="Nombre del Empresario">
			        </div>    
			    </div>
			</div>
			{{ Form::close() }}
			<br/>
			<br/>
			<br/>
			<br/>

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
				        <a href="tdr" tabindex="11" class="btn btn-danger">
				        Siguiente
				        <span class="glyphicon glyphicon-chevron-right"></span>
				        </a>
				        </center>
				    </div>
			</div>
			
		</div>
	</div>
	<div class="col-xs-2"></div>
</div>

@stop