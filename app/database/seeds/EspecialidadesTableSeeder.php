<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class EspecialidadesTableSeeder extends Seeder {
    public function run(){

        Especialidades::create(array(
            'especialidad'     => 'Diseño'
            
        ));
        Especialidades::create(array(
            'especialidad'     => 'Programación'
            
        ));
        
    }
}