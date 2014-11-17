@extends('menu')

@section('escritorio')
<style type="text/css"> .page-header{margin-top: 10px;} </style>

<h1 class="page-header">Salidas</h1>

<div class="row">
   {{ Form::open(array('route' => array('salidasPdf'), 'method' => 'POST', 'class' => 'form-inline', 'role' => 'form', 'target' => '_blank')) }}
   <div class="col-md-6 col-md-offset-3">
      <div class="form-group col-md-3">
         <label>Firma:</label>
         <select name="firma" id="inputFirma" class="form-control" required="required">
            <option value="1">Director</option>
            <option value="2">Directora</option>
         </select>
      </div>
      <div class="form-group col-md-3">
         <label>Mes:</label>
         {{ Form::select('mes', $meses, date('m'), ['class' => 'form-control']) }}
      </div>
      <div class="form-group col-md-3">
         <label>Año:</label>
         {{ Form::number('ano', date('Y'), array('class' => 'form-control text-center', 'min' => '2011', 'max' => date('Y'), 'step' => '1', 'placeholder' =>'año')) }}
      </div>
      <div class="form-group col-md-3">
         <label>&nbsp;</label>
         <button type="submit" tabindex="11" class="btn btn-primary btn-block ladda-button" data-style="expand-right">
           <span class="glyphicon glyphicon-print"></span>
           <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
         </button>
      </div>
   </div>
   {{Form::close()}}
</div>

<hr>

@include('salidas.calendario')

@stop
