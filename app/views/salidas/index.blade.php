
<div class="row" style="padding-top: 7px;">
   <div class="col-md-5 pull-left title">
      <h4 style="margin-left: 15px;"></h4>
   </div>
   <div class="col-md-7 pull-right">
      <div class="form-inline">
         <div class="btn-group ">
            <button class="btn btn-primary " data-style="expand-right" data-calendar-nav="prev"><<
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-info " data-style="expand-right" data-calendar-view="year">Año
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-info " data-style="expand-right active" data-calendar-view="month">Mes
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-info " data-style="expand-right" data-calendar-view="week">Semana
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
            <button class="btn btn-primary " data-style="expand-right" data-calendar-nav="next"> >>
                  </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
            </button>
         </div>
      </div>

   </div>
</div>

<div class="row" >

   <div class="col-md-12">
      <div id="calendar" class="context-menu-one box menu-1"></div>

   </div>
</div>


@section('script2')

<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h3 class="modal-title">Event</h3>
            </div>
            <div class="modal-body" style="height: 400px">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
      </div>

<script type="text/javascript">
(function($){
   var calendar = $("#calendar").calendar(
   {
       tmpl_path: "app/views/salidas/tmpls/",
       events_source: "/cdmype/calendario",
         language: 'es-ES',
         time_start: '8:00',
         time_end: '17:00',
         modal : "#events-modal",
         modal_type : "iframe",
      onAfterViewLoad: function(view) {
         $('.title h4').text(this.getTitle());
         // $("#calendar").calendar({modal : "#events-modal", modal_type : "ajax", modal_title : function (e) { return e.title }})
      }
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
}(jQuery));

</script>
@stop


