@extends('plantillas.formulario')

@section('cabecera')
    Salidas
@stop

<?php
    if ($salida->exists):
        $formulario = array('route' => array('salidas.update', $salida->id), 'method' => 'PATCH','id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Editar';

    else:
        $formulario = array('route' => 'salidas.store', 'method' => 'POST', 'id' => 'validar', 'class' => 'form-horizontal');
        $action = 'Crear';
        $nombre = 'Creación';
    endif;
?>

@section('url')
    <li><a href="{{ url('salidas') }}">Salidas</a></li>
@stop

@section('formulario')

{{ Form::model($salida, $formulario, array('role' => 'form')) }}

    @include('salidas.form')

{{ Form::close() }}


@section("script")

@include('validaciones.salidas')

@stop

@stop
