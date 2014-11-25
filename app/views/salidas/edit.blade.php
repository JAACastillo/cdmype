@extends('plantillas.plantilla')
@section('contenido')

{{ Form::model($salida, array('route' => array('salidas.update', $salida->id), 'method' => 'PATCH','id' => 'validar', 'class' => 'form-horizontal', 'role' => 'form')) }}


@include('salidas.form')


{{ Form::close() }}


@section("script")

@include('validaciones.salidas')

@stop

@stop
