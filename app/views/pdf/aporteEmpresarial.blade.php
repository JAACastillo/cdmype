<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	<style>
	     @page { margin: 100px 90px; }
	     #contenido {font-family: "arial black" ;margin: 0px; padding: 0px; text-align:justify; font-size: 14px; line-height: 20px}
	     #footer .left {float: left}
	     #footer .right {position: absolute; right: 10px}

	     .firmas {text-align: center;}
	     .firmas .firm { display: inline-block; position: absolute; }
	     .empresario {left: 40%}
	     .consultor {right: 0}

	     .clausula {color: #707070  }

	     .left{border: 1px solid #000; width: 45%; height: 250px; padding-left: 15px; display: inline-block;}
	     .leftBottom{border: 1px solid #000; width: 60%;  padding-left: 15px; padding-bottom: 15px; display: inline-block;}
	     .right{display: inline-block; padding-left: 50px}
	   </style>

	<title>Recibo</title>
</head>
<body>

	<?php
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					$date = strtotime($fecha);
					$dia = date('d', $date);
					$mes = $meses[date('m', $date) - 1];
					$ano = date('Y', $date); 
				
		$cantidad = explode('.', round($pago,2));
		// $cantidad = explode('.', '133.9');

		$valoresString = 
						array(
							array('','Uno','Dos','Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve', 'Diez', 'Once','Doce', 'Trece', 'Catorce', 'Quince', 'Dieciséis', 'Diecisiete', 'Dieciocho', 'Diecinueve'),
							array('','Diez','Veinte','Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa'),
							array('','Ciento','Doscientos','Trescientos', 'Cuatrocientos', 'Quinientos', 'Seiscientos', 'Setecientos', 'Ochocientos', 'Novecientos')
						);
		$cantidadEnLetras  = "";
		$anchoCantidad = strlen($cantidad[0]);
		for ($x =  0; $x  < $anchoCantidad; $x++) { 
			# code...
			$size = 1;
			$y = ' ';
			if($x == $anchoCantidad - 1 && substr($cantidad[0], $x, 1) != '0' && $num != '0'){
				$y = ' y ';
			}
			if($x == $anchoCantidad - 2 && substr($cantidad[0], $x, 1) == '1'){
				$num = substr($cantidad[0], $x, 2);
				$size = 2;
				$x = $anchoCantidad -1;
			}
			else		{
				$num = substr($cantidad[0], $x, 1);
			}
			$cantidadEnLetras = $cantidadEnLetras . $y . $valoresString[$anchoCantidad - 1 -  $x][$num];//substr($cantidad[0], $x, $size)] ;
			// $cantidadEnLetras = $y . $valoresString[$anchoCantidad - 1 -  $x][substr($cantidad[0], $x, 1)] . ' ' . $cantidadEnLetras;
		}
		// dd($cantidad);
	?>

<div id="contenido">
	<div style="position:absolute; right:10px">POR: $ {{$pago}}</div>
	<h5>
		RECIBÍ DE LA UNIVERSIDAD CATÓLICA DE EL SALVADOR, LA CANTIDAD DE:
	</h5>
	<b>
		{{$cantidadEnLetras}} 
		@if(count($cantidad) > 1)
			@if(strlen($cantidad[1]) > 1)	
				{{$cantidad[1]}}/100
			@else
				{{$cantidad[1]}}0/100
			@endif
		@else
			00/100
		@endif
		dólares
	</b>
	<br>
	<br>
		
	EN CONCEPTO DE: <b>{{$concepto}}</b>

	<br>
	<br>

	ILOBASCO, {{$dia}} de {{$mes}} de {{$ano}}
	<br>

	<div style="height:300px; background-color:red; margin:20px 0px">
		<div class="left">
			<br>
				NOMBRE: {{$consultor->consultor->nombre}}
			<br>
			<br>
				DUI: {{$consultor->consultor->dui}}
			<br>
			<br>
				NIT: {{$consultor->consultor->nit}}
			<br>
			<br>
				DIRECCIÓN: {{$consultor->consultor->direccion}}
			<br>
			<br>
				TEL: {{$consultor->consultor->celular}}
		</div>
		<div class="right">
			<u >
				{{$consultor->consultor->nombre}}
			</u>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			________________________________
			<p> FIRMA </p>
		</div>
	</div>
	<div style="margin:0px">
		<div class="leftBottom">
			<br>
				UNIVERSIDAD CATÓLICA DE EL SALVADOR
			<br>
			<br>
				CENTRO REGIONAL DE ILOBASCO
			<br>
			<br>
				NIT: 0210-250682-001-7     NRC: 26024-0
			<br>
			<br>
				CARRETERA A ILOBASCO KM. 56 CANTON AGUA ZARCA, CABAÑAS, EL SALVADOR, C.A.
		</div>
		<div class="right">
				Devengado  = $ {{$pago}}
			<br>
				ISR = $ {{ $descuento = round(($pago / 1.13) * 0.1,2)}}
			<br>
				A PAGAR = $ {{round($pago - $descuento,2)}}
			<br>
		</div>
	</div>
</div>
</body>
</html>
