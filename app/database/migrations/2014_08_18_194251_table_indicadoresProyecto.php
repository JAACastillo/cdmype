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
            

            $table->enum('indicador', 
            				array('Empleos', 
            					  'Venta nacional', 
            					  'Venta Exportación', 
            					  'Financiamiento', 
            					  'Capital semilla', 
            					  'Contabilidad',
            					  'Costo Produccion',
            					  'Formalización'
            					  ));
            $table->string('detalles');
            $table->softDeletes();
            $table->timestamps();
        });
	}
	
	public function down()
	{
        Schema::drop('proyectos');
	}

}
