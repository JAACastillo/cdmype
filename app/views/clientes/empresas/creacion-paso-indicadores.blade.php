@extends('menu')

@section('escritorio')

@include('clientes.empresas/pasos')

<div>
<br/>
{{ Form::model($indicador, array('route' => 'empresaPasoIndicadores', 'method' => 'POST', 'class' => 'form-horizontal','role' => 'form')) }}
@include('errores', array('errors' => $errors))
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('fechaInicio', 'Fecha Inicio Operaciones:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="date" name="fechaInicio" class="form-control" data-date='{"startView": 2, "openOnFocus": true}'>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('contabilidadFormal', 'Contabilidad Formal:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="checkbox" name="contabilidadFormal">
                            </div>
                        </div>
		                <div class="form-group">
		                    {{ Form::label('ventaNacional', 'Venta Nacional:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">$</div>
		                        	{{ Form::number('ventaNacional', $indicador->ventaNacional, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
		                    		
		                    	</div>
		                    </div>
		                </div>
		                <div class="form-group">
		                    {{ Form::label('ventaExportacion', 'Venta Nacional:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">$</div>
		                        	{{ Form::number('ventaExportacion', $indicador->ventaExportacion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
		                    		
		                    	</div>
		                    </div>
		                </div>
                        <div class="form-group">
                            {{ Form::label('clasificacion', 'Clasificacion:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('clasificacion', array('' => '','1' => 'Emprendedor','2' => 'Micro-empresa','3' => 'Micro-empresa de Subsistencia','4' => 'Grupo Asociativo Empresas','5' => 'No Definido'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('sector_economico', 'Sector Económico:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('sector_economico', array('' => '','1' => 'Artesanias','2' => 'Agroindustrias Alimentaria','3' => 'Calzado','4' => 'Comercio','5' => 'Construcción','5' => 'Química Farmaceutica','6' => 'Tecnología de Información y Comunicación','7' => 'Textiles y Confección','8' => 'Turismo','9' => 'Otros'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('constitucion', 'Constitución:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('constitucion', array('' => '','1' => 'Informal Natural','2' => 'Formal Natural','3' => 'Formal Jurídica'), null, array('class' => 'form-control')) }}
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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('script')

<script type="text/javascript">
	
$('.busqueda').on('click', function(){
	$('.buscar').toggle("blind");
	$('#empresario').toggle("blind")	
})

</script>
@stop