@extends('menu')

@section('escritorio')

@include('asistencia-tecnica/pasos')
<br/>


@if($attermino->exists)
   <a class="btn btn-default" href="{{route('pdfAt', $attermino->id)}}" data-toggle="tooltip" data-placement="bottom" title="Imprimir F1" target="_blank"> <span class="glyphicon glyphicon-print"></span>&nbsp TDR</a>
@endif

{{ Form::model($attermino, $accion) }}
<div class="row animated fadeIn">
   <br/>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                           {{ Form::label('tema', 'Tema:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                           {{ Form::textarea('tema', null, array('placeholder' => 'Tema de la Asistencia Técnica', 'rows' => '2', 'class' => 'form-control', 'autofocus')) }}
                        </div>
                     </div>
                      <div class="form-group">
                          {{ Form::label('obj_general', 'Objetivo General:', array('class' => 'control-label col-md-4')) }}
                          <div class="col-md-8">
                              {{ Form::textarea('obj_general', null, array('placeholder' => 'Objetivo General', 'rows' => '3', 'class' => 'form-control previsualizar')) }}
                          </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('obj_especifico', 'Objetivo Especifico:', array('class' => 'control-label col-md-4')) }}
                          <div class="col-md-8">
                              {{ Form::textarea('obj_especifico', null, array('placeholder' => 'Objetivo Especifico', 'rows' => '3', 'class' => 'form-control previsualizar')) }}
                          </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('productos', 'Productos:', array('class' => 'control-label col-md-4')) }}
                          <div class="col-md-8">
                              {{ Form::textarea('productos', null, array('placeholder' => 'Productos Esperados', 'rows' => '3', 'class' => 'form-control previsualizar' )) }}
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
                          {{ Form::label('especialidad_id', 'Especialidad:', array('class' => 'control-label col-md-4')) }}
                          <div class="col-md-8">
                            {{ Form::select('especialidad_id', $especialidades, $attermino->especialidad_id, array('class' => 'chosen-select form-control')) }}
                           </div>
                      </div>
                    <div class="form-group">
                       {{ Form::label('fecha', 'Fecha límite de oferta:', array('class' => 'control-label col-md-4')) }}
                       <div class="col-md-6">
                           <input name="fecha" type="date" data-date='{"startView": 2, "openOnFocus": true}' value="{{$attermino->fecha}}" class="form-control" />
                       </div>
                   </div>
                   <div class="form-group">
                       {{ Form::label('trabajo_local', 'Trabajo Local:', array('class' => 'control-label col-md-4')) }}
                       <div class="col-md-4">
                      <div class="input-group">
                              {{ Form::number('trabajo_local', $attermino->trabajo_local, array('class' => 'form-control text-center', 'min' => '1', 'max' => '100', 'step' => 'any', 'placeholder' =>'%')) }}

                        <div class="input-group-addon">%</div>
                        </div>
                       </div>
                   </div>
                   <div class="form-group">
                     {{ Form::label('tiempo_ejecucion', 'Tiempo de Ejecucion:', array('class' => 'control-label col-md-4')) }}
                     <div class="col-md-4">
                        <div class="input-group">
                           {{ Form::number('tiempo_ejecucion', $attermino->tiempo_ejecucion, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => '1', 'placeholder' =>'Horas')) }}
                        <div class="input-group-addon">Horas</div>
                        </div>
                     </div>
                  </div>
                   <div class="form-group">
                       {{ Form::label('financiamiento', 'Financiamiento de CDMYPE:', array('class' => 'control-label col-md-4')) }}
                       <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon">$</div>
                           {{ Form::number('financiamiento', $attermino->financiamiento, array('class' => 'form-control text-center', 'min' => '1', 'max' => '1000', 'step' => 'any', 'placeholder' =>'Horas')) }}
                        </div>
                       </div>
                   </div>
                   <div class="form-group">
                        {{ Form::label('aporte', 'Aporte del Empresario:', array('class' => 'control-label col-md-4')) }}
                      <div class="col-md-4">
                      <div class="input-group">
                              {{ Form::number('aporte', $attermino->aporte, array('class' => 'form-control text-center', 'min' => '0', 'max' => '100', 'step' => 'any', 'placeholder' =>'%')) }}
                        <div class="input-group-addon">%</div>
                        </div>
                       </div>
                   </div>
                   <br/>
                   {{ Form::hidden('empresa_id', null, array('id' => 'empresa_id')) }}

                   {{-- Form::hidden('empresario_id', null, array('id' => 'empresario_id')) --}}
                </div>

            </div>

        </div>

    </div>
   </div>
</div>

<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-8">
      <div class="form-group">
            {{ Form::label('empresario_id', 'Encargado:', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
          <div class="input-group">
               <select name="empresario_id" id="inputEmpresario_id" class="form-control" required="required">
                  @foreach ($attermino->empresarios as $empresario)
                     @if ($empresario->empresarios->id == $attermino->empresario_id)
                        <option value="{{ $empresario->empresarios->id}}" selected> <h4>{{ $empresario->empresarios->nombre}}</h4> - <small>{{ $empresario->tipo}}</small></option>
                     @else
                        <option value="{{ $empresario->empresarios->id}}"><h4>{{ $empresario->empresarios->nombre}}</h4> - <small>{{ $empresario->tipo}}</small></option>
                     @endif
                  @endforeach
               </select>
            </div>
           </div>
       </div>
      <br>
   <div class="col-md-1"></div>
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

{{ Form::close() }}

@section('script')
@include('validaciones.asistencia')
@stop
@stop
