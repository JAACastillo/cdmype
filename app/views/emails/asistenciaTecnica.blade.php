<?php
	$atTermino = AtTermino::find($id);
	$cortar = explode("-",$atTermino->fecha);
    $fecha = $cortar[2] . ' de ' . $cortar[1] . ' de ' . $cortar[0];

    $id = Math::to_base($id +  100000, 62);
?>
<p style='text-align: justify'>
	El Centro de Desarrollo de la Micro y Pequeña Empresa, Centro Regional de Ilobasco (CDMYPE-UNICAES) a través de los servicios de ASISTENCIA TÉCNICA adjunta por este medio los términos de referencia para aplicar a la asistencia técnica denominada, "{{ $atTermino->tema }}".
	<br/><br/>
	En los siguientes enlaces se encuentran los formatos con los cuales podrán presentar la oferta técnica y económica. La fecha limite para la presentación de la oferta es {{ $fecha }}.
</p>
<br/>
<a href="{{route('pdfAt', $atTermino->id)}}" target="_blank">TERMINOS DE REFENCIA (PDF)</a>
<br/>
<a href="{{route('f7', 'F7 FORMATO OFERTA TECNICA Y ECONOMICA.docx')}}" target="_blank">FORMATO OFERTA TÉCNICA Y ECONÓMICA (WORD)</a>
