<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAmpliacionesContratos extends Migration {

	public function up()
	{
		Schema::create('ampliacionesContratos', function($table){
            $table->increments('id');

            $table->date('fecha');
            $table->date('tiempo_ampliacion');
            $table->enum('periodo', array('Dias','Semanas','Meses'));
            $table->string('razonamiento', 1000);
            $table->integer('attermino_id');


            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('ampliacionesContratos');
	}

}
