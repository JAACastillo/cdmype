@extends('menu')

@section('escritorio')

@include('clientes.empresas/pasos')

<div>
<br/>

@include('errores', array('errors' => $errors))
{{ Form::model($indicador, $accion) }}


    {{Form::hidden('empresa_id', null)}}

<div class="row">
        @if($indicador->exists())
            <div class="panel-heading">
                <a href="{{route('f1PDF', $indicador->empresa_id)}}" target="_blank">Imprimir F1</a>
            </div>
        @endif
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('fechaInicio', 'Fecha Inicio Operaciones:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="date" name="fechaInicio" class="form-control" data-date='{"startView": 2, "openOnFocus": true}' value="{{$indicador->fechaInicio}}">
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('contabilidadFormal', 'Contabilidad Formal:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input name="contabilidadFormal" type="checkbox"  value="1" {{($indicador->contabilidadFormal == 1?'checked':'')}}>
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
		                    {{ Form::label('ventaExportacion', 'Venta de Exportación:', array('class' => 'control-label col-md-4')) }}
		                    <div class="col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">$</div>
		                        	{{ Form::number('ventaExportacion', $indicador->ventaExportacion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
		                    		
		                    	</div>
		                    </div>
		                </div>
                        <div class="form-group">
                            {{ Form::label('costoProduccion', 'Costo de Producción:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                    {{ Form::number('costoProduccion', $indicador->costoProduccion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('financiamiento', 'Financiamiento:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                    {{ Form::number('financiamiento', $indicador->financiamiento, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('capitalSemilla', 'Capital Semilla:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                    {{ Form::number('capitalSemilla', $indicador->capitalSemilla, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => 'any')) }}
                                    
                                </div>
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
                            {{ Form::label('empleadosHombreFijo', 'Empleados Hombre:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                <div class="input-group">

                                  <div class="input-group-addon">#</div>
                                    {{ Form::number('empleadosHombreFijo', $indicador->empleadosHombreFijo, array('placeholder' => 'Fijos', 'class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => '1')) }}
                                   
                                    {{ Form::number('empleadosHombreTemp', $indicador->empleadosHombreTemp, array('placeholder' => 'Temporales', 'class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => '1')) }}
                                    
                                </div>
                            </div>
                        </div>                    
                        <div class="form-group">
                            {{ Form::label('empleadosMujerFijo', 'Empleadas:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">#</div>
                                    {{ Form::number('empleadosMujerFijo', $indicador->empleadosMujerFijo, array('placeholder' => 'Fijos', 'class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => '1')) }}
                                    {{ Form::number('empleadosMujerTemp', $indicador->empleadosMujerTemp, array('placeholder' => 'Temporales', 'class' => 'form-control text-center', 'min' => '1', 'max' => '1000000', 'step' => '1')) }}
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            {{ Form::label('mercados', 'Mercados Actuales:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                            {{ Form::select('mercados[]', $mercados, $indicador->merca, array('class' => 'chosen-select form-control ', 'multiple' => 'true', 'data-placeholder' => 'Mercados Actuales' )) }}
                            </div>
                        </div>                    
                        <div class="form-group">
                            {{ Form::label('productos', 'Productos:', array('class' => 'control-label col-md-3')) }} 
                            <a id="addProducto" class="btn btn-primary pull-left"> + </a>
                            <div class="col-md-12 productos">
                            {{ Form::text('productos[]', null,  array('class' => 'form-control ', 'placeholder' => 'Nombre de producto' )) }}

                            @foreach($indicador->productos as $producto)
                                {{ Form::text('productos[]', $producto->nombre,  array('class' => 'form-control ', 'placeholder' => 'Nombre de producto' )) }}
                            @endforeach
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
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
                        Siguiente
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                        </button>
                        </center>
                    </div>          
            </div>
        </div>
    </div>
</div>


{{Form::close()}}
@stop


@section('script')

<script type="text/javascript">
	
    $('.busqueda').on('click', function(){
    	$('.buscar').toggle("blind");
    	$('#empresario').toggle("blind")	
    })

    $('#addProducto').on('click', function(){
        var caja = "<input type='text' class='form-control' name='productos[]' placeholder='Nombre de producto' >"
        $('.productos').prepend(caja)
    })

</script>
@include('validaciones.indicadores')
@stop