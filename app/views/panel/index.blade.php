@extends('plantillas.plantilla')

@include('menu')
 
@stop



{{ HTML::style('assets/css/sb-admin-2.css', array('media' => 'screen')) }}
{{ HTML::style('assets/css/metisMenu.min.css', array('media' => 'screen')) }}
{{ HTML::style('assets/css/timeline.css', array('media' => 'screen')) }}
{{ HTML::style('assets/css/base.css', array('media' => 'screen')) }}
{{ HTML::style('assets/css/clean.css', array('media' => 'screen')) }}




{{ HTML::script('assets/js/jquery.min.js')}}
{{ HTML::script('assets/js/angular.min.js')}}

{{ HTML::script('assets/js/bouil.chart.js')}}
{{ HTML::script('assets/js/datepicker.js')}}


<section ng-app="panel" ng-controller='panelController'>
    <div id="wrapper">
    	@include('panel.menu')
    </div>
<br/>  

    <div id="page-wrapper">
        <div class="row">
            <!-- <div class="col-lg-1">
                fechasasdfasdfasdf
            </div>
            safasdf -->
            <div class="col-lg-12">
                <h1 class="page-header">@{{estadisticas.asesor.nombre}}. 
                    <small class="pull-right">
                        @include('panel.calendario')
                    </small>
                </h1>

            </div>
        </div>
        <div class="row">
           	@include('panel.asesor.header')
        </div>
<div class="row">
    
                @include('panel.asesor.grafica')
</div>
        <div class="row">
            <div class="col-lg-8">
                @include('panel.asesor.asesorias')
            </div>
           <div class="col-lg-4">
                @include('panel.asesor.asistencias')
                @include('panel.asesor.capacitaciones')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var to = new Date();
        var from = new Date(to.getTime() - 1000 * 60 * 60 * 24 * 30);
        $('#datepicker-calendar').DatePicker({
            inline: true,
            date: [from, to],
            calendars: 3,
            mode: 'range',
            current: new Date(to.getFullYear(), to.getMonth() - 1, 1),
            onChange: function(dates,el) {
                showDates(dates[0], dates[1]);
            }            
        });

        function showDates(from, to){
            $('#date-range-field span').text(
                from.getDate()+' '+from.getMonthName(true)+', '+
                from.getFullYear()+' - '+
                to.getDate()+' '+to.getMonthName(true)+', '+
                to.getFullYear());
                from = parseInt(from.getTime() / 1000);
                to = parseInt(to.getTime() /1000);
                $('#dateInicio').val(from);
                $('#dateFin').val(to);
        }

        showDates(from, to);

    </script>

{{ HTML::script('assets/js/panel.js')}}
</section>