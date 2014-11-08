<?php

class CalendarioController extends BaseController {

   public function eventos(){

    $salidas = Salida::all();
    $evetos  = [];

    foreach ($salidas as $salida) {


      $addTime = 21600000; //6 horas

      $combinada = $salida->fecha_inicio . ' ' . $salida->hora_salida;
      $combinadaFinal = $salida->fecha_final. ' ' . $salida->hora_regreso;
      $eventos[] = array(
                           "id"       => $salida->id,
                            "title"   => $salida->lugar_destino,
                            "url"     =>"http://example.com",
                            "class"   =>"event-important",
                            "start"   => (strtotime($combinada) * 1000) + $addTime,//+ 86400000, // Milliseconds
                            "end"     => (strtotime($combinadaFinal) * 1000 )  + $addTime//  + 86400000// Milliseconds
                        );
    }

// return strtotime( $combinadaFinal) . '000';
      // $eventos =      [
      //                   "success"=>1,
      //                   "result"=> [
      //                      array(
      //                           "id"=>293,
      //                           "title"=>"rene sanabria 1",
      //                           "url"=>"http://example.com",
      //                           "class"=>"event-important",
                                        //  1415318400
      //                           "start"=>1415393002000, // Milliseconds
      //                           "end"=>1415393003000 // Milliseconds
      //                     )]
      //                 ];

          return Response::json(array("success" => 1, "result" => $eventos), 200);
  }
}
