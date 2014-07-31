<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaHistorias extends Migration {

	public function up()
	{
		Schema::create('historias',function($table){
			$table->increments('id');

			$table->string('historia',5000);
			$table->string('foto',100);
			$table->integer('empresario_id');
            $table->integer('empresa_id');
            $table->integer('usuario_id');
            
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('historias');
	}

}
