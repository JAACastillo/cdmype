<?php
	$captermino = CapTermino::find($id);
	$cortar = explode("-",$captermino->fecha);
    $fecha = $cortar[2] . ' de ' . $cortar[1] . ' de ' . $cortar[0];
    
?>
<p style='text-align: justify'>
	El Centro de Desarrollo de la Micro y Pequeña Empresa, Centro Regional de Ilobasco (CDMYPE-UNICAES) a través de los servicios de Capacitación adjunta por este medio los términos de referencia para aplicar a la capacitacion denominada, "{{ $captermino->tema }}".
	<br/><br/>
	En los siguientes enlaces se encuentran los formatos con los cuales podrán presentar la oferta técnica y económica. La fecha limite para la presentación de la oferta es {{ $fecha }}.
</p>
<br/>
<a href="http://www.cri.catolica.edu.sv/cdmype/sistema/capacitaciones/pdf/{{$id}}" target="_blank">TERMINOS DE REFENCIA (PDF)</a>
<br/>
<a href="http://www.cri.catolica.edu.sv/cdmype/sistema/assets/F7 FORMATO OFERTA TÉCNICA Y ECONÓMICA.docx">FORMATO OFERTA TÉCNICA Y ECONÓMICA (WORD)</a>
