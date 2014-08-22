@extends('menu')

@section('escritorio')

@include('clientes.empresas/pasos')

<div>
<br/>

@include('errores', array('errors' => $errors))
{{ Form::model($proyecto, $accion) }}


    {{Form::hidden('empresa_id', null)}}

<div class="row">
        @if(isset($imprimir))
            <div class="panel-heading">
                <a href="{{route('f1PDF', $proyecto->empresa_id)}}" target="_blank">Imprimir F1</a>
            </div>
        @endif
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre de Proyecto:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{Form::text('nombre', null, array('class' => 'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{Form::textarea('descripcion', null, array('class' => 'form-control', 'rows' => '2'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('meta', 'Meta propuesta:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{Form::text('meta', null, array('class' => 'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fechaInicio', 'Fecha Inicio:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="date" name="fechaInicio" class="form-control"  value="{{$proyecto->fechaInicio}}">
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fechaFin', 'Fecha Fin:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                <input type="date" name="fechaFin" class="form-control"  value="{{$proyecto->fechaFin}}">
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
                            {{ Form::label('indicadores', 'Indicadores del Proyecto:', array('class' => 'control-label col-md-3')) }}
                            <div class="col-md-9">
                            {{ Form::select('indicadores[]', $indicadores, $proyecto->indicador, array('class' => 'chosen-select form-control ', 'multiple' => 'true', 'data-placeholder' => 'Indicadores Proyecto' )) }}
                            </div>
                        </div>                     
                        <div class="form-group">
                            {{ Form::label('actividades', 'Actividades:', array('class' => 'control-label col-md-3')) }} 
                            <a id="addActividad" class="btn btn-primary pull-left"> + </a>
                            <div class="col-md-12 productos">
                            <div class="row">
                            	<div class="col-md-5">
		                       		{{ Form::text('activities[0]', null,  array('class' => 'form-control ', 'placeholder' => 'Nombre de producto' )) }}
                            	</div>
                            	<div class="col-md-3">
                            		{{Form::select('encargado[]', array('Asesor', 'Cliente', 'Consultor', 'Docente', 'Alumnos'), 'Asesor', array('class' => 'form-control'))}}
                            	</div>
                            	<div class="col-md-4">
                            		<input type="date" name="fecha[]" class="form-control">
                            	</div>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
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
	
	var num=1;
    $('#addActividad').on('click', function(){

    	var caja = "<div class='row'> <div class='col-md-5'>"
    	//caja += "	{{ Form::text('actividades[]', null,  array('class' => 'form-control ', 'placeholder' => 'Actividad a desarrollar' )) }}"
    	caja += "<input type='text' name='activities["+num+"]' class='form-control' placeholder='Actividad a desarrollar'> "
    	caja += "</div>"
    	caja += "<div class='col-md-3'>"
    	//caja += "	{{Form::select('encargado', array('Asesor', 'Cliente', 'Consultor', 'Docente', 'Alumnos'), 'Asesor', array('class' => 'form-control'))}}"
    	caja += "<select class='form-control' name='encargado[]'><option value='0'>Asesor</option><option value='1'>Cliente</option><option value='2'>Consultor</option><option value='3'>Docente</option><option value='4'>Alumnos</option></select>"
    	caja += "</div>"
    	caja += "<div class='col-md-4'>"
    	caja += "	<input type='date' name='fecha[]' class='form-control'>"
    		caja += "</div>"
    	caja += "</div>"
		$('.productos').appendPolyfill(caja)
		num++;
    })

</script>

@stop