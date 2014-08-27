<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableIndicadoresProyecto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('indicadoresProyecto',function($table){
            $table->increments('id');
            $table->integer('indicador_id');
            $table->integer('proyecto_id');
            $table->string('detalles');
            $table->softDeletes();
            $table->timestamps();
        });
	}
	
	public function down()
	{
        Schema::drop('indicadoresProyecto');
	}

}
