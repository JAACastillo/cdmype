<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class ConfiguracionesTableSeeder extends Seeder {
    public function run(){
        Configuracion::create(array(
            'num_bancario'     => '12345678-9',
            'institucion'  => 'cdmype',
            'correo' => 'cdmype@cdmype.com'
        ));
    }
}