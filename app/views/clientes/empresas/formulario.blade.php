@extends('plantillas.formulario')

@section('cabecera')
    Empresa
@stop
@section('url')
    <li><a href="{{ route('empresas.index') }}">Empresas</a></li>
@stop
@section('nombre')
    {{$empresa->nombre}}
@stop

@section ('formulario')

{{ Form::model($empresa, array('route' => array('actualizarEmpresa', $empresa->id), 'id' => 'validar', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) }}
@include('errores', array('errors' => $errors))

@include('clientes/empresas/form')

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <center>
                        <a href="javascript:history.back()">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                         Cancelar
                        </a>
                        </center>
                    </div>
                    <div class="col-xs-6">
                        <center>
                        <button type="submit"class="btn btn-primary ladda-button" data-style="expand-right">
                        <span class="glyphicon glyphicon-floppy-disk">&nbsp</span>
                         Guardar
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

@section('script')
@include('validaciones.empresas')
@stop

@stop