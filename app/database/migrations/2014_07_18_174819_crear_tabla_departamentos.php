<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDepartamentos extends Migration {

	public function up()
	{
        Schema::create('departamentos',function($table){
        	
            $table->increments('id');

            $table->string('departamento',30);
        });
	}

	public function down()
	{
		Schema::drop('departamentos');
	}

}
