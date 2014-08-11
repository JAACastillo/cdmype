@extends('plantillas.formulario')

@section('cabecera')
    Empresario
@stop

@section ('formulario')

<div class="row col-xs-12">

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->nombre}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('sexo', 'Sexo:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->sexo}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('nit', 'NIT:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->nit}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dui', 'DUI:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->dui}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->municipio->municipio}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->direccion}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('correo', 'Correo Eléctronico:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->correo}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('telefono', 'Teléfono:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->telefono}}</p>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-xs-5 text-right')) }}
            <div class="col-xs-7">
                <p>{{$empresario->celular}}</p>
            </div>
        </div>
</div>

<div class="row">
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="javascript:history.back()">
        <span class="glyphicon glyphicon-chevron-left"></span>
         Volver
        </a>
        </center>
    </div>
    <div class="col-xs-6">
        <br/>
        <center>
        <a href="{{ route('editarEmpresario', array($empresario->id)) }}" tabindex="11" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil"> </span>
         Modificar
        </a>
        </center>

    </div>

</div>

@stop