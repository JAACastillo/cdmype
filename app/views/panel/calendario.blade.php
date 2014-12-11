
<ul class="nav navbar-nav navbar-right">
 
  <li id="date-range"class="dropdown">
    <span id="date-range-field" class="dropdown-toggle" data-toggle="dropdown">
        <span>
          @{{inicio | date:'medium'}} - @{{fin}} 
        </span>
        <i class="caret"></i>
    </span>
    <ul class="dropdown-menu" role="menu">

        <select class="form-control text-center">
          <option>Mes anterior</option>
          <option>Este año</option>
          <option>Este mes</option>
        </select>
   
      <li>
          <div id="datepicker-calendar"></div>
      </li>
      <li>
        <input type="hidden" id="dateInicio">
        <input type="hidden" id="dateFin">
        <a class="btn btn-success" ng-click="update()">
          Actualizar datos
        </a>
      </li>
    </ul>
  </li>
</ul>


<style type="text/css">
  
      /* Style the calendar custom widget */
     
      #date-range-field {
        width: 290px;
        height: 26px;
        cursor:pointer;
        border: 1px solid #CCCCCC;
        border-radius: 5px 5px 5px 5px;
      }
      #date-range-field a  {
        color:#B2B2B2;
        background-color:#F7F7F7;
        text-align:center;
        display: block;
        width: 26px;
        height: 23px;
        top: 0;
        right: 0;
        text-decoration: none;
        padding-top:6px;
        border-radius: 0 5px 5px 0;
      }
      #date-range-field span {
        font-size: 12px;
        font-weight: bold;
        color: #404040;
        height: 26px;
        line-height: 26px;
        left: 5px;
        width: 250px;
        text-align: center;
      }
      
      #datepicker-calendar {
        width: 497px;
        height:153px;
        background-color: #F7F7F7;
        border: 1px solid #CCCCCC;
        border-radius: 0 5px 5px 5px;
        padding:10px 0 0 10px;
      }
      #date-range-field span {
        font-size: 12px;
        font-weight: bold;
        color: #404040;
        height: 26px;
        line-height: 26px;
        left: 5px;
        width: 250px;
        text-align: center;
      }
      
      /* Remove default border from the custom widget since we're adding our own.  TBD: rework the dropdown calendar to use the default borders */
      #datepicker-calendar div.datepicker {
        background-color: transparent;
        border: none;
        border-radius: 0;
        padding: 0;
      }
    
</style>

<!-- <div id="date-range">
    <div id="date-range-field" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
    <span></span>
    <a href="#" style="border-bottom-right-radius: 0px;"></a>
</div>
<div id="datepicker-calendar" style="display: block;"></div>
</div>
 -->
















