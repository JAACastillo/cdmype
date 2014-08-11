<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMovimientos extends Migration {

	public function up()
	{
        Schema::create('movimientos',function($table){
            $table->increments('id');
            
            $table->integer('usuario_id');
            $table->string('url_alias');
            
            
            $table->softDeletes();
            $table->timestamps();
        });
	}
	
	public function down()
	{
        Schema::drop('movimientos');
	}

}
