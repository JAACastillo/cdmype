<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMunicipios extends Migration {

	public function up()
	{
        Schema::create('municipios',function($table){
            $table->increments('id');

            $table->string('municipio',30);
            $table->integer('departamento_id');
        });
	}

	public function down()
	{
		Schema::drop('municipios');
	}

}
