<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableIndicadores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indicadores',function($table){
            $table->increments('id');
            
            $table->date('fechaInicio'); //id usuario
            $table->boolean('contabilidadFormal');
            
            $table->double('ventaNacional');
            $table->double('ventaExportacion');
            
            $table->double('costoProduccion');
            $table->double('financiamiento');
            $table->double('capitalSemilla');

            $table->integer('empladosHombreTemp');
            $table->integer('empladosHombreFijo');
            $table->integer('empladosMujerTemp');
            $table->integer('empladosMujerFijo');
            
            
            $table->softDeletes();
            $table->timestamps();
        });
	}
	
	public function down()
	{
        Schema::drop('indicadores');
	}

}
