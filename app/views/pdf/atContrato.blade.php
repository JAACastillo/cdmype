<?php 
    namespace Anouar\Fpdf;
    use Illuminate\Support\ServiceProvider; 

    class PDF extends Fpdf
    {
        var $B;
        
        function WriteHTML($html,$num)
        {
            // Intérprete de HTML
            $html = str_replace("\n",'<br>',$html);
            $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
            foreach($a as $i=>$e)
            {
                if($i%2==0)
                {   
                    if($num == '1')
                        $this->Write(5,$e);
                        else
                            $this->MultiCell(0,5,$e);
                            
                }
                else
                {
                    // Etiqueta
                    if($e[0]=='/')
                        $this->CloseTag(strtoupper(substr($e,1)));
                        else
                        {
                            // Extraer atributos
                            $a2 = explode(' ',$e);
                            $tag = strtoupper(array_shift($a2));
                            $attr = array();
                            foreach($a2 as $v)
                            {
                                if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                    $attr[strtoupper($a3[1])] = $a3[2];
                            }
                                $this->OpenTag($tag,$attr);                   
                        }
                }
            }
        }
        
        function OpenTag($tag, $attr)
        {
            if($tag=='B')
                $this->SetStyle($tag,true);
        }
        
        function CloseTag($tag)
        {
            if($tag=='B')
                $this->SetStyle($tag,false);
        }
        
        function SetStyle($tag, $enable)
        {
            // Modificar estilo y escoger la fuente correspondiente
            $this->$tag += ($enable ? 1 : -1);
            $style = '';
            foreach(array('B') as $s)
            {
                if($this->$s>0)
                $style .= $s;
            }
            $this->SetFont('',$style);
        }
        
        function Header()
        {
            $this->Image('assets/img/cdmype-logo.jpg',88,8,40);
            $this->Ln(20);
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->Image('assets/img/conamype-logo.gif',35,263,33);
            $this->Image('assets/img/unicaes-logo.png',160,258,18);
        }
        function SetCol($col)
        {
          //Establecer la posición de una columna dada
            $this->col=$col;
            $x=10+$col*69;
            $this->SetLeftMargin($x);
            $this->SetRightMargin(10);
            $this->SetX($x);
        }
    }

    /**
     **@VARIABLES
     **/
    
    
        if($atContrato->terminos->empresa->representante->sexo == 'Mujer'){
            $r = 'representada';
            $b = 'beneficiaria';   
        } else{
            $b = 'beneficiaria';
            $r = 'representado';   
        }
        
        $cargo = $atContrato->terminos->representante->tipo;
        if($cargo == 'Empresaria' || $cargo == 'Propietaria') {
            $cargo_1 = 'la ' . strtolower($cargo);
            $cargo_2 = 'de la ' . strtolower($cargo);
            $cargo_3 = 'a la ' . strtolower($cargo);
        }else if($cargo == 'Empresario' || $cargo == 'Propietario' || $cargo == 'Representante') {
            $cargo_1 = 'el ' . strtolower($cargo);
            $cargo_2 = 'del ' . strtolower($cargo);
            $cargo_3 = 'al ' . strtolower($cargo);
        }
        
        if($atContrato->terminos->consultorSeleccionado->sexo == 'Hombre') {
            $tipo = 'Consultor';
            $tipo_1 = 'el consultor';
            $tipo_2 = 'al consultor';
            $tipo_3 = 'los consultores';
            $tipo_4 = 'del consultor';
        } else {
            $tipo = 'Consultora';
            $tipo_1 = 'la consultora';
            $tipo_2 = 'a la consultora';
            $tipo_3 = 'las consultoras';
            $tipo_4 = 'de la consultora';
        }

        if($atContrato->terminos->empresa->categoria == 'Empresa') {
            $bd = true;
            $categoria_1 = 'de la empresa';
        }else if($atContrato->terminos->empresa->categoria == 'Grupo') {
            $bd = true;
            $categoria_1 = 'del grupo';
        }else{
            $bd = false;
        }
        
        if($bd)
            $texto = $categoria_1.' '.$atContrato->terminos->empresa->nombre.', ubicado en el municipio de '.$atContrato->terminos->empresa->municipio->municipio.', departamento de '.$atContrato->terminos->empresa->municipio->departamento->departamento.', ' .$r.' por ';
        else
            $texto = 'de ';
        
        $fecha = $atContrato->fecha_inicio;
        $cortar = explode("/",$fecha);
        $num =  explode(" ",$cortar[0]);
        $fecha = $num[1] . ' de ' . $cortar[1] . ' de ' . $cortar[2];
        if($num[1] == '1') $dias = ' día del mes de ';
        else $dias = ' días del mes de ';
        $fecha_2 = $num[1] . $dias . $cortar[1] . ' de ' . $cortar[2];

        $otros = '';
        foreach ($atContrato->terminos->ofertantes as $consultor) {
            $otros .= $consultor->nombre.'.<br/>';
        }
        
    /**
     **@PDF
     **/

    $pdf = new PDF();
    $pdf->AddPage('P','Letter');
    $pdf->SetFont('Times','B',12);

    /**
     ** @ENCABEZADO:
     **/

    $pdf->MultiCell(0,5,utf8_decode('CONTRATO PROFESIONAL ENTRE EMPRESARIO, CONSULTOR Y EL CDMYPE PARA LA PRESTACIÓN DE SERVICIOS DE ASISTENCIA TÉCNICA.'),0,'C');
    $pdf->Ln('10');

    /**
     ** @PRESENTACIÓN:
     **/
    $pdf->SetFont('Times','',12);
    $pdf->WriteHTML(utf8_decode('NOSOTROS, Universidad Católica de El Salvador UNICAES-Ilobasco, en su calidad de Centro de Desarrollo de la Micro y Pequeña Empresa (CDMYPE) y '.$atContrato->terminos->consultorSeleccionado->nombre.', mayor de edad, de nacionalidad Salvadoreña, del domicilio de '.$atContrato->terminos->consultorSeleccionado->direccion.', con Documento Único de Identidad (DUI) Número '.$atContrato->terminos->consultorSeleccionado->dui.', quien en adelante se denominará '.strtoupper($tipo_1).', convenimos celebrar el presente contrato con el objeto de que realice a favor y a satisfacción '.$texto.' '.$atContrato->terminos->empresa->representante->nombre.', mayor de edad, de nacionalidad salvadoreña, del domicilio de '.$atContrato->terminos->empresa->representante->municipio.' del departamento de '.$atContrato->terminos->empresa->representante->departamento.' con Documento Único de Identidad (DUI), número '.$atContrato->terminos->empresa->representante->dui.', la asistencia técnica denominada: '.$atContrato->terminos->tema.'.<br/><br/>Las partes sujetamos el contrato en referencia a las siguientes cláusulas:<br><br>'),'2');
    /**
     **@PRIMERA: PRODUCTOS ESPERADOS
     **/

    $pdf->WriteHTML(utf8_decode('<b>PRIMERA: PRODUCTOS ESPERADOS</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode('Los productos esperados a realizar por '.$tipo_1.' son los siguientes de acuerdo a los solicitados en los TDR: <br><br>'.$atContrato->terminos->productos.'<br><br>'),'2');

    /**
     **@SEGUNDA: PLAZO
     **/

    $pdf->WriteHTML(utf8_decode('<b>SEGUNDA: PLAZO</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode('El presente contrato tendrá una duración de '.$atContrato->duracion.' semanas, en el cual se completará la asistencia técnica brindada a partir del '.$fecha.'. Durante este período '.$tipo_1.' se compromete a hacer cumplir las actividades objeto de este contrato contenidas en la oferta técnica y económica y a dar fiel cumplimiento a los compromisos establecidos en los planes de trabajo aprobados y productos esperados.<br><br>Si por algún motivo, la colsutoría deberá superar el plazo acordado para su finalización, cualquiera de las partes podrá solicitar al CDMYPE una extención del plazo, argumentandolos motivos de tal solicitud.<br/>El CDMYPE determinará la validez o no dicha solicitud.<br><br>'),'2');

    /**
     **@TERCERA: INFORMES
     **/

    $pdf->WriteHTML(utf8_decode('<b>TERCERA: INFORMES</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode(ucfirst($tipo_1). ' se obliga a presentar en tiempo y forma a '.$atContrato->terminos->empresa->representante->nombre.' y al Centro de Desarrollo de Micro y Pequeñas Empresas un informe final de la asistencia técnica. El trabajo debe de hacerse de conformidad con el plan de trabajo previamente acordado entre '.$cargo_1.' y '.$tipo_1.', el cual forma parte de este contrato.<br><br>'),'2');

    /**
     **@CUARTA: FORMA DE PAGO
     **/

    $pdf->WriteHTML(utf8_decode('<b>CUARTA: FORMA DE PAGO</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode('El CDMYPE UNICAES, en virtud de este contrato y una vez '.$atContrato->terminos->empresa->representante->nombre.' manifieste por escrito su conformidad con el servicio recibido y con el visto bueno del  CDMYPE UNICAES, pagará '.$tipo_2.' en concepto de honorarios por la asistencia técnica efectuada, la cantidad de US$'.$atContrato->pago.' (incluye IVA) que corresponde al '.$atContrato->porcentaje.'% del costo total de la consultoría. Para completar el pago a '.$tipo_1.' el aporte '.$cargo_2.' será de $'.$atContrato->terminos->aporte.' que es un '.(100 - $atContrato->porcentaje).'% del total de la Asistencia Técnica.<br><br>No se reconocerá ninguna cantidad anticipadamente ni adicional. La forma de pago será: un solo pago al final de la asistencia técnica, siempre que '.$cargo_1.' firme el acta de conformidad de la asistencia técnica.<br>No se reconocerá el pago a '.$tipo_1.' si '.$cargo_1.' firma de rechazo en el acta de conformidad y justificando sus razones.<br><br>'),'2');
    
    /**
     **@QUINTA: SELECCIÓN DEL CONSULTOR
     **/
    $pdf->WriteHTML(utf8_decode('<b>QUINTA: SELECCIÓN DEL CONSULTOR</b><br><br>'),'1');
    $pdf->Ln(8);
        $pdf->WriteHTML(utf8_decode($atContrato->atTermino->empresario->nombre.', manifiesta haber seleccionado a '.$atContrato->terminos->consultorSeleccionado->nombre.' entre '.$tipo_3.' que presentaron la oferta técnica y económica al CDMYPE y se detallan según el siguiente listado:<br><br>'.$otros.'<br>'),'2');

    /**
     **@SEXTA: ESTIPULACIONES ESPECIALES
     **/
    
    $pdf->WriteHTML(utf8_decode('<b>SEXTA: ESTIPULACIONES ESPECIALES</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode(ucwords($tipo_1). ' se obliga a guardar estricta confidencialidad sobre la información obtenida de la empresa y los resultados de los servicios que preste.<br>' .ucwords($tipo_1). ' no podrá desarrollar más de 3 consultorías de manera simultánea.<br>' .ucwords($tipo_1). ' se obliga entregar un informe final '.$cargo_3. ' ' .$b.' o grupo asociativo.<br>Al finalizar la capacitación, ' .$tipo_3. ' presentará factura de consumidor final a nombre de CDMYPE UNICAES, por la cantidad correspondiente al costo de la capacitación.<br>Todos los precios detallados en el presente contrato, incluyen cualquier tipo de impuestos.<br><br>'),'2');

    /**
     **@SEPTIMA: TERMINACIÓN
     **/

    $pdf->WriteHTML(utf8_decode('<b>SEPTIMA: TERMINACIÓN</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode('El contrato podrá darse por terminado según las causas siguientes: (a) por común acuerdo entre las partes; (b) a solicitud de una de las partes, por motivo de fuerza mayor debidamente justificado y aceptado por la otra; (c) si cualquiera de las partes incumpliere cualquier obligación derivada del presente contrato; (d) por causas imprevistas que hicieren imposible obtener la consultoría contratada, dando aviso a la otra parte con quince días de anticipación a la fecha de suspensión del contrato; (e) por faltas a la ética profesional. Cuando el contrato se dé por terminado por las razones descritas en los literales (b), (c) y (d) las cuales sean imputables a  la empresa (s) beneficiaria (s). El CDMYPE, a su discreción, podrá reconocer '.$tipo_2.' los gastos razonables que hubiere efectuado, siempre que éstos estén justificados y se compruebe en forma fehaciente que corresponden al objeto de este contrato.<br><br>'),'2');

    /**
     **@OCTAVA: OBLIGACIONES DE LOS EMPRESARIOS
     **/

    $pdf->WriteHTML(utf8_decode('<b>OCTAVA: OBLIGACIONES DE LOS EMPRESARIOS</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode(ucfirst($cargo_1).' deberá aportar la cantidad de USD '.$atContrato->terminos->aporte.' que corresponde al '.(100 - $atContrato->porcentaje).'% del monto total de la asistencia técnica y depositarlo en cuenta bancaria N° '.$atContrato->numBancario.' a nombre de Universidad Católica de El Salvador Centro Regional Ilobasco o bien realizarlo directamente en las oficionas del CDMYPE.<br>Facilitar toda la información que sea necesaria para efecto del desarrollo de la asistencia técnica.<br>Destinar el tiempo requerido para la ejecución de la asistencia técnica que '.$tipo_1.' requiera para dar cumplimiento al plan de trabajo.<br>Implementar las recomendaciones realizadas por '.$tipo_1.' para el logro de los objetivos de la consultoría.<br>Acceder a la realización de la encuesta de evaluación de impacto del o los servicios recibidos.<br>Realizar la evaluación de desempeño '.$tipo_4.'.<br><br>'),'2');

    /**
     **@NOVENA: VIGENCIA Y ORDEN DE INICIO
     **/

    $pdf->WriteHTML(utf8_decode('<b>NOVENA: VIGENCIA, ORDEN DE INICIO Y PRORROGAS</b><br><br>'),'1');
    $pdf->Ln(8);
    $pdf->WriteHTML(utf8_decode('Este contrato entrará en vigencia a partir de la fecha de su firma y a partir de la misma autoriza a '.$atContrato->consultor->nombre.' a dar inicio a la asistencia técnica. Cualquier prórroga deberá ser solicitada a CDMYPE, argumentando los motivos. El CDMYPE determinará la validez o no dicha solicitud.<br><br>En fe de lo cual firmamos el presente contrato en original, en la ciudad de '.$atContrato->lugarFirma.' a los '.$fecha_2.'.<br><br><br>'),'2');
    
    /**
     **@FIRMAS
     **/

    $pdf->SetCol(0);
    $py = $pdf->GetY();
    $pdf->WriteHTML('F.________________________','1');
    $pdf->Ln(8);
    $pdf->MultiCell(58,5,utf8_decode($atContrato->terminos->empresa->representante->nombre),0,'C');
    $pdf->Ln(2);
    $pdf->MultiCell(58,5,utf8_decode(ucwords($cargo) . ' ' .$atContrato->terminos->empresa->nombre),0,'C');
    
    $pdf->SetY($py);
    $pdf->SetCol(1);
    $pdf->WriteHTML('F.________________________','1');
    $pdf->Ln(8);
    $pdf->MultiCell(58,5,utf8_decode($atContrato->terminos->consultorSeleccionado->nombre),0,'C');
    $pdf->Ln(2);
    $pdf->MultiCell(58,5,utf8_decode($tipo),0,'C');

    $pdf->SetY($py);
    $pdf->SetCol(2);
    $pdf->WriteHTML('F.________________________','1');
    $pdf->Ln(8);
    $pdf->MultiCell(58,5,utf8_decode('Lic. Roberto Antonio López Castro'),0,'C');
    $pdf->Ln(2);
    $pdf->MultiCell(58,5,utf8_decode('Apoderado Especial Administrativo'),0,'C');
    $pdf->Ln(2);
    $pdf->MultiCell(58,5,utf8_decode('Universidad Católica de El Salvador'),0,'C');
       
    $pdf->Output();
    exit();

?>
