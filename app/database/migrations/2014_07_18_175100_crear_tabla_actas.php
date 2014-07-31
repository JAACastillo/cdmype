<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaActas extends Migration {

	public function up()
	{
		Schema::create('actas', function($table){
            $table->increments('id');

            $table->enum('estado', array('Conformidad','Rechazo'));
            $table->integer('atconsultores_id');


            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('actas');
	}

}
