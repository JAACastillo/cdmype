@extends('menu')

@section('escritorio')

@section('script')


<script type="text/javascript">
	$('.dashbord').fadeIn(1000);
	$( "#cont" ).removeClass( "container" ).addClass( "container-fluid" );
</script>
@stop

<style>
	body{
		background-color: #C5C7BC;
		padding: 0px;
		margin: 0px;
	}
	h2, h3, h6{
		margin: 0px;
	}
	h5{
		font-size: 16px;
	}
	.badge{
		padding: 5px;
	}
	.dashbord{
		margin: 0px 15px 0px 15px;
	}
	.page-header{
		margin: 0px 10px 5px 10px;
	}
	.nav-stacked li{
		font-size: 16px;
		background-color: #F4F4FF;
	}
	.list-group {
		margin-bottom: 0px;
	}
	.eventos{
		height: 260px;
		margin: 0;
		overflow: auto;
	}
	.tdr{
		height: 336px;
		margin: 0;
		overflow: auto;
	}
	.notificaciones{
		height: 330px;
		overflow: hidden;
	}
	.tareas{
		height: 260px;
		overflow: hidden;
	}
	.icono{
		background-color: gray;
		color: white;
		border: 10px solid gray;
		margin: 5px;
		border-radius: 50%;
	}
	.table{
		border-width: 0px;
	}
	.dataeventos tr{
		padding: 0px;
	}
	.list-group-item {
		padding: 7px;
	}
</style>
<div class="row dashbord animated fadeIn oculto">
	<!-- columna 1 -->
	<div class="col-md-7">

		<!-- TDRs -->
		<div class="row animated pulse">
			@include('dashboard.at')
		</div>
		<!-- Proximos Eventos -->
		@include('dashboard.eventos')
	</div>
	<!-- columna 2 -->
	<div class="col-md-5">
		<!-- Notificaciones -->
		<div class="row animated pulse" style="background-color: #FFFFFF">
			@include('salidas.calendario')
		</div>
		<!-- Tareas Comunes -->
		<div class="row animated pulse">
			@include('dashboard.shortcut')
		</div>
	</div>

</div>
@stop
