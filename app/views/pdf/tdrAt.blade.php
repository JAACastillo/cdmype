<<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	<style>
	     @page { margin: 100px 90px; }
	     #header {margin: 0px; position: fixed; left: 0px; top: -86px; right: 0px;  text-align: center; }
	     #footer { position: fixed; left: 0px; bottom: -140px; right: 0px; height: 150px;  }
	     #footer .page:after { content: counter(page, upper-roman); }
	     .contenido {font-family: "times new roman"; margin: 0px; padding: 0px; text-align:justify; font-size: 14px; line-height: 20px}
	     #footer .left {float: left}
	     #footer .right {position: absolute; right: 10px}

	     .titulo{background-color: #CCFAE0; border: 2px solid black; }
	     .titulo p {text-align: center; padding: 0; margin: 2px}

	   </style>

	<title>Término de referencia para Asistencia Técnica</title>
</head>
<body>

<div id="header" >
	<img src="assets/img/cdmype-logo.jpg" width="150px"/>
</div>

<div id="footer">
	<img src="assets/img/conamype-logo.jpg" width="150px" class="left" />

	<img src="assets/img/unicaes-logo.jpg" width="75px" class="right" />
</div>

<div class="contenido">
 <div class="titulo">
 	<p style="text-aling:center"> TÉRMINOS DE REFERENCIA</p>
 	<p> <strong> "{{$at->tema}}" </strong> </p>
 </div>

 <div>
 	<p>
 		<strong>1. Presentación</strong>
 	</p>
 	<p style="margin-left:25px">
 		{{$empresa->descripcion}}
 	</p>
 </div>
 <div>
 	<p>
 		<strong>1. Objetivos</strong>
 	</p>
 	<div style="margin-left:25px">
 	<p> <strong>1.1 Objetivo General </strong></p>
 	<p style="margin-left:40px">
 		{{$at->obj_general}}
 	</p>
 	<p><strong>1.2 Objetivos Específicos</strong></p>
 		<?php
			$especificos = explode("\r\n", $at->obj_especifico)
		?>
		<ul>
			@foreach($especificos as $especifico)
				<li>
					{{$especifico}}
				</li>
			@endforeach
		</ul>
 	</div>
 </div>
 <div>
 	<p><strong>2. Productos Esperados</strong></p>
 	<p>
 		Al finalizar la asistencia técnica, donde el consultor contratado deberá hacer visitas in situ para desarrollar el trabajo siguiente:
 		<?php
			$productos = explode("\r\n", $at->productos)
		?>
		<ul>
			@foreach($productos as $producto)
				<li>
					{{$producto}}
				</li>
			@endforeach
		</ul>
 	</p>
 </div>

 	<div>
 		<p><strong>3. Oferta técnica y económica</strong></p>
 		La oferta técnica y económica deberá ser presentada de acuerdo al siguiente contenido, ver anexo de oferta:
 		<ul>
 			<li>Descripción de la empresa(s).</li>
 			<li>Objetivos.</li>
 			<li>Metodología de trabajo.</li>
			<li>Productos esperados.</li>
			<li>Plan de trabajo de la asistencia técnica.</li>
 		</ul>
 	</div>
 	<div>
 		<p><strong>4. Tiempo de ejecución de la asistencia técnica: </strong></p>
 		<p> En {{$at->tiempo_ejecucion}} semanas, con un minimo de 30 horas, de las cuales el {{$at->trabajo_local}}% debe ser trabajo en el local del empresario, y el {{100 - $at->trabajo_local}}% restante trabajo en oficina para redacción de informes y cualquier otro trabajo que el proceso requiera. Esta relación puede variar dependiendo del tipo de trabajo a realizar y debe ir justificado en la planificación de actividades de la oferta técnica.</p>
 	</div>
 	<div>
 		<p><strong>5. Plazo de presentación de ofertas:  </strong></p>
 		<p>
 			Presentar su oferta Técnica y Económica a mas tardar en la fecha {{$at->fecha}}, ya sea por medio electrónico a cdmype.unicaes@gmail.com, {{$asesor->email}} o físico en la oficina CDMYPE ubicada en Universidad Católica de El Salvador-Centro Regional Ilobasco.
 			No se tomaran en cuenta las ofertas sin firma del consultor, ni ofertas recibidas después de la fecha establecida.

 		</p>
 	</div>
 	<div>
 		<p><strong>6. Financiamiento:  </strong></p>
 		<p>
 			El valor máximo a cofinanciar por el desarrollo de la asistencia técnica es de <strong>${{$at->financiamiento}}</strong>.
 			@if( $at->aporte > 0)
 				Más un aporte empresarial de <strong>{{$at->aporte}} %</strong>
 			@endif
 		</p>
 	</div>
</div>
</body>
</html>






