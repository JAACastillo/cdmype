<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class SubEspecialidadesTableSeeder extends Seeder {
    public function run(){

        SubEspecialidad::create(array(
            'especialidad_id'     => '1',
            'sub_especialidad'     => 'Diseño Web'
            
        ));
        SubEspecialidad::create(array(
            'especialidad_id'     => '1',
            'sub_especialidad'     => 'Publicidad'
            
        ));
        SubEspecialidad::create(array(
            'especialidad_id'     => '2',
            'sub_especialidad'     => 'Dispositivos Móviles'
            
        ));
        SubEspecialidad::create(array(
            'especialidad_id'     => '2',
            'sub_especialidad'     => 'Desktop'
            
        ));
        
    }
}