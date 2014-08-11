<<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	<style>
	     @page { margin: 100px 90px; }
	     #header {margin: 0px; position: fixed; left: 0px; top: -76px; right: 0px;  text-align: center; }
	     #footer { position: fixed; left: 0px; bottom: -140px; right: 0px; height: 150px;  }
	     #footer .page:after { content: counter(page, upper-roman); }
	     #contenido {font-family: "arial black" ;margin: 0px; padding: 0px; text-align:justify; font-size: 14px; line-height: 20px}
	     #footer .left {float: left}
	     #footer .right {position: absolute; right: 10px}

	     .firmas {text-align: center;}
	     .firmas .firm { display: inline-block; position: absolute; }
	     .empresario {left: 40%}
	     .consultor {right: 0}

	     .clausula {color: #707070  }
	   </style>

	<title>Contrato de trabajo</title>
</head>
<body>

<div id="header" >
	<img src="assets/img/cdmype-logo.jpg" width="150px"/>
</div>

<div id="footer">
	<img src="assets/img/conamype-logo.jpg" width="150px" class="left" />

	<img src="assets/img/unicaes-logo.jpg" width="75px" class="right" />

</div>

				<?php
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					$date = strtotime($contrato->fecha_inicio);
					$dia = date('d', $date);
					$mes = $meses[date('m', $date) - 1];
					$ano = date('Y', $date);
				?>

<div id="contenido">
	<h4 style="text-align:center">
		CONTRATO PROFESIONAL ENTRE EMPRESARIO, CONSULTOR Y EL CDMYPE PARA LA 
		PRESTACIÓN DE SERVICIOS DE ASISTENCIA TÉCNICA
	</h4>

	<p>
	NOSOTROS, Universidad Católica de El Salvador y CDMYPE-Ilobasco, en su calidad de Centro de
	Desarrollo de la Micro y Pequeña Empresa CDMYPE y 
	{{$consultor->nombre}}, 
	mayor de edad, de nacionalidad salvadoreña, del domicilio de 
	{{$consultor->direccion}}
	con Documento Único de Identidad (DUI), número 
	{{$consultor->dui}}
	, quien en adelante se denominará el consultor, convenimos celebrar el presente contrato con el objeto de que realice a favor 
	y a satisfacción de la empresa: 
	{{$empresa->nombre}}
	, ubicado en 
	{{ $empresa->direccion}}, 
	en el Municipio de {{$empresa->municipio->municipio}}, departamento de {{$empresa->municipio->departamento->departamento}}, 
	representado por {{$empresario->nombre}}, 
	mayor de edad, de nacionalidad salvadoreña, del domicilio de {{$empresario->municipio->municipio }} en el departamento 

	{{$empresario->municipio->departamento->departamento}}
	de  con Documento Único de Identidad (DUI), número {{$empresario->dui}}, la asistencia técnica
	denominada: "<em>{{$at->tema}}</em> "
	

	<p class="clausula">PRIMERA: PRODUCTOS ESPERADOS </p>
	
	Los productos esperados a realizar por el consultor son los siguientes de acuerdo a los solicitados en los TDR:
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
<br/>
	<p class="clausula"> SEGUNDA: PLAZO </p>

	
	El presente contrato tendrá una duración de {{$contrato->duracion}} semanas, en el cual se completará la asistencia 
	técnica brindada a partir de {{$dia}} de {{$mes}} de {{$ano}}. Durante este período el consultor se compromete a hacer 
	cumplir las actividades objeto de este contrato contenidas en la oferta técnica y económica y a dar fiel 
	cumplimiento a los compromisos establecidos en los planes de trabajo aprobados y productos esperados.
	Si por algún motivo, la consultoría deberá superar el plazo acordado para su finalización, cualquiera de 
	las partes podrá solicitar al CDMYPE una extensión del plazo, argumentando los motivos de tal solicitud. 
	El CDMYPE determinará la validez o no dicha solicitud.
	

<br/>
	<p class="clausula">TERCERA: INFORMES </p>
	
	El consultor se obliga a presentar en tiempo y forma a {{$empresario->nombre}} y al CDMYPE-Ilobasco 
	un informe final de la asistencia técnica. El trabajo debe de hacerse de conformidad con el plan de trabajo 
	previamente acordado entre el empresario y el consultor, el cual forma parte de este contrato.
	


<br/>
	<p class="clausula">CUARTA: FORMA DE PAGO </p>
	
	El CDMYPE-Ilobasco, en virtud de este contrato y una vez {{$empresario->nombre}} manifieste por 
	escrito su conformidad con el servicio recibido y con el visto bueno del CDMYPE-Ilobasco, pagará al 
	consultor en concepto de honorarios por la asistencia técnica efectuada, la cantidad de $ {{$contrato->pago * ($contrato->aporte/100)}} (incluye 
	IVA) que corresponde al {{$contrato->aporte}}% del costo total de la consultoría. Para completar el pago al consultor el 
	aporte del empresario será de $ {{$contrato->pago * ((100 - $contrato->aporte)/100)}} que es un {{100 - $contrato->aporte}} % de total de la consultoría.
	
	No se reconocerá ninguna cantidad anticipadamente ni adicional. La forma de pago será: un solo 
	pago al final de la asistencia técnica, siempre que el empresario firme el acta de conformidad de la 
	asistencia técnica. No se reconocerá el pago al consultor si el empresario firma de rechazo en el acta de 
	conformidad y justificando sus razones.
	

<br/>
	<p class="clausula">QUINTA: SELECCIÓN DEL CONSULTOR </p>

	
	{{$empresario->nombre}}, manifiesta haber seleccionado a {{$consultor->nombre}}, consultor que 
	presentó oferta al CDMYPE y se detalla en el siguiente listado:
		<ol>
			@foreach($at->ofertantes as $ofertante)
				<li>
					{{$ofertante->consultor->nombre}}
				</li>
			@endforeach
		</ol>

	<p class="clausula"> SEXTA: ESTIPULACIONES ESPECIALES. </p>
	
		<ol>	
			<li>
				El Consultor se obliga a guardar estricta confidencialidad sobre la información obtenida de la empresa y los resultados de los servicios que preste.
			</li>
			<li>
				El Consultor no podrá desarrollar más de 3 consultorías de manera simultánea.
			</li>
			<li>
				El Consultor se obliga entregar un informe final al empresario beneficiario.
			</li>
			<li>
				El pago del aporte empresarial deberá ser realizado únicamente en las oficinas del CDMYPE o a 
				través de depósito bancario, para que, luego de la firma del presente contrato, el consultor entregue al 
				empresario factura o crédito fiscal correspondiente al monto pagado.
			</li>
			<li>
				Al finalizar la asistencia técnica, el consultor presentará factura de consumidor final a nombre del 
				CDMYPE-UNICAES, por la cantidad correspondiente al {{$contrato->aporte}}% del valor total de la consultoría; 
				anexado a dicho comprobante vendrá fotocopia de la factura o crédito fiscal emitida por el consultor al 
				empresario beneficiado en concepto del {{100 - $contrato->aporte}}% de aporte empresarial.
			</li>
			<li>
				Todos los precios detallados en el presente contrato, incluyen cualquier tipo de impuestos.
			</li>
		</ol>

	<p class="clausula">
		SEPTIMA: TERMINACIÓN.
	</p>
		El contrato podrá darse por terminado según las causas siguientes: 
		<ol type="a">
			<li> Por común acuerdo entre las partes; </li>
			<li> Por solicitud de una de las partes, por motivo de fuerza mayor debidamente justificado y aceptado por la otra; </li>
			<li> Si cualquiera de las partes incumpliere cualquier obligación derivada del presente contrato; </li>
			<li> Por causas imprevistas que hicieren imposible obtener la consultoría contratada, dando aviso a la otra parte con quince días de anticipación a la fecha de suspensión del contrato; </li>
			<li> Por faltas a la ética profesional. </li>
		</ol>
		Cuando el contrato se dé por terminado por las razones descritas en los literales (b), (c) y (d) las cuales sean imputables a la(s) empresa(s) beneficiaria(s). El CDMYPE, a su discreción, podrá 
		reconocer al consultor los gastos razonables que hubiere efectuado, siempre que éstos estén justificados 
		y se compruebe en forma fehaciente que corresponden al objeto de este contrato.

<br/>
			<p class="clausula"> OCTAVA: OBLIGACIONES DEL EMPRESARIOS. </p>
			<ol>
				<li>
					El empresario deberá aportar la cantidad de USD {{$contrato->pago * ((100 - $contrato->aporte)/100)}} dólares que corresponde al {{100 - $contrato->aporte}}% del monto 
					total de la asistencia técnica y depositarlo en el Banco de América Central a la cuenta corriente 
					No 200779726 a nombre de Universidad Católica de El Salvador Centro Regional Ilobasco o bien 
					realizarlo directamente en las oficinas del CDMYPE. 		
				</li>
				<li>
					Facilitar toda la información que sea necesaria para efecto del desarrollo de la asistencia técnica.
				</li>
				<li>
					Destinar el tiempo requerido para la ejecución de la asistencia técnica que el consultor requiera para 
					dar cumplimiento al plan de trabajo.
				</li>
				<li>
					Implementar las recomendaciones realizadas por el consultor para el logro de los objetivos de la 
					consultoría.
				</li>
				<li>
					Acceder a la realización de la encuesta de evaluación de impacto del o los servicios recibidos.
				</li>
				<li>
					Realizar la evaluación de desempeño del consultor.
				</li>
			</ol>
			
			<p class="clausula"> NOVENA: VIGENCIA, ORDEN DE INICIO Y PRÓRROGAS </p>

				
			Este contrato entrará en vigencia a partir de la fecha de su firma y a partir de la misma autoriza a 
			{{$consultor->nombre}} a dar inicio a la asistencia técnica. Cualquier prórroga del contrato deberá ser solicitada al 
			CDMYPE, argumentando los motivos. El CDMYPE determinará la validez o no dicha solicitud.
			En fe de lo cual firmamos el presente contrato en original, en la ciudad de {{$contrato->lugar_firma}} a los {{$dia}} días del mes
			de {{$mes}} del año {{$ano}}.
	</p>

	<div class="firmas">
			<br><br><br>
		<div class="firm apoderado">
			F._____________________	<br/>
			Lic. Roberto Antonio López <br/>
			Apoderado Especial Administrativo <br/>
			Universidad Católica de El Salvador
		</div>
		<div class="firm empresario">
			F._____________________	<br/>
			{{$empresario->nombre}} <br/>
			Propietario {{$empresa->nombre}}
		</div>
		<div class="firm consultor">
			F._____________________	<br/>
			{{$consultor->nombre}} <br/>
			Consultor
		</div>
	</div>
</div>
</body>
</html>






