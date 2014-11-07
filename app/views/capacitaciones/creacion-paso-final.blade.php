@extends('menu')

@section('escritorio')

@include('capacitaciones/pasos')
<br/>


<div class="row animated fadeIn">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
  <div class="panel panel-default">
    <div class="panel-body">

    {{ Form::model($captermino, array('route' => array('capPasoInformeGuardar', $id), 'files' => 'true', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) }}

      <div class="row">
        <div class="col-xs-12">
          <br><br>
          <div class="row">
            <center>
                    <a class="btn btn-default" href="{{route('pdfCap', $captermino->id)}}" data-toggle="tooltip" data-placement="bottom" title="Imprimir F1" target="_blank"> <span class="glyphicon glyphicon-print"></span>&nbsp TDR</a>
                    <br>
                    <br>
                    <a class="btn btn-success" href="{{route('capContradoPdf', $capcontrato->id)}}" target="_blank">
                      <span class="glyphicon glyphicon glyphicon-print"></span>&nbsp
                      Contrato
                    </a>
                    <br><br>
            </center>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                @if ($captermino->informe=="")
                {{ Form::label('informe', 'Informe:', array('class' => 'control-label col-md-2')) }}
                <div class="col-md-10">
                  <input type="file" id="captermino->id" name="informe[]">
                </div>
                @else
                  <center>
                    <a href="{{route('CapInforme', $captermino->informe)}}" target="_blank" class="btn btn-primary">
                      <span class="glyphicon glyphicon glyphicon-print"></span>&nbsp
                      Informe
                    </a>
                  </center>
                @endif
              </div><br/><br>
            </div>
          </div>
        </div>
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
              <div class="progress-demo">
                <button type="submit" tabindex="11" class="btn btn-primary ladda-button" data-style="expand-right">
                Siguiente &nbsp
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
                </button>
            </div>
              </center>
        </div>
      </div>
    {{ Form::close() }}
    </div>
  </div>
  </div>
  <div class="col-xs-1"></div>
</div>

@stop

@stop
