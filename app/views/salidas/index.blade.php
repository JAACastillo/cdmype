

<div class="row">
   <div class="col-md-12 text-center">
      <div class="form-inline">
            <a href="{{route('salidas.create')}}" type="button" class="btn btn-success .icon-add pull-left">Crear</a>

         <div class="btn-group">
            <button class="btn btn-primary ladda-button" data-style="expand-right" data-calendar-nav="prev"><<
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <!-- <button class="btn" data-calendar-nav="today">Hoy
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button> -->
        <!--  </div>

         <div class="btn-group"> -->
            <button class="btn btn-info ladda-button" data-style="expand-right" data-calendar-view="year">Año
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-info ladda-button" data-style="expand-right active" data-calendar-view="month">Mes
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-info ladda-button" data-style="expand-right" data-calendar-view="week">Semana
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
           <!--  <button class="btn btn-primary ladda-button" data-style="expand-right" data-calendar-view="day">Día
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button> -->

            <button class="btn btn-primary ladda-button" data-style="expand-right" data-calendar-nav="next"> >>
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
         </div>
      </div>

   </div>
</div>

<div class="row" >
   <div class="col-md-12">
      <div id="calendar"></div>
   </div>
</div>

@section('script2')
<script type="text/javascript">
(function($){
   var calendar = $("#calendar").calendar(
   {
       tmpl_path: "app/views/salidas/tmpls/",
       events_source: "/cdmype/calendario",
         language: 'es-ES',
         time_start: '8:00',
         time_end: '17:00'
   });

   $('.btn-group button[data-calendar-nav]').each(function()
   {
      var $this = $(this);
      $this.click(function()
      {
         calendar.navigate($this.data('calendar-nav'));
      });
   });
   $('.btn-group button[data-calendar-view]').each(function()
   {
      var $this = $(this);
      $this.click(function()
      {
         calendar.view($this.data('calendar-view'));
      });
   });
   $('#first_day').change(function()
   {
      var value = $(this).val();
      value = value.length ? parseInt(value) : null;
      calendar.setOptions({first_day: value});
      calendar.view();
   });
   $('#events-in-modal').change(function()
   {
      // var val = $(this).is(':checked') ? $(this).val() : null;
      calendar.setOptions(
         {
            modal: true,
            modal_type:'iframe'
         }
      );
   });

}(jQuery));

</script>
@stop


