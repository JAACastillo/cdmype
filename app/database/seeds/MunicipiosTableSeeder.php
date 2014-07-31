<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class MunicipiosTableSeeder extends Seeder {
    public function run(){

        Municipio::create(array(
            'municipio'     => 'Ilobasco',
            'departamento_id'     => '1'
            
        ));
        
    }
}