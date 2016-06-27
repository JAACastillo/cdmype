
@extends('menu')

@section('escritorio')

<style type="text/css">
   body{
      background-color: #C5C7BC;
      padding-bottom: 0px;
      margin: 0px;
   }
   h2, .page-header{
      margin: 0px 0px 0px 0px;
   }
   .panel{
      margin-top: 2px;
   }
   .nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline;
     zoom:1;
   }
   .nav-tabs, .nav-pills {
       text-align:center;
   }
   #lb_seguimiento{
      margin: -35px 0px ;
   }
</style>


<!-- Cargando angular Js -->
{{ HTML::script('assets/js/angular.min.js') }}
{{ HTML::script('assets/js/calendarioAngular.js') }}

@include('errores', array('errors' => $errors))

{{Form::open()}}
<div class="row" ng-app= "agenda" ng-init="actividadTipo=1" >

   <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-primary">
         <div class="panel-body">
            <div class="page-header">
               <a href="#" class="glyphicon glyphicon-calendar btn btn-primary pull-left"></a>
                 <h2>&nbsp; Calendario</h2>
            </div>
            <br>
            @include('agenda.cabecera')
            <br>
            {{ Form::text('tipoActividad', 1, array('ng-model' => 'actividadTipo', 'class' => 'oculto')) }}
            <div class="row form-horizontal">
               <div class="col-md-12">
               <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                     <a href="#reunion" role="tab" data-toggle="tab" ng-click="actividadTipo=1">
                        <h6 class="glyphicon glyphicon-briefcase icono" ></h6>
                        Asesoría
                     </a>
                    </li>
                    <li role="presentation"><a href="#asesoria" role="tab" data-toggle="tab" ng-click="actividadTipo=2">
                        <h6 class="glyphicon glyphicon-user icono"></h6>
                     Reunión</a>
                     </li>
                    <li role="presentation"><a href="#taller" role="tab" data-toggle="tab" ng-click="actividadTipo=3">
                        <h6 class="glyphicon glyphicon-compressed icono"></h6>
                     Taller</a>
                     </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="asesoria">
                        @include('agenda.reunion')
                    </div>
                    <div role="tabpanel" class="tab-pane in fade active" id="reunion">
                        @include('agenda.asesoria')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="taller">
                        @include('agenda.taller')
                    </div>
                  </div>
               </div>
            </div>

        <input type='hidden' id = "url" value="{{url('/')}}" />
         </div>
         <div class="panel-footer">
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
                    Guardar
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


@stop
