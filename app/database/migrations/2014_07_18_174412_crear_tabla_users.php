<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsers extends Migration {

	public function up()
    {
        Schema::create('users',function($table) {
            $table->increments('id');
            
            $table->string('nombre',100);
            $table->string('email',75)->unique();
            $table->string('password');
            $table->enum('tipo',array('Administrador','Asesor','Compras','Director'));
            $table->string('remember_token');

            $table->softDeletes();
            $table->timestamps();
        });
    }


	public function down()
	{
		Schema::drop('users');
	}

}
